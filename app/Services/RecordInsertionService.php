<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\Models\DotRecord;
use App\Models\DotRecordProperty;
use App\Models\DotRecordSource;


class RecordInsertionService
{
    protected $mainRecords = [];
    protected $recordProperties = [];
    protected $chunkSize = 100000;
    protected $sql_file;

    public function __construct()
    {
        $this->sql_file = base_path('records.sql');
    }

    public function insertRecords(array $records)
    {

        foreach ($records as $record) {
            $mainRecordData = [
                'name' => $record['dot_number'],
                'source_id' => 1,
            ];

            $this->mainRecords[] = $mainRecordData;

            // Prepare properties
            $properties = $record;
            unset($properties['dot_number']);

            // Assume each record has a 'properties' key containing an array of properties
            foreach ($properties as $propertyName => $propertyValue) {
                $this->recordProperties[] = [
                    'property_name' => $propertyName,
                    'property_value' => $propertyValue,
                ];
            }

            // Bulk insert once we reach the chunk size
            if (count($this->mainRecords) >= $this->chunkSize) {
                $this->insertChunk();
            }
        }

        // Insert any remaining records after the loop
        if (!empty($this->mainRecords)) {
            $this->insertChunk();
        }
        

        /*
        foreach( $records as $record ) {

            DotRecord::create([
                'name' => $record['dot_number'],
                'source_id' => 1
            ]);

            $all_records = DotRecord::all();

        }
        */

    }

    protected function insertChunk()
    {

        // Insert into the main_records table
        DB::transaction(function () {

            // Upsert the main records
            foreach ($this->mainRecords as $mainRecord) {
                DotRecord::updateOrCreate(['name' => $mainRecord['name']], $mainRecord);
            }

            // Retrieve the last inserted main record IDs for the foreign key association
            $lastInsertedIds = DotRecord::whereIn('name', array_column($this->mainRecords, 'name'))
                ->pluck('id')
                ->toArray();

            // Update the foreign key references in the recordProperties array
            foreach ($this->recordProperties as $index => &$property) {
                $property['dot_record_id'] = $lastInsertedIds[intdiv($index, $this->chunkSize)];
            }

            $sql = '';

            // Prepare remove old properties sql query
            $sql = "DELETE FROM dot_record_properties WHERE dot_record_id IN (". implode(',', $lastInsertedIds) .");". PHP_EOL;

            // Prepare sql query and insert into the file
            foreach ($this->recordProperties as $index => &$property) {

                $sql .= "INSERT INTO dot_record_properties (dot_record_id, property_name, property_value) VALUES ";
                $sql .= "({$property['dot_record_id']}, '{$property['property_name']}', '". addslashes($property['property_value']) ."');". PHP_EOL;
                
            }

            $file = fopen($this->sql_file, "a");
            fwrite($file, $sql);
            fclose($file);

            //DotRecordProperty::insert($this->recordProperties);
            
        });

        // Clear the arrays for the next chunk
        $this->mainRecords = [];
        $this->recordProperties = [];
    }

    private function executeSql()
    {
        
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');

        $sqlPath = $this->sql_file;
        $command = "mysql -u{$username} -p{$password} -h {$host} {$database} < {$sqlPath}";

        shell_exec($command);

    }

}
