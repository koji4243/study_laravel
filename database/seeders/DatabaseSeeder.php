<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

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
        $faker = Faker::create();
        \App\Models\Post::factory()->count(10)->create([
            'title' => $faker->realText(10),
            'body' => $faker->realText(50),
            'user_id' => User::factory(),
            'created_at' => now(),
        ]);
        \App\Models\User::factory()->count(10)->create([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'lore' => 1,
            'post_id' => null
        ]);
    }
}
