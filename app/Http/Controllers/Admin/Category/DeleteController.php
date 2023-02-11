<?php

namespace App\Http\Controllers\Admin\Category;


use App\Models\Category;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
//  проверяем массив на наличие данных
        $category->delete();
//  начинает поиск файла с папки view потом идёт папка admin папка category, точку между ними пишем вместо слэша
        return redirect()->route('admin.category.index');
    }
}
