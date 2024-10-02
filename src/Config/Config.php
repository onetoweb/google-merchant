<?php

namespace Onetoweb\GoogleMerchant\Config;

/**
 * Config.
 */
final class Config extends AbstractConfig implements ConfigInterface
{
    /**
     * @var string
     */
    private $clientId;
    
    /**
     * @var string
     */
    private $clientSecret;
    
    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param array $redirectUrls = []
     */
    public function __construct(string $clientId, string $clientSecret, array $redirectUrls = [])
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUrls = $redirectUrls;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRedirectUrls(): array
    {
        return $this->redirectUrls;
    }
}
