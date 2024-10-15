<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account User Endpoint.
 */
class AccountUser extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users", $query);
    }
    
    /**
     * @param string $email
     * 
     * @return array|null
     */
    public function get(string $email): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users/$email");
    }
    
    /**
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function create(array $data, array $query): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users", $data, $query);
    }
    
    /**
     * @param string $email
     * 
     * @return array|null
     */
    public function delete(string $email): ?array
    {
        return $this->client->delete("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users/$email");
    }
    
    /**
     * @param string $email
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function update(string $email, array $data, array $query): ?array
    {
        return $this->client->patch("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users/$email", $data, $query);
    }
}
