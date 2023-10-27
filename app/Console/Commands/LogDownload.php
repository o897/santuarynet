<?php

namespace App\Console\Commands;

use App\Models\Log;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class LogDownload extends Command
{
   

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download data from logs table and store it within a text file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $logs = Log::all();
        $data = '';

        foreach ($logs as $log) {
            $data .= $log->id . ', ' . $log->message . "\n";
        }

        $currentTime = Carbon::now()->format('YmdHis');

        Storage::disk('local')->put('logs/'. $currentTime .'.txt', $data);

        $this->info('Logs downloaded and stored within the logs folder');
    }
}
