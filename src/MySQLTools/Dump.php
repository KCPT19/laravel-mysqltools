<?php

namespace KCPT\MySQLTools;

use Illuminate\Console\Command;

class Dump extends Command
{

    protected $signature = 'db:dump';

    protected $description = 'Create a database dump file.';

    public function __construct()
    {
        parent::__construct();
    }

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
