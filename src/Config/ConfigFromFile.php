<?php

namespace Onetoweb\GoogleMerchant\Config;

use Onetoweb\GoogleMerchant\Exception\{ConfigFileException, ConfigJsonException};

/**
 * Config From File.
 */
final class ConfigFromFile extends AbstractConfig implements ConfigInterface
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
     * @param string $configFile
     * 
     * @throws ConfigFileException if the file is not readable
     * @throws ConfigJsonException if the json is in valid
     */
    public function __construct(string $configFile)
    {
        if (!is_readable($configFile)) {
            throw new ConfigFileException('config file does not exists or is not readable');
        }
        
        $jsonString = file_get_contents($configFile);
        
        if (!json_validate($jsonString)) {
            throw new ConfigJsonException('config file does not contain valid json');
        }
        
        $config = json_decode($jsonString);
        
        if (!isset($config->web->client_id)) {
            throw new ConfigJsonException('config file does not contain a client id');
        }
        
        if (!isset($config->web->client_secret)) {
            throw new ConfigJsonException('config file does not contain a client secret');
        }
        
        $this->clientId = $config->web->client_id;
        $this->clientSecret = $config->web->client_secret;
        
        if (isset($config->web->redirect_uris)) {
            $this->redirectUrls = $config->web->redirect_uris;
        }
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
