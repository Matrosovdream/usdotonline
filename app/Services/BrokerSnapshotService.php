<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrokerSnapshotService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.brokersnapshot.api_key');
        $this->baseUrl = config('services.brokersnapshot.base_url');
    }

    private function makeRequest($endpoint, $params = [], $method = 'GET')
    {
        $url = $this->baseUrl . $endpoint;
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->$method($url, $params);

        

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('API request failed: ' . $response->body());
    }

    public function getBrokerDetails($brokerId)
    {
        return $this->makeRequest("/brokers/{$brokerId}");
    }

    public function searchBrokers($queryParams)
    {
        return $this->makeRequest('/brokers/search', $queryParams);
    }

    public function getMarketData($symbol)
    {
        return $this->makeRequest("/marketdata/{$symbol}");
    }

    // Add more methods as per the API documentation
}
