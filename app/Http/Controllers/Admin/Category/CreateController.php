<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function __invoke()    {

// метод view начинает поиск файла с папки view потом идёт папка admin папка category и файл create, точку между ними пишем вместо слэша
        return view ('admin.category.create');
    }
}
