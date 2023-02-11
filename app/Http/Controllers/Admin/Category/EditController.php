<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Category $category)
    {
// метод view начинает поиск файла с папки view потом идёт папка admin папка category и файл edit, точку между ними пишем вместо слэша
        return view ('admin.category.edit', compact('category'));
    }
}
