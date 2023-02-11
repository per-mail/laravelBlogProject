<?php

namespace App\Http\Controllers\Admin\Tag;


use App\Models\Tag;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
//проверяем массив на наличие данных
        $tag->delete();
////            начинает поиск файла с папки view потом идёт папка admin папка category, точку между ними пишем вместо слэша
        return redirect()->route('admin.tag.index');
    }
}
