<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Terms Of Service Endpoint.
 */
class TermsOfService extends AbstractEndpoint
{
    /**
     * @param array $query
     * 
     * @return array|null
     */
    public function retrieveLatest(array $query): ?array
    {
        return $this->client->get("/accounts/v1beta/termsOfService:retrieveLatest", $query);
    }
    
    /**
     * @param string $name
     * 
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/accounts/v1beta/termsOfService/$name");
    }
    
    /**
     * @param string $name
     * @param array $query
     * 
     * @return array|null
     */
    public function accept(string $name, array $query): ?array
    {
        return $this->client->get("/accounts/v1beta/termsOfService/$name:accept", $query);
    }
}
