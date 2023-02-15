<?php

namespace App\Http\Controllers\Admin\User;


use App\Models\User;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(User $user)
    {
//  проверяем массив на наличие данных
        $user->delete();
//  начинает поиск файла с папки view потом идёт папка admin папка category, точку между ними пишем вместо слэша
        return redirect()->route('admin.user.index');
    }
}
