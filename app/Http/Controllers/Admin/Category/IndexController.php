<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
// метод view начинает поиск файла с папки view потом идёт папка admin папка category и файл index, точку между ними пишем вместо слэша
        return view ('admin.category.index', compact('categories'));
    }
}
