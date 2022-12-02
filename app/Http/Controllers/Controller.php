<?php namespace App\Http\Controllers;

use DB;


/*
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
*/

/**
 * @OA\Info(
 *    title="Документация по API",
 *    description="Документация по API",
 *    version="1.0.0",
 * )
 */

class Controller //extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function tests() {
        $categories = [
            'Продукты',
            'Бытовая техника',
            'Компьютеры и офис',
            'Строительство и ремонт',
            'Дом и сад',
            'Спорт и развлечения',
            'Канцтовары для офиса и дома',
            'Игрушки и хобби',
            'Безопасность и защита',
            'Автомобили и мотоциклы',
            'Освещение',
            'Электроника',
            'Красота и здоровье',
            'Обувь',
            'Электронные компоненты и принадлежности',
            'Мобильные телефоны и аксессуары',
            'Инструменты',
            'Мать и ребенок',
            'Мебель',
            'Украшения и аксессуары',
            'Наручные часы',
            'Багаж и сумки',
            'Мужская одежда',
            'Женская одежда',
            'Свадьбы и торжества',
            'Тематическая одежда и униформа',
            'Шиньоны и парики',
            'Детская одежда и обувь',
            'Аксессуары для одежды',
            'Цифровые товары',
        ];

        foreach($categories as $cat) {
            DB::table('cl_catigories')
                ->insert([
                    'caption' => $cat,
                    'created' => DB::raw('now()'),
                ]);
        }
    }
}
