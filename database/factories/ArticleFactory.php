<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'     => $this->faker->sentence,
            'author'    => $this->faker->optional()->name,
            'brief'     => $this->faker->text(200),
            'content' => $this->faker->paragraphs(5, true),
        ];
    }
}
