<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\Post\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
