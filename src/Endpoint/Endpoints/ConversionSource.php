<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Conversion Source Endpoint.
 */
class ConversionSource extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/conversions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/conversionSources", $query);
    }
    
    /**
     * @param array $data = []
     * 
     * @return array|null
     */
    public function create(array $data): ?array
    {
        return $this->client->post("/conversions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/conversionSources", $data);
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/conversions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/conversionSources/$name");
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function delete(string $name): ?array
    {
        return $this->client->delete("/conversions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/conversionSources/$name");
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function undelete(string $name): ?array
    {
        return $this->client->post("/conversions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/conversionSources/$name:undelete");
    }
    
    /**
     * @param string $name
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function update(string $name, array $data, array $query): ?array
    {
        return $this->client->patch("/conversions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/conversionSources/$name", $data, $query);
    }
}
