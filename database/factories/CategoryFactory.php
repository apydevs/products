<?php

namespace Apydevs\Products\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Apydevs\Products\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


       $name = $this->faker->text;
        return [
            'name' => $name, // Product title
            'slug'=>Str::slug($name),
            'active' => $this->faker->boolean  // Product status
        ];
    }
}
