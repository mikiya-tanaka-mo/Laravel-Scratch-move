<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();
        Category::truncate();
        Post::truncate();

        // post::factory(parameters: 5)->create();




        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $Personal = Category::create([
        //     'name' => 'Psersonal',
        //     'slug' => 'personal'
        // ]);

        // $Work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // $Family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $Personal->id,
        //     'title' => 'My First Post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => 'This is my first post',
        //     'body' => '<p>This is my first post 
        //     lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $Work->id,
        //     'title' => 'My Second Post',
        //     'slug' => 'my-second-post',
        //     'excerpt' => 'This is my Second post',
        //     'body' => '<p> This is my Second post 
        //     lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. </p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $Family->id,
        //     'title' => 'My Third Post',
        //     'slug' => 'my-third-post',
        //     'excerpt' => 'This is my Third post',
        //     'body' => '<p> This is my Third post 
        //     lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. </p>'
        // ]);
    }
}
