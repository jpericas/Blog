<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'url_clean' => $this->faker->slug,
            'content' => $this->faker->text(800),
            'posted' => $this->faker->randomElement(['yes', 'not']),
            'categories_id' => Categories::all()->random()->id,
            'user_id' => User::all()->random()->id 
        ];
    }
}
