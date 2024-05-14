<?php

namespace Apydevs\Products\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Apydevs\Products\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 100, 1000); // Generate a base price
        $vatRate = $this->faker->randomElement([5, 10, 20]); // VAT rate percentages
        $title =  $this->faker->words(3, true);
        return [
            'title' => $title,  // Product title
            'slug'=>Str::slug($title),
            'type' => $this->faker->randomElement(['Electronics', 'Household', 'Furniture', 'Mobile']),  // Product type
            'description' => $this->faker->sentence,  // Product description
            'manufacture' => $this->faker->company,  // Manufacturer name
            'model' => $this->faker->bothify('Model-####'),  // Product model identifier
            'quantity' => $this->faker->numberBetween(10, 100),  // Stock quantity
            'low_quantity' => 5,  // Threshold for low quantity alert
            'tags' => $this->faker->words(3, true),  // Tags for the product, concatenated into a string
            'vat_rate' => $vatRate,  // VAT rate
            'vat' => ($price * ($vatRate / 100)),  // Calculated VAT based on the price
            'price' => $price,  // Product price
            'supplier_ref' => $this->faker->numerify('Supplier-###'),  // Supplier reference
            'category_id' => $this->faker->numberBetween(1, 10),  // Category ID, assumes categories are numbered 1-10
            'pre-order' => $this->faker->boolean,  // Whether the product is available for pre-order
            'status' => 'active'  // Product status
        ];
    }
}
