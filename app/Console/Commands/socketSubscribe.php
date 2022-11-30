<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class socketSubscribe extends Command {
   
    protected $signature = 'socketSubscribe';
    protected $description = 'Command socketSubscribe';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {

        //general is the name of channel to subscribe to
        Redis::subscribe(['ssub'], function ($socketData) {
            $request = json_decode($socketData, true);
            //dump($request);
        });

    }
}
