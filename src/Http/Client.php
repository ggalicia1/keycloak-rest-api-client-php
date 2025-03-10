<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Http;

use DateTime;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token;
use Overtrue\Keycloak\Keycloak;
use Overtrue\Keycloak\OAuth\TokenStorageInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
class Client
{
    public function __construct(
        private readonly Keycloak $keycloak,
        private readonly ClientInterface $httpClient,
        private readonly TokenStorageInterface $tokenStorage,
    ) {}

    /**
     * @param  array<string, mixed>  $options
     */
    public function request(string $method, string $path = '', array $options = []): ResponseInterface
    {
        if (! $this->isAuthorized()) {
            $this->authorize();
        }

        $defaultOptions = [
            'base_uri' => $this->keycloak->getBaseUrl(),
            'headers' => [
                'Authorization' => 'Bearer '.$this->tokenStorage->retrieveAccessToken()->toString(),
            ],
        ];

        $options = array_merge_recursive($options, $defaultOptions);

        return $this->httpClient->request(
            $method,
            $this->keycloak->getBaseUrl().$path,
            $options,
        );
    }

    public function isAuthorized(): bool
    {
        return $this->tokenStorage->retrieveAccessToken()?->isExpired(new DateTime) === false;
    }

    private function authorize(): void
    {
        $tokens = $this->fetchTokens();
        $parser = (new Token\Parser(new JoseEncoder));

        $this->tokenStorage->storeAccessToken($parser->parse($tokens['access_token']));
        $this->tokenStorage->storeRefreshToken($parser->parse($tokens['refresh_token']));
    }

    /**
     * @return array{access_token: non-empty-string, refresh_token: non-empty-string}
     */
    private function fetchTokens(): array
    {
        try {
            $response = $this->httpClient->request(
                'POST',
                $this->keycloak->getBaseUrl().'/realms/master/protocol/openid-connect/token',
                [
                    'form_params' => [
                        'refresh_token' => $this->tokenStorage->retrieveRefreshToken()?->toString(),
                        'client_id' => 'admin-cli',
                        'grant_type' => 'refresh_token',
                    ],
                ],
            );
        } catch (ClientException $e) {
            $response = $this->httpClient->request(
                'POST',
                $this->keycloak->getBaseUrl().'/realms/master/protocol/openid-connect/token',
                [
                    'form_params' => [
                        'username' => $this->keycloak->getUsername(),
                        'password' => $this->keycloak->getPassword(),
                        'client_id' => 'admin-cli',
                        'grant_type' => 'password',
                    ],
                ],
            );
        }

        $tokens = json_decode(
            $response->getBody()->getContents(),
            true,
            flags: JSON_THROW_ON_ERROR,
        );

        return [
            'access_token' => $tokens['access_token'],
            'refresh_token' => $tokens['refresh_token'],
        ];
    }
}
