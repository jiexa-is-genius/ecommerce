<?php namespace App\Models;

use DB;
use ui;

class Categories
{
    public static function get() {
        return DB::table('cl_categories')
            ->get();
    }
}