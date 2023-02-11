<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
//   переменную category - мы берём из роута '/{category}'
    public function __invoke(Category $category)
    {
//  метод view начинает поиск файла с папки view потом идёт папка admin папка category и файл show, точку между ними пишем вместо слэша
        return view ('admin.category.show', compact('category'));
    }
}
