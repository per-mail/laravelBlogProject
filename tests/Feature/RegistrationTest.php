<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    // RefreshDatabase - необходимо, когда тестовые действия могут повлиять на базу данных, 
    // как в этом примере, регистрация добавляет новую запись в таблицу users базы данных.
    // Для этого потребуется создать отдельную тестовую базу данных, 
    // которая будет обновляться с помощью команды php artisan migrate:fresh
    // каждый раз при выполнении тестов.
    // RefreshDatabase - обновляет базу после тестирования
    use RefreshDatabase;
    
// тест проверяет правильность загрузки формы
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

//  тест проверяет  хорошо ли работает отправка
//  в этом тесте мы утверждаем, что пользователь успешно прошёл аутентифицирован и перенаправлен на правильную домашнюю страницу
    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
//  мы проверяем фактические данные в базе данных
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

//  используем утверждения Тестирования Базы Данных https://laravel.com/docs/9.x/database-testing#available-assertions
//  assertDatabaseCount('users', 1); - утверждение,что в таблице  users есть одна запись
        $this->assertDatabaseCount('users', 1);

// утверждение,что в таблице users есть запись с почтой test@example.com'
        $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
     ]);
    }
}
// assertions (утверждения)
// $this->assertContains(4, [1, 2, 3,]); // содержит массив указанное значение
// $this->assertStringContainsString('тест', 'нетест'); // содержит строка подстроку
// $this->assertCount(0, []); // количество элементов в массиве
// $this->assertEmpty(['foo']); // является ли значение пустым
// $this->assertEquals(1, 0); // эквивалентность значений
// $this->assertFalse(true); // логическая операция
// $this->assertGreaterThan(2, 1); // больше чем
// $this->assertIsArray(null); // значение должно быть массивом
// $this->assertObjectHasAttribute('foo', new stdClass); // содержит ли класс атрибут