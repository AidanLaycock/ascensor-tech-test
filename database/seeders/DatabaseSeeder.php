<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = Str::random(32);

         User::factory()->create([
             'name' => 'Example User',
             'email' => 'test@example.com',
             'password' => Hash::make($password)
         ]);

        $this->command->info(sprintf('User created with username: test@example.com and password: %s', $password));

        BlogPost::factory()->has(
            Category::factory()->count(2),
            'categories'
        )->count(5)->create();
    }
}
