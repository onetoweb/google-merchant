<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * LocalInventory Endpoint.
 */
class LocalInventory extends AbstractEndpoint
{
    /**
     * @param string $offerId
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(string $offerId, array $query = []): ?array
    {
        return $this->client->get("/inventories/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/products/$offerId/localInventories", $query);
    }
}
