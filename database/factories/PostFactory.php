<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostAndTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            "title" => $this->faker->text(40),
            "content" => $this->faker->text(1500),
            "created_at" => $this->faker->dateTimeBetween()
        ];
    }

    public function configure(): PostFactory
    {
        return $this->afterCreating(function (Post $post) {
            PostAndTag::factory()->create([
                'post_id' => $post->id
            ]);
        });
    }
}
