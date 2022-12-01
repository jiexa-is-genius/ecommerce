<?php

    $socket->event('tests.socket', \App\Http\Controllers\Controller::class, 'testSocket');
    dd($socket);