<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class CreateController extends Controller
{
    public function __invoke()    {
        $roles = User::getRoles();
// метод view начинает поиск файла с папки view потом идёт папка admin папка user и файл create, точку между ними пишем вместо слэша
        return view ('admin.user.create', compact('roles'));
    }
}
