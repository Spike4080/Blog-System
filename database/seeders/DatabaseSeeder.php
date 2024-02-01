<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
<<<<<<< HEAD
        // create a category with each category has 20 blogs
=======
        // Blog::factory(200)->create();

        // Create a category with each category has 20 blogs
>>>>>>> origin/master
        Category::factory(3)
            ->has(Blog::factory()->count(20))
            ->create();
    }
}
