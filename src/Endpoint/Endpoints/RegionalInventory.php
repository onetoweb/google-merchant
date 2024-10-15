<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * RegionalInventory Endpoint.
 */
class RegionalInventory extends AbstractEndpoint
{
    /**
     * @param string $offerId
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(string $offerId, array $query = [])
    {
        return $this->client->get("/inventories/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/products/$offerId/regionalInventories", $query);
    }
}
