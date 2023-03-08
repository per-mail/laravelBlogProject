<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
// при помощи этого сидв можно отключать эвенты(события)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
// 100 - это количество создаваемых объектов в таблице
    {
        Category::factory(20)->create();
        $posts = Post::factory(100)->create();
        $tags= Tag::factory(50)->create();


// при помощи метода pluck, вынимаем id из массива постов и создаём массив из id
        foreach ($posts as $post) {
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
