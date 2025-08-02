<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
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
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
            
            // User::create([
                //     'name' => 'ReshFams',
                //     'email' => 'reshfams@gmail.id',
        //     'password' => bcrypt('12345'),
        // ]);
        User::create([
                'name' => 'Bayu',
                'username' => 'bayy',
                'email' => 'bayy@cic.ac',
                'password' => bcrypt('12345'),
            ]);
            
            
            User::factory(3)->create();

            Category::create([
                'name' => 'Sports',
                'slug' => 'sports'
            ]);
            Category::create([
                'name' => 'Music',
                'slug' => 'music'
            ]);
            Category::create([
                'name' => 'Film',
                'slug' => 'film'
            ]);
            
            Post::factory(20)->create();
            
            
        // Post::create([
        //     'title' => 'Post 1',
        //     'slug' => 'post-1',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut. Voluptate nostrum totam corporis minus cupiditate. Consectetur iure laboriosam nostrum tempore error dolores quas dolorum voluptatum! Facere earum voluptatibus aperiam nostrum, quaerat quibusdam amet esse repellat ea sint et. Explicabo dolorem quidem alias cum enim quos fugit repellat in. Atque, natus necessitatibus. Excepturi porro odit ex adipisci a corrupti repellat id, fugit quam laudantium vero sapiente. Cum facere alias provident dolore dolorem expedita asperiores eaque.</p> <p>Quaerat sequi quo at magni adipisci ex porro amet, quos facilis! Doloremque placeat perspiciatis velit, quis officia explicabo! Reprehenderit provident sed expedita dolore. Animi, accusantium voluptates? Ipsam nihil in enim nulla odit quo ut porro error quisquam inventore iste libero ipsa, dolore repellendus dolor nobis totam voluptatum velit numquam qui assumenda beatae repudiandae? Ratione, harum eum temporibus molestias quis soluta sit at, officiis ipsam dolorem necessitatibus quo rem.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Post 2',
        //     'slug' => 'post-2',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut. Voluptate nostrum totam corporis minus cupiditate. Consectetur iure laboriosam nostrum tempore error dolores quas dolorum voluptatum! Facere earum voluptatibus aperiam nostrum, quaerat quibusdam amet esse repellat ea sint et. Explicabo dolorem quidem alias cum enim quos fugit repellat in. Atque, natus necessitatibus. Excepturi porro odit ex adipisci a corrupti repellat id, fugit quam laudantium vero sapiente. Cum facere alias provident dolore dolorem expedita asperiores eaque.</p> <p>Quaerat sequi quo at magni adipisci ex porro amet, quos facilis! Doloremque placeat perspiciatis velit, quis officia explicabo! Reprehenderit provident sed expedita dolore. Animi, accusantium voluptates? Ipsam nihil in enim nulla odit quo ut porro error quisquam inventore iste libero ipsa, dolore repellendus dolor nobis totam voluptatum velit numquam qui assumenda beatae repudiandae? Ratione, harum eum temporibus molestias quis soluta sit at, officiis ipsam dolorem necessitatibus quo rem.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
        // Post::create([
        //     'title' => 'Post 3',
        //     'slug' => 'post-3',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut. Voluptate nostrum totam corporis minus cupiditate. Consectetur iure laboriosam nostrum tempore error dolores quas dolorum voluptatum! Facere earum voluptatibus aperiam nostrum, quaerat quibusdam amet esse repellat ea sint et. Explicabo dolorem quidem alias cum enim quos fugit repellat in. Atque, natus necessitatibus. Excepturi porro odit ex adipisci a corrupti repellat id, fugit quam laudantium vero sapiente. Cum facere alias provident dolore dolorem expedita asperiores eaque.</p> <p>Quaerat sequi quo at magni adipisci ex porro amet, quos facilis! Doloremque placeat perspiciatis velit, quis officia explicabo! Reprehenderit provident sed expedita dolore. Animi, accusantium voluptates? Ipsam nihil in enim nulla odit quo ut porro error quisquam inventore iste libero ipsa, dolore repellendus dolor nobis totam voluptatum velit numquam qui assumenda beatae repudiandae? Ratione, harum eum temporibus molestias quis soluta sit at, officiis ipsam dolorem necessitatibus quo rem.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
        // Post::create([
        //     'title' => 'Post 4',
        //     'slug' => 'post-4',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut.',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, quos? Ad, architecto nesciunt deserunt animi officiis ut. Voluptate nostrum totam corporis minus cupiditate. Consectetur iure laboriosam nostrum tempore error dolores quas dolorum voluptatum! Facere earum voluptatibus aperiam nostrum, quaerat quibusdam amet esse repellat ea sint et. Explicabo dolorem quidem alias cum enim quos fugit repellat in. Atque, natus necessitatibus. Excepturi porro odit ex adipisci a corrupti repellat id, fugit quam laudantium vero sapiente. Cum facere alias provident dolore dolorem expedita asperiores eaque.</p> <p>Quaerat sequi quo at magni adipisci ex porro amet, quos facilis! Doloremque placeat perspiciatis velit, quis officia explicabo! Reprehenderit provident sed expedita dolore. Animi, accusantium voluptates? Ipsam nihil in enim nulla odit quo ut porro error quisquam inventore iste libero ipsa, dolore repellendus dolor nobis totam voluptatum velit numquam qui assumenda beatae repudiandae? Ratione, harum eum temporibus molestias quis soluta sit at, officiis ipsam dolorem necessitatibus quo rem.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
    }
}
