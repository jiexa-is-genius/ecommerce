<?php namespace App\Http\ui;

class ui {

    /**
     * Переводы
     */
    public static function t($str, $options = []) {
        
        foreach($options as $key => $value) {
            $str = str_replace($key, $value, $str);
        }

        return $str;
    }

    public static function json_encode($data) {
        return json_encode($data, JSON_HEX_TAG | JSON_UNESCAPED_UNICODE | ENT_QUOTES);
    }
    public static function json_decode($json) {
        return json_decode($json);
    }

    public static function objectToArray($obj) {
        return json_decode(json_encode($obj), true);
    }
    public static function arrayToObject($arr) {
        return json_decode(json_encode($obj));
    }

    public static function language() {
        return 'ru';
    }

    public static function cacheVersion() {
        return '1.0';
    }

    public static function alert($message, $type = 'success', $autohide = true) {
        return [
            'message' => $message,
            'type' => $type,
            'autohide' => $autohide,
        ];
    }

    public static function isAPI() {
        return \Request::capture()->expectsJson();
    }

    public static function errorsRender($error) {
        if(is_string($error)) { return htmlspecialchars($error); } 

        if(is_array($error) and count($error) == 1) { return htmlspecialchars($error[count($error) - 1]); }
        
        $html = null;
        if(is_array($error)) {
            foreach($error as $msg) {
                $html .= '<li>' . htmlspecialchars($msg) . '</li>';
            }
        }
        if(!is_null($html)) {
            $html = '<ul>' . $html . '</ul>';
        }

        return $html;
    }
}