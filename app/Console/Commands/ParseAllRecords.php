<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class ParseAllRecords extends Command
{
    protected $signature = 'api:parse-all-records';

    protected $description = 'Parse records with different offsets sequentially';

    public function handle()
    {
        $limit = 100000;
        $maxOffset = 29; // As you mentioned, there are 30 offsets, so 0 to 29.
        $size = 300;

        for ($offset = 0; $offset <= $maxOffset; $offset++) {
            $this->call('api:parse-records', [
                'limit' => $limit,
                'offset' => $offset,
                'size' => $size
            ]);
        }

        return 0;
    }
}
