<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
        Category::firstOrCreate($data);
//  начинает поиск файла с папки view потом идёт папка admin папка category, точку между ними пишем вместо слэша
        return redirect()->route('admin.category.index');
    }
}
