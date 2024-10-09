<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Endpoint.
 */
class Account extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts", $query);
    }
    
    /**
     * @param string $accountId
     * 
     * @return array|null
     */
    public function get(string $accountId): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/$accountId");
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function listSubaccounts(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}:listSubaccounts", $query);
    }
}
