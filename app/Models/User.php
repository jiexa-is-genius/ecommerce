<?php namespace App\Models;

use DB;
use ui;

class User
{
    
    public static function auth() {
        $user = self::get();
        return isset($user->uid);
    }

    public static function get($uid = null, $hidePassword = false) {
        $user = null;
        $toCache = false;
        
        if(is_null($uid)) {
            $toCache = true;

            if(defined('CURRENT_USER_UID')) {
                $uid = intval(CURRENT_USER_UID);
            } else {
                if(\ui::isAPI()) {
                    $uid = self::Bearer();
                } else {
                    $uid = self::bySID();
                }

                define('CURRENT_USER_UID', $uid);
            }
        }

        if(!is_null($uid)) {
            // Тут непосредственно работа с пользователем
            if(!$toCache or !defined('CURRENT_USER_DATA')) {
                $user = DB::table('users')
                    ->where('uid', '=', $uid)
                    ->first(self::fields($hidePassword));
                    
                DB::table('users')->where('uid', '=', $uid)
                    ->update(['visited' => DB::raw('now()')]);
            }
            
            // Дальше кэшируем пользователя, если он текущий для сессии
            if($toCache and !defined('CURRENT_USER_DATA')) {
                define('CURRENT_USER_DATA', base64_encode(ui::json_encode($user)));
            }

            if($toCache and defined('CURRENT_USER_DATA')) {
                $user = ui::json_decode(base64_decode(CURRENT_USER_DATA));
            }
        }

        return $user;
    }

    public static function byEmail($email, $hidePassword = false) {
        $user = null;
        $u = DB::table('users')->where('email', '=', $email)->first(['uid']);
        
        if(isset($u->uid)) {
            $user = self::get($u->uid, $hidePassword);
        }
        
        return $user;
    }

    public static function byUID($uid, $hidePassword = false) {
        return self::get($uid, $hidePassword);
    }

    public static function bySID($sid = null) {
        
        if(is_null($sid)) {
            $cookies = isset($_COOKIE) ? $_COOKIE : [];
            foreach($cookies as $cookieName => $cookieValue) {
                if (strpos($cookieName, self::sidPrefix()) !== false) {
                    self::sidSET($cookieName, $cookieValue);
                    $sid = $cookieValue;
                    break;
                }
            }
        }

        $u = DB::table('users')
            ->join('users_session', 'users_session.uid', '=', 'users.uid')
            ->where('users_session.sid', '=', $sid)
            ->first(['users.uid']);
        
        return isset($u->uid) ? $u->uid : null;
    }

    public static function sidClear() {
        $cookies = isset($_COOKIE) ? $_COOKIE : [];
        foreach($cookies as $cookieName => $cookieValue) {
            if (strpos($cookieName, self::sidPrefix()) !== false) {
                \DB::table('users_session')->where('sid', '=', $cookieValue)->delete();
                setcookie($cookieName, null, -1, '/', request()->getHost(), false, false);
            }
        }
    }

    public static function sidSET($name, $value) {
        setcookie($name, $value, time() + 60*60*24*365, '/', request()->getHost(), false, false);
    }

    public static function loginWEB($user) {
        self::sidClear();
        
        $sidName = self::sidPrefix() . \Str::random(50);
        $sidValue = \Str::random(150);
        
        self::sidSET($sidName, $sidValue);
        
        DB::table('users_session')->insert([
            'uid' => $user->uid,
            'sid' => $sidValue,
            'ip' => request()->ip(),
            'userAgent' => request()->userAgent(),
            'created' => DB::raw('now()'),
        ]);
    }

    public static function loginAPI($user) {
        
    }

    public static function insert($request) {
        return \DB::table('users')->insertGetId([
            'email' => $request['email'],
            'password' => \Hash::make($request['password']),
            'created' => DB::raw('now()'),
            'updated' => DB::raw('now()'),
        ]);
    }

    public static function sidPrefix() {
        return 'passport_';
    }

    public static function fields($hidePassword = true) {
        $f = [
            'uid', 
            'email', 
            'created', 
            'updated', 
            'confirmed', 
            'visited', 
        ];

        if($hidePassword) { $f[] = 'password'; }
        return $f;
    }
}