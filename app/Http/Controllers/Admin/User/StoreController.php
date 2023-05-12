<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str; 
use App\Jobs\StoreUserJob;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();

//отправка письма пользователю при регистрации
//// генерируем пароль и отправляем его на почту пользователя
//        $password = Str::random(10);
////  скрываем пароль при помощи метода Hash, необходимая процедура и переназначаем скрытый пароль переменной $data
//        $data['password'] = Hash::make($password);
////  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
//        User::firstOrCreate(['email' => $data['email']], $data);
////  Отправляем письмо с паролем пользователю
////        Mail::to($data['email'])->send(new PasswordMail($password));
//        event(new Registred($user));

// этот блок переместили в job.php
// //  скрываем пароль при помощи метода Hash, необходимая процедура и переназначаем скрытый пароль переменной $data
//         $data['password'] = Hash::make($data['password']);
// //  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
//         User::firstOrCreate(['email' => $data['email']], $data);
        
// запускаем StoreUserJob, $data - берём из файла StoreUserJob.php (private $data)
          StoreUserJob::dispatch($data);


//  начинает поиск файла с папки view потом идёт папка admin папка user, точку между ними пишем вместо слэша
        return redirect()->route('admin.user.index');
    }
}
