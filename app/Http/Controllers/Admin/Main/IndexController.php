<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
// метод view начинает поиск файла с папки view потом идёт папка admin, папка main и файл index, точку между ними пишем вместо слэша
        return view ('admin.main.index');
    }
}
