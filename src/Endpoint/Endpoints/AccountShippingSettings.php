<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Shipping Settings Endpoint.
 */
class AccountShippingSettings extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/shippingSettings");
    }
    
    /**
     * @param array $data
     * 
     * @return array|null
     */
    public function create(array $data): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/shippingSettings:insert", $data);
    }
}
