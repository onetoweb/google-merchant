<?php

namespace Onetoweb\GoogleMerchant\Config;

/**
 * Config.
 */
interface ConfigInterface
{
    /**
     * @return string
     */
    public function getClientId(): string;
    
    /**
     * @return string
     */
    public function getClientSecret(): string;
    
    /**
     * @return array
     */
    public function getRedirectUrls(): array;
}
