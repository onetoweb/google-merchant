<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Notification Endpoint.
 */
class Notification extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/notifications/v1beta/accounts/{$this->client->getAccountId()}/notificationsubscriptions", $query);
    }
    
    /**
     * @param int $notificationId
     * 
     * @return array|null
     */
    public function get(int $notificationId): ?array
    {
        return $this->client->get("/notifications/v1beta/accounts/{$this->client->getAccountId()}/notificationsubscriptions/$notificationId");
    }
    
    /**
     * @param array $data
     * 
     * @return array|null
     */
    public function create(array $data): ?array
    {
        return $this->client->post("/notifications/v1beta/accounts/{$this->client->getAccountId()}/notificationsubscriptions", $data);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|null
     */
    public function update(int $notificationId, array $data, array $query = []): ?array
    {
        return $this->client->patch("/notifications/v1beta/accounts/{$this->client->getAccountId()}/notificationsubscriptions/$notificationId", $data, $query);
    }
    
    /**
     * @param int $notificationId
     * 
     * @return array|null
     */
    public function delete(int $notificationId): ?array
    {
        return $this->client->delete("/notifications/v1beta/accounts/{$this->client->getAccountId()}/notificationsubscriptions/$notificationId");
    }
}
