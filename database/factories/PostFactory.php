<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => implode(' ', $this->faker->words()),
            'lead' => $this->faker->sentence(10),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(rand(5,15))) . '</p>',
            'topic_id' => Topic::all()->random()->id,
            'author_id' => User::all()->random()->id,
        ];
    }
}
