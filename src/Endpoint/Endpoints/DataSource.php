<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;
use Generator;

/**
 * DataSource Endpoint.
 */
class DataSource extends AbstractEndpoint
{
    /**
     * @param string $dataSourceId
     * 
     * @return array|null
     */
    public function get(string $dataSourceId): ?array
    {
        return $this->client->get("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId");
    }
    
    /**
     * @param string $dataSourceId
     * 
     * @return array|null
     */
    public function fetch(string $dataSourceId): ?array
    {
        return $this->client->post("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId:fetch");
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources", $query);
    }
    
    /**
     * @param array $data
     * 
     * @return array|null
     */
    public function create(array $data): ?array
    {
        return $this->client->post("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources", $data);
    }
    
    /**
     * @param int $dataSourceId
     * 
     * @return array|null
     */
    public function delete(int $dataSourceId): ?array
    {
        return $this->client->delete("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId");
    }
    
    /**
     * @param string $dataSourceId
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function update(string $dataSourceId, array $data, array $query): ?array
    {
        return $this->client->patch("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId", $data, $query);
    }
    
    /**
     * @param int $dataSourceId
     * @param string $fileUploads = 'latest'
     * 
     * @return array|null
     */
    public function latestFileUpload(int $dataSourceId, string $fileUploads = 'latest'): ?array
    {
        return $this->client->get("/datasources/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/dataSources/$dataSourceId/fileUploads/$fileUploads");
    }
}
