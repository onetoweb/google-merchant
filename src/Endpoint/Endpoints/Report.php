<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Report Endpoint.
 */
class Report extends AbstractEndpoint
{
    /**
     * @param array $data
     * 
     * @return array|null
     */
    public function search(array $data): ?array
    {
        return $this->client->post("/reports/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/reports:search", $data);
    }
}
