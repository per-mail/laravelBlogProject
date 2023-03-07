<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// контроллер для мзучения темтирования
class UserController extends Controller
{
//    функция возвращает пагинацию со всеми юзерами
    public function index()
    {
        return UserResource::collection(User::paginate());
    }


    public function store(Request $request)
    {
       //
    }
}
