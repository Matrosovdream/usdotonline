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
    protected $signature = 'api:parse-records {totalRecords=10000} {offset=0} {chunkSize=200}';

    protected $description = 'Parse records from API in chunks';

    public function handle()
    {
        ini_set('max_execution_time', 10000);
        ini_set('memory_limit', '3000M');

        $totalRecords = $this->argument('totalRecords');
        $offset = $this->argument('offset');
        $chunkSize = $this->argument('chunkSize');

        // Remove all records before
        //DB::table('dot_record')->delete();

        DotRecordSource::updateOrCreate(['name' => 'Gov'], ['name' => 'Gov']);

        $recordService = new RecordInsertionService();
        $api = new TransportationGov();

        // Get records from API
        $records = $api->getRecords($totalRecords, $offset);

        // Split records into chunks
        $chunks = array_chunk($records, $chunkSize);

        //dd($chunks);

        // Process each chunk
        $count = 0;
        foreach ($chunks as $chunk) {
            
            $recordService->insertRecords($chunk);

            $count += count($chunk);
            $this->info("Processing records from offset: $count");

        }

        $this->info('All records processed successfully.');

        /*
        for ($currentOffset = $offset; $currentOffset < $totalRecords; $currentOffset += $chunkSize) {
            $this->info("Processing records from offset: $currentOffset");

            $records = $api->getRecords($chunkSize, $currentOffset);

            $recordService->insertRecords($records);
        }
        */
        
    }

    protected function processRecord($record)
    {
        echo "Processing record: " . json_encode($record) . PHP_EOL;
    }
}
