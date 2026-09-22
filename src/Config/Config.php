<?php

namespace Onetoweb\GoogleMerchant\Config;

/**
 * Config.
 */
final class Config extends AbstractConfig implements ConfigInterface
{
    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param array $redirectUrls = []
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $clientId,
        
        #[\SensitiveParameter]
        private string $clientSecret,
        
        private array $redirectUrls = [])
    {
        
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
