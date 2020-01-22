<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class CustemCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custem:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all inactive Pendaftars';

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
        DB::table('pendaftars')->where('kode_cobranding', 1)->delete();
        $this->info('All Inactive pendaftars are delete successfull!!');
    }
}
