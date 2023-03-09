<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        Subscriber::factory()->count(5)->create();
//        Site::factory()->count(5)->create();
        Post::factory()->count(5)->create();
    }
}
