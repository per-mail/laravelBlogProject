<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Category $category)
    {
// проверяем массив на наличие данных
        $data = $request->validated();

        $category->update($data);

//  начинает поиск файла с папки view потом идёт папка admin папка category, точку между ними пишем вместо слэша
        return view('admin.category.show', compact('category'));
    }
}
