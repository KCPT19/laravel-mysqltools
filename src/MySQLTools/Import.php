<?php

namespace KCPT\MySQLTools;

use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import a database dump file.';

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

        $files = array();
        foreach (glob("*.sql") as $file) {
            $files[] = $file;
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
