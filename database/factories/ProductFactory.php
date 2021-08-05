<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name($maxNbChars = 200, $indexSize = 2);
        $userCount = User::count();
        return [
            'name' => $name,
            'slug' =>  Str::slug($name),
            'description' => $this->faker->paragraph($nbSentences = 600, $variableNbSentences = true),
            'user_id' => rand(1, $userCount),
        ];
    }
}
