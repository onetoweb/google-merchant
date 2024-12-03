<?php

namespace Onetoweb\GoogleMerchant\Endpoint\Endpoints;

use Onetoweb\GoogleMerchant\Endpoint\AbstractEndpoint;
use Generator;

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
    
    /**
     * @param string $query
     * 
     * @return Generator|null
     */
    public function searchAll(string $query): ?Generator
    {
        $pageToken = null;
        do {
            
            $results = $this->search([
                'query' => $query,
                'pageSize' => 1000,
                'pageToken' => $pageToken,
            ]);
            
            if (isset($results['results'])) {
                
                foreach($results['results'] as $result) {
                    
                    yield $result;
                }
            }
            
            $pageToken = $results['nextPageToken'] ?? null;
        }
        while ($pageToken !== null);
    }
}
