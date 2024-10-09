<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Promotion Endpoint.
 */
class Promotion extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/promotions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/promotions", $query);
    }
    
    /**
     * @param string $promotionName
     * 
     * @return array|null
     */
    public function get(string $promotionName): ?array
    {
        return $this->client->get("/promotions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/promotions/$promotionName");
    }
    
    /**
     * @param int $dataSourceId
     * @param array $data
     * 
     * @return array|null
     */
    public function create(int $dataSourceId, array $data): ?array
    {
        return $this->client->post("/promotions/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/promotions:insert", $data, [
            'dataSource' => "accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId"
        ]);
    }
}
