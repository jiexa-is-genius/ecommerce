<?php namespace App\Http\Controllers;

class SocketController
{
    
    public $user = null;
    public $params = null;
    
    public function __construct($user, $params) {
        $this->user = $user;
        $this->params = $params;
    }

    public function testSocket() {
        dump($this->user, $this->params);
    }

}
