<?php

namespace Onetoweb\GoogleMerchant;

use Onetoweb\GoogleMerchant\Endpoint\Endpoints;
use Onetoweb\GoogleMerchant\Config\ConfigInterface;
use Onetoweb\GoogleMerchant\Token;
use Onetoweb\GoogleMerchant\Exception\{
    RedirectUrlException,
    AuthException,
    TokenException,
    AccountIdException
};
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;
use DateTime;

/**
 * Google Merchant Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base href
     */
    public const BASE_HREF = 'https://merchantapi.googleapis.com';
    public const AUTH_URL = 'https://accounts.google.com/o/oauth2/auth';
    public const TOKEN_URL = 'https://oauth2.googleapis.com/token';
    
    /**
     * Scope.
     */
    public const SCOPE_CONTENT = 'https://www.googleapis.com/auth/content';
    
    /**
     * Scope.
     */
    public const VERSION = 'v1';
    
    /**
     * Methods.
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    
    /**
     * @var ConfigInterface
     */
    private $config;
    
    /**
     * @var string
     */
    private $version;
    
    /**
     * @var Token
     */
    private $token;
    
    /**
     * @var string
     */
    private $redirectUrl;
    
    /**
     * @var string
     */
    private $tokenUpdateCallback;
    
    /**
     * @var int
     */
    private $accountId;
    
    /**
     * @param ConfigInterface $config
     * @param string $version = self::VERSION
     */
    public function __construct(ConfigInterface $config, string $version = self::VERSION)
    {
        $this->config = $config;
        $this->version = $version;
        
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
    }
    
    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
    
    /**
     * @param string $redirectUrl
     * 
     * @return void
     */
    public function setRedirectUrl(string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }
    
    /**
     * @throws RedirectUrlException if no redirect url is set
     * 
     * @return string
     */
    public function getRedirectUrl(): string
    {
        if ($this->redirectUrl !== null) {
            return $this->redirectUrl;
        }
        
        if (count($this->config->getRedirectUrls()) > 0) {
            
            // get redirect url from config
            return current($this->config->getRedirectUrls());
            
        } else {
            
            throw new RedirectUrlException('no redirect url is set');
        }
    }
    
    /**
     * @return string
     */
    public static function generateState(): string
    {
        return bin2hex(random_bytes(32));
    }
    
    /**
     * @param string $state
     * @param string $scope = self::SCOPE_CONTENT
     * 
     * @return string
     */
    public function getAuthorizationUrl(string $state, string $scope = self::SCOPE_CONTENT): string
    {
        return self::AUTH_URL . '?' . http_build_query([
            'response_type' => 'code',
            'access_type' => 'offline',
            'include_granted_scopes' => 'true',
            'scope' => $scope,
            'state' => $state,
            'redirect_uri' => $this->getRedirectUrl(),
            'client_id' => $this->config->getClientId(),
            'prompt' => 'consent'
        ]);
    }
    
    /**
     * @param int $accountId
     * 
     * @return void
     */
    public function setAccountId(int $accountId): void
    {
        $this->accountId = $accountId;
    }
    
    /**
     * @throws AccountIdException if no account id is provided
     * 
     * @return int
     */
    public function getAccountId(): int
    {
        // check for account id
        if ($this->accountId === null) {
            throw new AccountIdException('you must provide a account id with '.self::class.'::setAccountId');
        }
        
        return $this->accountId;
    }
    
    /**
     * @param callable $tokenUpdateCallback
     * 
     * @return void
     */
    public function setTokenUpdateCallback(callable $tokenUpdateCallback): void
    {
        $this->tokenUpdateCallback = $tokenUpdateCallback;
    }
    
    /**
     * @param Token $token
     * 
     * @return void
     */
    public function setToken(Token $token): void
    {
        $this->token = $token;
    }
    
    /**
     * @throws AuthException if no access token is provided
     * 
     * @return Token
     */
    public function getToken(): Token
    {
        // check if token isset
        if ($this->token === null) {
            throw new AuthException('you must provide a token with '.self::class.'::setToken, or you can request a token via the authorization workflow');
        }
        
        return $this->token;
    }
    
    /**
     * @param string $endpoint
     * 
     * @return string
     */
    public function getUrl(string $endpoint): string
    {
        return self::BASE_HREF . '/' . ltrim($endpoint, '/');
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return array|null
     */
    public function get(string $endpoint, array $query = []): ?array
    {
        return $this->request(self::METHOD_GET, $endpoint, [], $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function post(string $endpoint, array $data = [], array $query = []): ?array
    {
        return $this->request(self::METHOD_POST, $endpoint, $data, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function patch(string $endpoint, array $data = [], array $query = []): ?array
    {
        return $this->request(self::METHOD_PATCH, $endpoint, $data, $query);
    }
    
    /**
     * @param string $endpoint
     * 
     * @return array|null
     */
    public function delete(string $endpoint, array $query = []): ?array
    {
        return $this->request(self::METHOD_DELETE, $endpoint, [], $query);
    }
    
    /**
     * @param string $code
     * 
     * @return void
     */
    public function requestTokenFromCode(string $code): void
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'accept' => 'application/json'
            ],
            RequestOptions::FORM_PARAMS => [
                'code' => $code,
                'client_id' => $this->config->getClientId(),
                'client_secret' => $this->config->getClientSecret(),
                'redirect_uri' => $this->getRedirectUrl(),
                'grant_type' => 'authorization_code'
            ]
        ];
        
        // make request
        $response = (new GuzzleCLient())->post(self::TOKEN_URL, $options);
        
        // decode json
        $tokenArray = json_decode($response->getBody()->getContents(), true);
        
        // update token
        $this->updateToken($tokenArray);
    }
    
    /**
     * @return void
     */
    public function refreshToken(): void
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'accept' => 'application/json'
            ],
            RequestOptions::FORM_PARAMS => [
                'client_id' => $this->config->getClientId(),
                'client_secret' => $this->config->getClientSecret(),
                'refresh_token' => $this->getToken()->getRefreshToken(),
                'grant_type' => 'refresh_token'
            ]
        ];
        
        // make request
        $response = (new GuzzleCLient())->post(self::TOKEN_URL, $options);
        
        // decode json
        $tokenArray = json_decode($response->getBody()->getContents(), true);
        
        // update token
        $this->updateToken($tokenArray);
    }
    
    /**
     * @param array $tokenArray
     * 
     * @throws TokenException if token response is missing values
     * @throws TokenException if the refresh token is missing
     * 
     * @return void
     */
    public function updateToken(array $tokenArray): void
    {
        // check token array values
        if (!isset($tokenArray['access_token']) or !isset($tokenArray['expires_in'])) {
            throw new TokenException('token response does not contain access_token or expires_in');
        }
        
        // get refresh token
        if (isset($tokenArray['refresh_token'])) {
            $refreshToken = $tokenArray['refresh_token'];
        } elseif ($this->token !== null and $this->token->getRefreshToken() !== null) {
            $refreshToken = $this->token->getRefreshToken();
        } else {
            throw new TokenException('missing refresh token you can request a refresh token with the authorization workflow');
        }
        
        // get expires datetime
        $expiresIn = ((int) $tokenArray['expires_in'] - 10);
        $expires = (new DateTime())->modify("+$expiresIn seconds");
        
        // return restricted data token
        $this->token = new Token($tokenArray['access_token'], $refreshToken, $expires);
        
        // token update callback
        ($this->tokenUpdateCallback)($this->token);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function request(string $method, string $endpoint, array $data = [], array $query = []): ?array
    {
        // check if token is not expired
        if ($this->getToken()->isExpired()) {
            $this->refreshToken();
        }
        
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
                'authorization' => "Bearer {$this->getToken()}",
            ],
            RequestOptions::QUERY => $query,
        ];
        
        // add json body
        if (in_array($method, [self::METHOD_POST, self::METHOD_PATCH]) and count($data) > 0) {
            $options[RequestOptions::JSON] = $data;
        }
        
        // get url
        $url = $this->getUrl($endpoint);
        
        // make request
        $response = (new GuzzleCLient())->request($method, $url, $options);
        
        // get response contents
        $contents = $response->getBody()->getContents();
        
        // decode json
        $json = json_decode($contents, true);
        
        return $json;
    }
}
