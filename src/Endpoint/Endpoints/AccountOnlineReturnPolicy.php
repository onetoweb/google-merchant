<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Online Return Policy Endpoint.
 */
class AccountOnlineReturnPolicy extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function list(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/onlineReturnPolicies");
    }
    
    /**
     * @param string $onlineReturnPolicyName
     * 
     * @return array|null
     */
    public function get(string $onlineReturnPolicyName): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/onlineReturnPolicies/{$onlineReturnPolicyName}");
    }
}
