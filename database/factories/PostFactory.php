<?php

namespace Database\Factories;

// импортируем модель Post
use App\Models\Post;

// импортируем модель Category
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
// создаём обьект в базе
    {
        return [
// sentence(5) - генерируем заголовок из 5 слов
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->text,
            'preview_image' => $this->faker->imageUrl(),
            'main_image' => $this->faker->imageUrl(),            
// выбираем случайную категорию
            'category_id' => Category::get()->random()->id,
        ];
    }
}
