<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
// метод view начинает поиск файла с папки view потом идёт папка admin папка user и файл index, точку между ними пишем вместо слэша
        return view ('admin.user.index', compact('users'));
    }
}
