<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class EditController extends Controller
{
    public function __invoke(Comment $comment)
    {
// метод view начинает поиск файла с папки view потом идёт папка personal, папка comment и файл edit, точку между ними пишем вместо слэша
        return view ('personal.comment.edit', compact('comment'));
    }
}
