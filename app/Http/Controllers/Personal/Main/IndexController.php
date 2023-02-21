<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {
//        , compact('data')
//  метод view начинает поиск файла с папки view потом идёт папка personal, папка main и файл index, точку между ними пишем вместо слэша
        return view ('personal.main.index');
    }
}
