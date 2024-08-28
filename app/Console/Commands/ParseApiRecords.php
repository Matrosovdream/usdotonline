<?php
namespace App\Console\Commands;

use App\Models\DotRecordSource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Services\RecordInsertionService;
use App\API\TransportationGov;

class ParseApiRecords extends Command
{
    protected $signature = 'api:parse-records {totalRecords=10000} {chunkSize=100}';

    protected $description = 'Parse records from API in chunks';

    public function handle()
    {

        ini_set('max_execution_time', 10000);
        ini_set('memory_limit', '512M');

        $totalRecords = $this->argument('totalRecords');
        $chunkSize = $this->argument('chunkSize');

        // Remove all records before
        DB::table('dot_record')->delete();

        DotRecordSource::create(['name' => 'Gov']);

        $recordService = new RecordInsertionService();
        $api = new TransportationGov();

        for ($offset = 0; $offset < $totalRecords; $offset += $chunkSize) {
            $this->info("Processing records from offset: $offset");

            $records = $api->getRecords($chunkSize, $offset);

            $recordService->insertRecords($records);

        }

        $this->info('All records processed successfully.');
    }

    protected function processRecord($record)
    {
        echo "Processing record: " . json_encode($record) . PHP_EOL;
    }
}
