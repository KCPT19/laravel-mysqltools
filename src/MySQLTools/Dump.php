<?php

namespace KCPT\MySQLTools;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class Dump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a database dump file.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $env = env('APP_ENV');
        $file = "db-". $env . "-" . date('Y-m-d') . ".sql";
        $db = env('DB_DATABASE');
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $cmd = "mysqldump -u $user -p$pass $db > $file";
        $output = shell_exec($cmd);
        $this->info(PHP_EOL.$output.PHP_EOL);
        $this->info('Database dump file created.');

    }
}
