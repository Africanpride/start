<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 'business_name', 'business_description', 'business_email', 'business_number', 'seo_keywords', 'main'
        return [
            'business_name' => $this->faker->company(),
            'business_description' =>  $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'business_email' =>  $this->faker->email(),
            'twitter_handle' =>  '@africanpride',
            'business_number' =>  $this->faker->e164PhoneNumber(),
            'main' =>  'first',
        ];
    }
}
