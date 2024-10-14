<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;

/**
 * Account Endpoint.
 */
class Account extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts", $query);
    }
    
    /**
     * @param string $accountId
     * 
     * @return array|null
     */
    public function get(string $accountId): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/$accountId");
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function listSubaccounts(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}:listSubaccounts", $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function getBusinessInfo(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/businessInfo", $query);
    }
    
    /**
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function updateBusinessInfo(array $data, array $query): ?array
    {
        return $this->client->patch("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/businessInfo", $data, $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function getAutofeedSettings(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/autofeedSettings", $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|null
     */
    public function getBusinessIdentity(array $query = []): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/businessIdentity", $query);
    }
    
    /**
     * @param string $email
     * 
     * @return array|null
     */
    public function getEmailPreferences(string $email): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users/$email/emailPreferences");
    }
    
    /**
     * @param string $email
     * @param array $data
     * @param array $query
     * 
     * @return array|null
     */
    public function updateEmailPreferences(string $email, array $data, array $query): ?array
    {
        return $this->client->patch("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/users/$email/emailPreferences", $data, $query);
    }
    
    /**
     * @return array|null
     */
    public function getHomepage(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/homepage");
    }
    
    /**
     * @return array|null
     */
    public function listIssues(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/issues");
    }
    
    /**
     * @return array|null
     */
    public function listOnlineReturnPolicies(): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/onlineReturnPolicies");
    }
    
    /**
     * @param string $onlineReturnPolicyName
     * 
     * @return array|null
     */
    public function getOnlineReturnPolicy(string $onlineReturnPolicyName): ?array
    {
        return $this->client->get("/accounts/{$this->client->getVersion()}/accounts/{$this->client->getAccountId()}/onlineReturnPolicies/{$onlineReturnPolicyName}");
    }
}
