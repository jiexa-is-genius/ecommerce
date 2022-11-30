<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class socketSubscribe extends Command {
   
    protected $signature = 'socketSubscribe';
    protected $description = 'Command socketSubscribe';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        //general is the name of channel to subscribe to
        Redis::subscribe(['general'], function ($message) {
            //message in here is the data strring sent/publish from nodejs 
            $messageArray = json_decode($message, true);
            //convert to php associative array
            //lets echo the message we receive from node
            dump($message);
        });
    }
}
