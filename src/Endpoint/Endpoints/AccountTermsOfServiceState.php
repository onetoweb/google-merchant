<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Terms Of Service State Endpoint.
 */
class AccountTermsOfServiceState extends AbstractEndpoint
{
    /**
     * @return array|null
     */
    public function retrieveForApplication(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/termsOfServiceAgreementStates:retrieveForApplication");
    }
    
    /**
     * @return array|null
     */
    public function get(string $name): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/termsOfServiceAgreementStates/$name");
    }
}
