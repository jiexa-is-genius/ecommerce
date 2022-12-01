<?php namespace App\Models;

use DB;

class Socket 
{
    public static function connect($client, $uid) {
        self::disconnect($client);
        DB::table('users_socket')->insert([
            'client' => $client,
            'uid' => $uid,
        ]);
    }

    public static function disconnect($client) {
        DB::table('users_socket')
            ->where('client', '=', $client)
            ->delete();
    }
    
}
