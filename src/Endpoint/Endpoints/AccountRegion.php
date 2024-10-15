<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Region Endpoint.
 */
class AccountRegion extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/regions", $query);
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/regions/$name");
    }
    
    /**
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function create(array $data, array $query): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/regions", $data, $query);
    }
    
    /**
     * @param string $regionId
     * 
     * @return array|null
     */
    public function delete(string $regionId): ?array
    {
        return $this->client->delete("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/regions/$regionId");
    }
}
