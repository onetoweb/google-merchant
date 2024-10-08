<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;
use Generator;

/**
 * Product Endpoint.
 */
class Product extends AbstractEndpoint
{
    /**
     * @param string $offerId
     * 
     * @return array|null
     */
    public function get(string $offerId): ?array
    {
        return $this->client->get("/products/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/products/$offerId");
    }
    
    /**
     * @param int $dataSourceId
     * @param array $data
     * 
     * @return array|null
     */
    public function create(int $dataSourceId, array $data): ?array
    {
        return $this->client->post("/products/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/productInputs:insert", $data, [
            'dataSource' => "accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId"
        ]);
    }
    
    /**
     * @param string $offerId
     *
     * @return array|null
     */
    public function delete(string $offerId, int $dataSourceId): ?array
    {
        return $this->client->delete("/products/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/productInputs/$offerId", [
            'dataSource' => "accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId"
        ]);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/products/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/products", $query);
    }
    
    /**
     * @return Generator|null
     */
    public function listAll(): ?Generator
    {
        $pageToken = null;
        do {
            
            $result = $this->list([
                'pageSize' => 1,
                'pageToken' => $pageToken,
            ]);
            
            if (isset($result['products'])) {
                
                foreach($result['products'] as $product) {
                    
                    yield $product;
                }
            }
            
            $pageToken = $result['nextPageToken'] ?? null;
        }
        while ($pageToken !== null);
    }
}
