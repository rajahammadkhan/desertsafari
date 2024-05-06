<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->text(25),
            'price' => $this->faker->numberBetween($min = 100, $max = 900),
            'sku' => $this->faker->text(25),
            'brand_size' => $this->faker->text(25),
            'chart_size' => $this->faker->text(25),
            'weight' => $this->faker->text(25),
            'condition' => $this->faker->text(25),
            'colors' => $this->faker->text(25),
            'size' => $this->faker->text(25),
            'descriptions' => $this->faker->text(100),
            'additional_info' => $this->faker->text(25),
            'shipping' => $this->faker->text(25),
            'thumbnail' => $this->faker->imageUrl($width = 670, $height = 800),
            'product_images' => $this->faker->imageUrl($width = 670, $height = 800),
            'in_stock' => $this->faker->text(25),
            'slug' => Str::slug($this->faker->text(25)),
        ];
    }
}
