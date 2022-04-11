<?php

namespace Database\Factories;

use App\Models\PostAndTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostAndTagFactory extends Factory
{
    protected $model = PostAndTag::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "post_id" => $this->faker->numberBetween(1, 20),
            "tag_id" => $this->faker->numberBetween(1, 5)
        ];
    }
}
