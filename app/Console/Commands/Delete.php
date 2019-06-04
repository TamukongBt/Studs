<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Bookedhall;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booked:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks all old data and deletes';

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
        Bookedhall::where('datetime', '<', Carbon::now())->each(function ($item) {
            $item->delete();
        });
    }
}
