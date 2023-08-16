<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Author::factory(100)->create();
        \App\Models\Book::factory(200)->create();

         \App\Models\User::factory()->create([
             'name' => 'Rodrigo',
             'email' => 'admin@mail.com',
             'password' => bcrypt('123123123')
         ]);
    }
}
