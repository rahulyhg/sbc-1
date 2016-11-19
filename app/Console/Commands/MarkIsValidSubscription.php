<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Subscription;

class MarkIsValidSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mark_is_valid_subscription_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'it is use for mark is is valid subscription through their status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Subscription::whereActive(1)->update(['is_valid' => true]);
    }
}
