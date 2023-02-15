<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
//   переменную category - мы берём из роута '/{category}'
    public function __invoke(User $user)
    {
//  метод view начинает поиск файла с папки view потом идёт папка admin папка user и файл show, точку между ними пишем вместо слэша
        return view ('admin.user.show', compact('user'));
    }
}
