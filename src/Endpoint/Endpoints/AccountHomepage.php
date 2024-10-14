<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Homepage Endpoint.
 */
class AccountHomepage extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/homepage");
    }
    
    /**
     * @return array|null
     */
    public function claim(): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/homepage:claim");
    }
    
    /**
     * @return array|null
     */
    public function unclaim(): ?array
    {
        return $this->client->post("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/homepage:unclaim");
    }
    
    /**
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function update(array $data, array $query): ?array
    {
        return $this->client->patch("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/homepage", $data, $query);
    }
}
