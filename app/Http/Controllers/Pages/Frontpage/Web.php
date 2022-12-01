<?php namespace App\Http\Controllers\Pages\Frontpage;

use ui;

/**
 * Главная страница сайта
 */
class Web {

    public function show() {
        return View('v1.pages.frontpage')
            ->withTitle(ui::t('Магазин заголовок'))
            ->withKeywords(ui::t('Ключевые слова'))
            ->withDescription(ui::t('Магазин описание'));
    }

}
