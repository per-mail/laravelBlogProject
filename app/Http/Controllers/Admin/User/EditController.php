<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
// метод view начинает поиск файла с папки view потом идёт папка admin папка user и файл edit, точку между ними пишем вместо слэша
        return view ('admin.user.edit', compact('user', 'roles'));
    }
}
