<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText($maxNbChars = 200, $indexSize = 2);
        $userCount = User::count();

        return [
            'title' => $title,
            'slug' =>  Str::slug($title),
            'content' => $this->faker->paragraph($nbSentences = 600, $variableNbSentences = true),
            'notes' => $this->faker->paragraph(),
            'user_id' => rand(1, $userCount),
        ];
    }

}
