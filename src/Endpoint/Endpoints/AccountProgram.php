<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Program Endpoint.
 */
class AccountProgram extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/programs", $query);
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/programs/$name");
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function disable(string $name): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/programs/$name:disable");
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function enable(string $name): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/programs/$name:enable");
    }
}
