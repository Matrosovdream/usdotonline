<?php
namespace App\API;

use Illuminate\Support\Facades\Http;

class TransportationGov {

    private $base_url = 'https://data.transportation.gov/';
    private $records_path = 'resource/az4n-8mr2.json';

    public function getRecords($limit = 100, $offset = 0) {

        $url = $this->base_url . $this->records_path;
        $response = Http::get($url, [
            '$limit' => $limit,
            '$offset' => $offset,
        ]);

        if ($response->successful()) {
            return $response->json();
        } else {
            return [];
        }

    }

}