<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Representation;

use Overtrue\Keycloak\Attribute\Since;
use Overtrue\Keycloak\Collection\AuthenticationFlowCollection;
use Overtrue\Keycloak\Collection\AuthenticatorConfigCollection;
use Overtrue\Keycloak\Collection\ClientCollection;
use Overtrue\Keycloak\Collection\ClientScopeCollection;
use Overtrue\Keycloak\Collection\GroupCollection;
use Overtrue\Keycloak\Collection\IdentityProviderCollection;
use Overtrue\Keycloak\Collection\IdentityProviderMapperCollection;
use Overtrue\Keycloak\Collection\OrganizationCollection;
use Overtrue\Keycloak\Collection\ProtocolMapperCollection;
use Overtrue\Keycloak\Collection\RequiredActionProviderCollection;
use Overtrue\Keycloak\Collection\ScopeMappingCollection;
use Overtrue\Keycloak\Collection\UserCollection;
use Overtrue\Keycloak\Collection\UserFederationMapperCollection;
use Overtrue\Keycloak\Collection\UserFederationProviderCollection;
use Overtrue\Keycloak\Type\Map;

/**
 * @method int|null getAccessCodeLifespan()
 * @method int|null getAccessCodeLifespanLogin()
 * @method int|null getAccessCodeLifespanUserAction()
 * @method int|null getAccessTokenLifespan()
 * @method int|null getAccessTokenLifespanForImplicitFlow()
 * @method string|null getAccountTheme()
 * @method int|null getActionTokenGeneratedByAdminLifespan()
 * @method int|null getActionTokenGeneratedByUserLifespan()
 * @method bool|null getAdminEventsDetailsEnabled()
 * @method bool|null getAdminEventsEnabled()
 * @method string|null getAdminTheme()
 * @method AuthenticationFlowCollection|null getAuthenticationFlows()
 * @method AuthenticatorConfigCollection|null getAuthenticatorConfig()
 * @method string|null getBrowserFlow()
 * @method Map|null getBrowserSecurityHeaders()
 * @method bool|null getBruteForceProtected()
 * @method string|null getClientAuthenticationFlow()
 * @method int|null getClientOfflineSessionIdleTimeout()
 * @method int|null getClientOfflineSessionMaxLifespan()
 * @method ClientPolicies|null getClientPolicies()
 * @method ClientProfiles|null getClientProfiles()
 * @method ScopeMappingCollection|null getClientScopeMappings()
 * @method ClientScopeCollection|null getClientScopes()
 * @method int|null getClientSessionIdleTimeout()
 * @method int|null getClientSessionMaxLifespan()
 * @method ClientCollection|null getClients()
 * @method MultivaluedHashMap|null getComponents()
 * @method string[]|null getDefaultDefaultClientScopes()
 * @method string[]|null getDefaultGroups()
 * @method string|null getDefaultLocale()
 * @method string[]|null getDefaultOptionalClientScopes()
 * @method Role|null getDefaultRole()
 * @method string|null getDefaultSignatureAlgorithm()
 * @method string|null getDirectGrantFlow()
 * @method string|null getDisplayName()
 * @method string|null getDisplayNameHtml()
 * @method string|null getDockerAuthenticationFlow()
 * @method bool|null getDuplicateEmailsAllowed()
 * @method bool|null getEditUsernameAllowed()
 * @method string|null getEmailTheme()
 * @method bool|null getEnabled()
 * @method string[]|null getEnabledEventTypes()
 * @method bool|null getEventsEnabled()
 * @method int|null getEventsExpiration()
 * @method string[]|null getEventsListeners()
 * @method int|null getFailureFactor()
 * @method UserCollection|null getFederatedUsers()
 * @method string|null getFirstBrokerLoginFlow()
 * @method GroupCollection|null getGroups()
 * @method string|null getId()
 * @method IdentityProviderMapperCollection|null getIdentityProviderMappers()
 * @method IdentityProviderCollection|null getIdentityProviders()
 * @method bool|null getInternationalizationEnabled()
 * @method string|null getKeycloakVersion()
 * @method string|null getLoginTheme()
 * @method bool|null getLoginWithEmailAllowed()
 * @method int|null getMaxDeltaTimeSeconds()
 * @method int|null getMaxFailureWaitSeconds()
 * @method int|null getMaxTemporaryLockouts()
 * @method int|null getMinimumQuickLoginWaitSeconds()
 * @method int|null getNotBefore()
 * @method int|null getOauth2DeviceCodeLifespan()
 * @method int|null getOauth2DevicePollingInterval()
 * @method int|null getOfflineSessionIdleTimeout()
 * @method int|null getOfflineSessionMaxLifespan()
 * @method bool|null getOfflineSessionMaxLifespanEnabled()
 * @method string|null getOtpPolicyAlgorithm()
 * @method bool|null getOtpPolicyCodeReusable()
 * @method int|null getOtpPolicyDigits()
 * @method int|null getOtpPolicyInitialCounter()
 * @method int|null getOtpPolicyLookAheadWindow()
 * @method int|null getOtpPolicyPeriod()
 * @method string|null getOtpPolicyType()
 * @method string[]|null getOtpSupportedApplications()
 * @method string|null getPasswordPolicy()
 * @method bool|null getPermanentLockout()
 * @method ProtocolMapperCollection|null getProtocolMappers()
 * @method int|null getQuickLoginCheckMilliSeconds()
 * @method string|null getRealm()
 * @method int|null getRefreshTokenMaxReuse()
 * @method bool|null getRegistrationAllowed()
 * @method bool|null getRegistrationEmailAsUsername()
 * @method string|null getRegistrationFlow()
 * @method bool|null getRememberMe()
 * @method RequiredActionProviderCollection|null getRequiredActions()
 * @method string[]|null getRequiredCredentials()
 * @method string|null getResetCredentialsFlow()
 * @method bool|null getResetPasswordAllowed()
 * @method bool|null getRevokeRefreshToken()
 * @method Roles|null getRoles()
 * @method ScopeMappingCollection|null getScopeMappings()
 * @method Map|null getSmtpServer()
 * @method string|null getSslRequired()
 * @method int|null getSsoSessionIdleTimeout()
 * @method int|null getSsoSessionIdleTimeoutRememberMe()
 * @method int|null getSsoSessionMaxLifespan()
 * @method int|null getSsoSessionMaxLifespanRememberMe()
 * @method string[]|null getSupportedLocales()
 * @method UserFederationMapperCollection|null getUserFederationMappers()
 * @method UserFederationProviderCollection|null getUserFederationProviders()
 * @method bool|null getUserManagedAccessAllowed()
 * @method UserCollection|null getUsers()
 * @method bool|null getVerifyEmail()
 * @method int|null getWaitIncrementSeconds()
 * @method string[]|null getWebAuthnPolicyAcceptableAaguids()
 * @method string|null getWebAuthnPolicyAttestationConveyancePreference()
 * @method string|null getWebAuthnPolicyAuthenticatorAttachment()
 * @method bool|null getWebAuthnPolicyAvoidSameAuthenticatorRegister()
 * @method int|null getWebAuthnPolicyCreateTimeout()
 * @method string[]|null getWebAuthnPolicyExtraOrigins()
 * @method string[]|null getWebAuthnPolicyPasswordlessAcceptableAaguids()
 * @method string|null getWebAuthnPolicyPasswordlessAttestationConveyancePreference()
 * @method string|null getWebAuthnPolicyPasswordlessAuthenticatorAttachment()
 * @method bool|null getWebAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister()
 * @method int|null getWebAuthnPolicyPasswordlessCreateTimeout()
 * @method string[]|null getWebAuthnPolicyPasswordlessPolicyExtraOrigins()
 * @method string|null getWebAuthnPolicyPasswordlessRequireResidentKey()
 * @method string|null getWebAuthnPolicyPasswordlessRpEntityName()
 * @method string|null getWebAuthnPolicyPasswordlessRpId()
 * @method string[]|null getWebAuthnPolicyPasswordlessSignatureAlgorithms()
 * @method string|null getWebAuthnPolicyPasswordlessUserVerificationRequirement()
 * @method string|null getWebAuthnPolicyRequireResidentKey()
 * @method string|null getWebAuthnPolicyRpEntityName()
 * @method string|null getWebAuthnPolicyRpId()
 * @method string[]|null getWebAuthnPolicySignatureAlgorithms()
 * @method string|null getWebAuthnPolicyUserVerificationRequirement()
 * @method self withAccessCodeLifespan(?int $accessCodeLifespan)
 * @method self withAccessCodeLifespanLogin(?int $accessCodeLifespanLogin)
 * @method self withAccessCodeLifespanUserAction(?int $accessCodeLifespanUserAction)
 * @method self withAccessTokenLifespan(?int $accessTokenLifespan)
 * @method self withAccessTokenLifespanForImplicitFlow(?int $value)
 * @method self withAccountTheme(?string $value)
 * @method self withActionTokenGeneratedByAdminLifespan(?int $value)
 * @method self withActionTokenGeneratedByUserLifespan(?int $value)
 * @method self withAdminEventsDetailsEnabled(?bool $value)
 * @method self withAdminEventsEnabled(?bool $value)
 * @method self withAdminTheme(?string $value)
 * @method self withAttributes(?Map $value)
 * @method self withAuthenticationFlows(?AuthenticationFlowCollection $value)
 * @method self withAuthenticatorConfig(?AuthenticatorConfigCollection $value)
 * @method self withBrowserFlow(?string $value)
 * @method self withBrowserSecurityHeaders(?Map $value)
 * @method self withBruteForceProtected(?bool $value)
 * @method self withClientAuthenticationFlow(?string $value)
 * @method self withClientOfflineSessionIdleTimeout(?int $value)
 * @method self withClientOfflineSessionMaxLifespan(?int $value)
 * @method self withClientPolicies(?ClientPolicies $value)
 * @method self withClientProfiles(?ClientProfiles $value)
 * @method self withClientScopeMappings(?ScopeMappingCollection $value)
 * @method self withClientScopes(?ClientScopeCollection $value)
 * @method self withClientSessionIdleTimeout(?int $value)
 * @method self withClientSessionMaxLifespan(?int $value)
 * @method self withClients(?ClientCollection $value)
 * @method self withComponents(?MultivaluedHashMap $value)
 * @method self withDefaultDefaultClientScopes(?string[] $value)
 * @method self withDefaultGroups(?string[] $value)
 * @method self withDefaultLocale(?string $value)
 * @method self withDefaultOptionalClientScopes(?string[] $value)
 * @method self withDefaultRole(?Role $value)
 * @method self withDefaultSignatureAlgorithm(?string $value)
 * @method self withDirectGrantFlow(?string $value)
 * @method self withDisplayName(?string $value)
 * @method self withDisplayNameHtml(?string $value)
 * @method self withDockerAuthenticationFlow(?string $value)
 * @method self withDuplicateEmailsAllowed(?bool $value)
 * @method self withEditUsernameAllowed(?bool $value)
 * @method self withEmailTheme(?string $value)
 * @method self withEnabled(?bool $value)
 * @method self withEnabledEventTypes(?string[] $value)
 * @method self withEventsEnabled(?bool $value)
 * @method self withEventsExpiration(?int $value)
 * @method self withEventsListeners(?string[] $value)
 * @method self withFailureFactor(?int $value)
 * @method self withFederatedUsers(?UserCollection $value)
 * @method self withFirstBrokerLoginFlow(?string $value)
 * @method self withGroups(?GroupCollection $value)
 * @method self withId(?string $value)
 * @method self withIdentityProviderMappers(?IdentityProviderMapperCollection $value)
 * @method self withIdentityProviders(?IdentityProviderCollection $value)
 * @method self withInternationalizationEnabled(?bool $value)
 * @method self withKeycloakVersion(?string $value)
 * @method self withLoginTheme(?string $value)
 * @method self withLoginWithEmailAllowed(?bool $value)
 * @method self withMaxDeltaTimeSeconds(?int $value)
 * @method self withMaxFailureWaitSeconds(?int $value)
 * @method self withMaxTemporaryLockouts(?int $value)
 * @method self withMinimumQuickLoginWaitSeconds(?int $value)
 * @method self withNotBefore(?int $value)
 * @method self withOauth2DeviceCodeLifespan(?int $value)
 * @method self withOauth2DevicePollingInterval(?int $value)
 * @method self withOfflineSessionIdleTimeout(?int $value)
 * @method self withOfflineSessionMaxLifespan(?int $value)
 * @method self withOfflineSessionMaxLifespanEnabled(?int $value)
 * @method self withOtpPolicyAlgorithm(?string $value)
 * @method self withOtpPolicyCodeReusable(?bool $value)
 * @method self withOtpPolicyDigits(?int $value)
 * @method self withOtpPolicyInitialCounter(?int $value)
 * @method self withOtpPolicyLookAheadWindow(?int $value)
 * @method self withOtpPolicyPeriod(?int $value)
 * @method self withOtpPolicyType(?int $value)
 * @method self withOtpSupportedApplications(?string[] $value)
 * @method self withPasswordPolicy(?string $value)
 * @method self withPermanentLockout(?bool $value)
 * @method self withProtocolMappers(?ProtocolMapperCollection $value)
 * @method self withQuickLoginCheckMilliSeconds(?int $value)
 * @method self withRealm(?string $value)
 * @method self withRefreshTokenMaxReuse(?int $value)
 * @method self withRegistrationAllowed(?bool $value)
 * @method self withRegistrationEmailAsUsername(?bool $value)
 * @method self withRegistrationFlow(?string $value)
 * @method self withRememberMe(?bool $value)
 * @method self withRequiredActions(?RequiredActionProviderCollection $value)
 * @method self withRequiredCredentials(?string[] $value)
 * @method self withResetCredentialsFlow(?string $value)
 * @method self withResetPasswordAllowed(?bool $value)
 * @method self withRevokeRefreshToken(?bool $value)
 * @method self withRoles(?Roles $value)
 * @method self withScopeMappings(?ScopeMappingCollection $value)
 * @method self withSmtpServer(?Map $value)
 * @method self withSslRequired(?string $value)
 * @method self withSsoSessionIdleTimeout(?int $value)
 * @method self withSsoSessionIdleTimeoutRememberMe(?int $value)
 * @method self withSsoSessionMaxLifespan(?int $value)
 * @method self withSsoSessionMaxLifespanRememberMe(?int $value)
 * @method self withSupportedLocales(?string[] $value)
 * @method self withUserFederationMappers(?UserFederationMapperCollection $value)
 * @method self withUserFederationProviders(?UserFederationProviderCollection $value)
 * @method self withUserManagedAccessAllowed(?bool $value)
 * @method self withUsers(?UserCollection $value)
 * @method self withVerifyEmail(?bool $value)
 * @method self withWaitIncrementSeconds(?int $value)
 * @method self withWebAuthnPolicyAcceptableAaguids(?string[] $value)
 * @method self withWebAuthnPolicyAttestationConveyancePreference(?string $value)
 * @method self withWebAuthnPolicyAuthenticatorAttachment(?string $value)
 * @method self withWebAuthnPolicyAvoidSameAuthenticatorRegister(?bool $value)
 * @method self withWebAuthnPolicyCreateTimeout(?int $value)
 * @method self withWebAuthnPolicyExtraOrigins(?string[] $value)
 * @method self withWebAuthnPolicyPasswordlessAcceptableAaguids(?string[] $value)
 * @method self withWebAuthnPolicyPasswordlessAttestationConveyancePreference(?string $value)
 * @method self withWebAuthnPolicyPasswordlessAuthenticatorAttachment(?string $value)
 * @method self withWebAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister(?bool $value)
 * @method self withWebAuthnPolicyPasswordlessCreateTimeout(?int $value)
 * @method self withWebAuthnPolicyPasswordlessExtraOrigins(?string[] $value)
 * @method self withWebAuthnPolicyPasswordlessRequireResidentKey(?string $value)
 * @method self withWebAuthnPolicyPasswordlessRpEntityName(?string $value)
 * @method self withWebAuthnPolicyPasswordlessRpId(?string $value)
 * @method self withWebAuthnPolicyPasswordlessSignatureAlgorithms(?string[] $value)
 * @method self withWebAuthnPolicyPasswordlessUserVerificationRequirement(?string $value)
 * @method self withWebAuthnPolicyRequireResidentKey(?string $value)
 * @method self withWebAuthnPolicyRpEntityName(?string $value)
 * @method self withWebAuthnPolicyRpId(?string $value)
 * @method self withWebAuthnPolicySignatureAlgorithms(?string[] $value)
 * @method self withWebAuthnPolicyUserVerificationRequirement(?string $value)
 * @method OrganizationCollection|null getOrganizations()
 * @method self withOrganizations(?OrganizationCollection $organizations)
 * @method bool|null getOrganizationsEnabled()
 * @method self withOrganizationsEnabled(?bool $organizationsEnabled)
 *
 * @codeCoverageIgnore
 */
