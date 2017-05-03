<?php

namespace KCPT\MySQLTools;

use Illuminate\Console\Command;

class Import extends Command
{

    protected $signature = 'db:import';

    protected $description = 'Import a database dump file.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $files = array();
        foreach (glob("*.sql") as $file) {
            $files[] = $file;
        }

        if( count($files) < 1 ) {
            $this->error(PHP_EOL . "No .sql files found in current folder!" . PHP_EOL . "Must move the .sql file to the current directory" . PHP_EOL);
            return;
        }

        $file = $this->anticipate('Enter database dump filename', $files);
        $exists = file_exists($file);

        if( ! $exists ) {

            $this->error(PHP_EOL."File Not Found!".PHP_EOL);

        } else {

            $db = env('DB_DATABASE');
            $user = env('DB_USERNAME');
            $pass = env('DB_PASSWORD');
            $cmd = "mysql -u $user -p$pass $db < $file";
            $output = "";
            $output = shell_exec($cmd);
            $this->info(PHP_EOL.$output.PHP_EOL);
            $this->info('Dump imported.');

        }
    }
}
