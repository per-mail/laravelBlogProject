<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//Главный Seeder - через который будут запускаться все сиды
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
// через метод вызываем массив с классами сидов
    {
        $this->call([
            OrderStatusSeeder::class
        ]);
    }
}
