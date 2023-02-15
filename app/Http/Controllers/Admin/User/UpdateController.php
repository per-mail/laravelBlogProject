<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
// проверяем массив на наличие данных
        $data = $request->validated();

        $user->update($data);

//  начинает поиск файла с папки view потом идёт папка admin папка user точку между ними пишем вместо слэша
        return view('admin.user.show', compact('user'));
    }
}
