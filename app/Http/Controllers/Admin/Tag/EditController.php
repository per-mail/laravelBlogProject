<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Http\Controllers\Controller;


class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
// метод view начинает поиск файла с папки view потом идёт папка admin папка category и файл edit, точку между ними пишем вместо слэша
        return view ('admin.tag.edit', compact('tag'));
    }
}
