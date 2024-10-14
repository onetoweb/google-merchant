<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Terms Of Service Endpoint.
 */
class AccountTermsOfService extends AbstractEndpoint
{
    /**
     * @param array $query
     * 
     * @return array|null
     */
    public function retrieveLatest(array $query): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/termsOfService:retrieveLatest", $query);
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/termsOfService/$name");
    }
}
