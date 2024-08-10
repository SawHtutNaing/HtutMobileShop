<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateJobTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate:job-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate job-related tables';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $tables = ['jobs', 'failed_jobs', 'job_batches', 'failed_import_rows']; // Add other job-related tables if necessary

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Job-related tables have been truncated.');
    }
}
