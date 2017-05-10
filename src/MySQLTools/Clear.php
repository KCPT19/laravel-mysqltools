<?php

namespace KCPT\MySQLTools;

use DB;
use Illuminate\Console\Command;

class Clear extends Command
{

    protected $signature = 'db:clear';

    protected $description = 'Clear Database of all tables & data.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        if (!$this->confirm('CONFIRM DROP AL TABLES IN THE CURRENT DATABASE? [y|N]')) {
            exit('Drop Tables command aborted');
        }

        $colname = 'Tables_in_' . env('DB_DATABASE');
        $tables = DB::select('SHOW TABLES');
        $droplist = [];

        foreach($tables as $table) {

            $droplist[] = $table->$colname;

        }

        if(count($droplist) > 0) {

            $droplist = implode(',', $droplist);
            DB::beginTransaction();
            DB::statement("SET foreign_key_checks = 0;");
            DB::commit();
            DB::statement("DROP TABLE $droplist");
            DB::commit();
            DB::statement("SET foreign_key_checks = 1;");
            DB::commit();
            $this->comment(PHP_EOL . "If no errors showed up, all tables were dropped" . PHP_EOL);

        } else {

            $this->comment(PHP_EOL . "The database is empty, No tables to drop." . PHP_EOL);

        }

    }
}
