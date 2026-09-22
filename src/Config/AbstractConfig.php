<?php

namespace Onetoweb\GoogleMerchant\Config;

/**
 * Abstract Config.
 */
abstract class AbstractConfig implements ConfigInterface
{
    /**
     * @var array
     */
    private array $redirectUrls = [];
}
