<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>fake()->text(),
            'tags' => 'Laravel, PHP, Backend, Full-stack',
            'company'=>fake()->company(),
            'location' =>fake()->city(),
            'website'=>fake()->url(),
            'email' => fake()->unique()->email(),
            'description'=>fake()->text()
        ];
    }
}
