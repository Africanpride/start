<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(200)->create();
        \App\Models\Article::factory(200)->create();
        \App\Models\Product::factory(200)->create();
        \App\Models\Business::factory(1)->create();
        // $this->call(ArticleSeeder::class);
    }
}
