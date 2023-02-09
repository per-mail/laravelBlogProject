<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
// метод view начинает поиск файла с папки view потом идёт папка admin папка categories и файл create, точку между ними пишем вместо слэша
        return view ('admin.categories.create');
    }
}