class Realm extends Representation implements AttributesAwareInterface
{
    use HasAttributes;

    public function __construct(
        protected ?int $accessCodeLifespan = null,
        protected ?int $accessCodeLifespanLogin = null,
        protected ?int $accessCodeLifespanUserAction = null,
        protected ?int $accessTokenLifespan = null,
        protected ?int $accessTokenLifespanForImplicitFlow = null,
        protected ?string $accountTheme = null,
        protected ?int $actionTokenGeneratedByAdminLifespan = null,
        protected ?int $actionTokenGeneratedByUserLifespan = null,
        protected ?bool $adminEventsDetailsEnabled = null,
        protected ?bool $adminEventsEnabled = null,
        protected ?string $adminTheme = null,
        /** @var Map|array<string, mixed>|null */
        protected Map|array|null $attributes = null,
        protected ?AuthenticationFlowCollection $authenticationFlows = null,
        protected ?AuthenticatorConfigCollection $authenticatorConfig = null,
        protected ?string $browserFlow = null,
        /** @var Map|array<string, mixed>|null */
        protected Map|array|null $browserSecurityHeaders = null,
        protected ?bool $bruteForceProtected = null,
        protected ?string $clientAuthenticationFlow = null,
        protected ?int $clientOfflineSessionIdleTimeout = null,
        protected ?int $clientOfflineSessionMaxLifespan = null,
        protected ?ClientPolicies $clientPolicies = null,
        protected ?ClientProfiles $clientProfiles = null,
        /** @var Map|array<string, mixed>|null */
        protected Map|array|null $clientScopeMappings = null,
        protected ?ClientScopeCollection $clientScopes = null,
        protected ?int $clientSessionIdleTimeout = null,
        protected ?int $clientSessionMaxLifespan = null,
        protected ?ClientCollection $clients = null,
        protected ?MultivaluedHashMap $components = null,
        /** @var string[]|null */
        protected ?array $defaultDefaultClientScopes = null,
        /** @var string[]|null */
        protected ?array $defaultGroups = null,
        protected ?string $defaultLocale = null,
        /** @var string[]|null */
        protected ?array $defaultOptionalClientScopes = null,
        protected ?Role $defaultRole = null,
        protected ?string $defaultSignatureAlgorithm = null,
        protected ?string $directGrantFlow = null,
        protected ?string $displayName = null,
        protected ?string $displayNameHtml = null,
        protected ?string $dockerAuthenticationFlow = null,
        protected ?bool $duplicateEmailsAllowed = null,
        protected ?bool $editUsernameAllowed = null,
        protected ?string $emailTheme = null,
        protected ?bool $enabled = null,
        /** @var string[]|null */
        protected ?array $enabledEventTypes = null,
        protected ?bool $eventsEnabled = null,
        protected ?int $eventsExpiration = null,
        /** @var string[]|null */
        protected ?array $eventsListeners = null,
        protected ?int $failureFactor = null,
        protected ?UserCollection $federatedUsers = null,
        #[Since('24.0.0')]
        protected ?string $firstBrokerLoginFlow = null,
        protected ?GroupCollection $groups = null,
        protected ?string $id = null,
        protected ?IdentityProviderMapperCollection $identityProviderMappers = null,
        protected ?IdentityProviderCollection $identityProviders = null,
        protected ?bool $internationalizationEnabled = null,
        protected ?string $keycloakVersion = null,
        protected ?string $loginTheme = null,
        protected ?bool $loginWithEmailAllowed = null,
        protected ?int $maxDeltaTimeSeconds = null,
        protected ?int $maxFailureWaitSeconds = null,
        #[Since('24.0.0')]
        protected ?int $maxTemporaryLockouts = null,
        protected ?int $minimumQuickLoginWaitSeconds = null,
        protected ?int $notBefore = null,
        protected ?int $oauth2DeviceCodeLifespan = null,
        protected ?int $oauth2DevicePollingInterval = null,
        protected ?int $offlineSessionIdleTimeout = null,
        protected ?int $offlineSessionMaxLifespan = null,
        protected ?bool $offlineSessionMaxLifespanEnabled = null,
        #[Since('25.0.0')]
        protected ?OrganizationCollection $organizations = null,
        #[Since('25.0.0')]
        protected ?bool $organizationsEnabled = null,
        protected ?string $otpPolicyAlgorithm = null,
        #[Since('20.0.0')]
        protected ?bool $otpPolicyCodeReusable = null,
        protected ?int $otpPolicyDigits = null,
        protected ?int $otpPolicyInitialCounter = null,
        protected ?int $otpPolicyLookAheadWindow = null,
        protected ?int $otpPolicyPeriod = null,
        protected ?string $otpPolicyType = null,
        /** @var string[]|null */
        protected ?array $otpSupportedApplications = null,
        protected ?string $passwordPolicy = null,
        protected ?bool $permanentLockout = null,
        protected ?ProtocolMapperCollection $protocolMappers = null,
        protected ?int $quickLoginCheckMilliSeconds = null,
        protected ?string $realm = null,
        protected ?int $refreshTokenMaxReuse = null,
        protected ?bool $registrationAllowed = null,
        protected ?bool $registrationEmailAsUsername = null,
        protected ?string $registrationFlow = null,
        protected ?bool $rememberMe = null,
        protected ?RequiredActionProviderCollection $requiredActions = null,
        /** @var string[]|null */
        protected ?array $requiredCredentials = null,
        protected ?string $resetCredentialsFlow = null,
        protected ?bool $resetPasswordAllowed = null,
        protected ?bool $revokeRefreshToken = null,
        protected ?Roles $roles = null,
        protected ?ScopeMappingCollection $scopeMappings = null,
        /** @var Map|array<string, mixed>|null */
        protected Map|array|null $smtpServer = null,
        protected ?string $sslRequired = null,
        protected ?int $ssoSessionIdleTimeout = null,
        protected ?int $ssoSessionIdleTimeoutRememberMe = null,
        protected ?int $ssoSessionMaxLifespan = null,
        protected ?int $ssoSessionMaxLifespanRememberMe = null,
        /** @var string[]|null */
        protected ?array $supportedLocales = null,
        protected ?UserFederationMapperCollection $userFederationMappers = null,
        protected ?UserFederationProviderCollection $userFederationProviders = null,
        protected ?bool $userManagedAccessAllowed = null,
        protected ?UserCollection $users = null,
        protected ?bool $verifyEmail = null,
        protected ?int $waitIncrementSeconds = null,
        /** @var string[]|null */
        protected ?array $webAuthnPolicyAcceptableAaguids = null,
        protected ?string $webAuthnPolicyAttestationConveyancePreference = null,
        protected ?string $webAuthnPolicyAuthenticatorAttachment = null,
        protected ?bool $webAuthnPolicyAvoidSameAuthenticatorRegister = null,
        protected ?int $webAuthnPolicyCreateTimeout = null,
        /** @var string[]|null */
        #[Since('23.0.0')]
        protected ?array $webAuthnPolicyExtraOrigins = null,
        /** @var string[]|null */
        protected ?array $webAuthnPolicyPasswordlessAcceptableAaguids = null,
        protected ?string $webAuthnPolicyPasswordlessAttestationConveyancePreference = null,
        protected ?string $webAuthnPolicyPasswordlessAuthenticatorAttachment = null,
        protected ?bool $webAuthnPolicyPasswordlessAvoidSameAuthenticatorRegister = null,
        protected ?int $webAuthnPolicyPasswordlessCreateTimeout = null,
        /** @var string[]|null */
        #[Since('23.0.0')]
        protected ?array $webAuthnPolicyPasswordlessExtraOrigins = null,
        protected ?string $webAuthnPolicyPasswordlessRequireResidentKey = null,
        protected ?string $webAuthnPolicyPasswordlessRpEntityName = null,
        protected ?string $webAuthnPolicyPasswordlessRpId = null,
        /** @var string[]|null */
        protected ?array $webAuthnPolicyPasswordlessSignatureAlgorithms = null,
        protected ?string $webAuthnPolicyPasswordlessUserVerificationRequirement = null,
        protected ?string $webAuthnPolicyRequireResidentKey = null,
        protected ?string $webAuthnPolicyRpEntityName = null,
        protected ?string $webAuthnPolicyRpId = null,
        /** @var string[]|null */
        protected ?array $webAuthnPolicySignatureAlgorithms = null,
        protected ?string $webAuthnPolicyUserVerificationRequirement = null,
    ) {}
}
