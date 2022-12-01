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
            $socket = new \socket;
            
            if(!defined('SOCKET_REQUEST')) { define('SOCKET_REQUEST', 1); }

            $request = json_decode($socketData);
            $event = isset($request->event) ? $request->event : null;

            if($event == 'connect') { $socket->connect($request); }
            if($event == 'disconnect') { $socket->disconnect($request); }
            
        });

    }
}
