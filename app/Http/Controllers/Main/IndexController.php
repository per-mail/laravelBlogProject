<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;


class IndexController extends Controller
{
    public function __invoke()
    {
        // делаем перенаправление на страницу с постами, главную страницу пока оставляем пустой
        return redirect()->route('post.index');
    }
}

