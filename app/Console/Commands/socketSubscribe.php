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

        echo('[' . date('Y-m-d H:i:s') . '] SocketSubscribe listener runned!' . PHP_EOL);

        $socket = new \socket;
        require_once(base_path('routes/socket.php'));
        
        Redis::subscribe(['ssub'], function ($socketData) use($socket) {
            $request = json_decode($socketData);
            $event = isset($request->event) ? $request->event : null;
            $body = isset($request->body) ? \ui::objectToArray($request->body) : null;

            if($event == 'connect') { $socket->connect($request); }
            if($event == 'disconnect') { $socket->disconnect($request); }
            
            if(isset($socket->events[$event]['c']) and isset($socket->events[$event]['m'])) {
                $c = new $socket->events[$event]['c']($socket->user($request), $body);
                $c->{$socket->events[$event]['m']}();
            }

        });

    }
}
