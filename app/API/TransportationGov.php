<?php
namespace App\API;

use Illuminate\Support\Facades\Http;

class TransportationGov {

    protected $base_url;
    protected $records_path;

    public function __construct() {
        $this->base_url = config('services.transportationgov.base_url');
        $this->records_path = config('services.transportationgov.records_path');
    }

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