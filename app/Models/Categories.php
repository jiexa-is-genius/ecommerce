<?php namespace App\Models;

use DB;
use ui;

class Categories
{
    public static function get($options = []) {
        $DB = DB::table('cl_categories')
            ->orderBy('weight')
            ->orderBy('caption');

        if(isset($options['take'])) { $DB->take($options['take']); }
        
        return $DB->get();
    }
}