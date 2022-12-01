<?php namespace App\Http\ui;

class socket {

    /*protected $redis = null;
    
    function __construct($event = null) {
        $this->redis = new \Predis\Client([ 'database' => 5 ]);
    }*/

    public function connect($request) {
        if(isset($request->client)) {
            \App\Models\Socket::connect($request->client, $this->socketUID($request));
        }
    }

    public function disconnect($request) {
        if(isset($request->client)) {
            \App\Models\Socket::disconnect($request->client);
        }
    }

    public function sid($cookies) {
        $aStrCookies = explode(';', $cookies);
        $sid = null;

        foreach($aStrCookies as $strCookie) {
            if (strpos($strCookie, \App\Models\User::sidPrefix()) !== false) {
                $tmpCookie = explode('=', $strCookie);
                $sid = isset($tmpCookie[count($tmpCookie) - 1]) ? trim($tmpCookie[count($tmpCookie) - 1]) : null;
            }
        }
        return $sid;
    }

    public function bearer($request) {

    }

    public function socketUID($request) {
        // Аутинтификация по сессии пользователя
        $sid = $this->sid(isset($request->cookies) ? $request->cookies : null);
        if(!is_null($sid)) {
            return \App\Models\User::bySID($sid);
        }

        $bearer = $this->bearer(isset($request->headers) ? $request->headers : null);
        //dump($request);
        return 1;
    }

    public function event($alias, $controller, $method) {

    } 

}