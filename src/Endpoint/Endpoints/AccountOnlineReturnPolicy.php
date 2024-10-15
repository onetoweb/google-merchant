<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Online Return Policy Endpoint.
 */
class AccountOnlineReturnPolicy extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/onlineReturnPolicies", $query);
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/onlineReturnPolicies/{$name}");
    }
}
