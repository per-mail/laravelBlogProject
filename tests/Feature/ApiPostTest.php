<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use App\Models\Post;

class ApiPostTest extends TestCase
{
    // RefreshDatabase - необходимо, когда тестовые действия могут повлиять на базу данных, 
    // как в этом примере, регистрация добавляет новую запись в таблицу users базы данных.
    // Для этого вам потребуется создать отдельную тестовую базу данных, 
    // которая будет обновляться с помощью команды php artisan migrate:fresh
    // каждый раз при выполнении тестов.
    // use RefreshDatabase;
    
// тест проверяет правильность загрузки формы
    public function test_create_post_can_be_rendered()
    {
        $response = $this->get('/admin/posts/create');

        $response->assertStatus(302);
    }

//  тест проверяет  хорошо ли работает отправка
//  в этом тесте мы утверждаем, что пользователь успешно прошёл аутентифицирован и перенаправлен на правильную домашнюю страницу
    public function test_new_post()
    {
//  обращаемся к фабрике постов и создаём один пост
//  Метод create инициализирует экземпляры модели и сохраняет их в базе данных 
       $post = Post::factory()->create();


//  assertDatabaseCount('users', 1); - утверждение,что в таблице posts есть одна запись
        $this->assertDatabaseCount('posts', 100);

    }
}

//  php artisan test