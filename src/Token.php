<?php

namespace Onetoweb\GoogleMerchant;

use DateTime;

/**
 * Token.
 */
class Token
{
    /**
     * @var string
     */
    private $accessToken;
    
    /**
     * @var string
     */
    private $refreshToken;
    
    /**
     * @var DateTime
     */
    private $expires;
    
    /**
     * @param string $accessToken
     * @param string $refreshToken
     * @param DateTime $expires
     */
    public function __construct(string $accessToken, string $refreshToken, DateTime $expires)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->expires = $expires;
    }
    
    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
    
    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
    
    /**
     * @return DateTime
     */
    public function getExpires(): DateTime
    {
       return $this->expires;
    }
    
    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return ($this->expires < new DateTime());
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->accessToken;
    }
}