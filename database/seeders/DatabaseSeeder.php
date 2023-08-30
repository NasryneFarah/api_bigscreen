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
       //j'appelle mes différents seeder
       $this->call(RoleSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(TypeSeeder::class);
       $this->call(QuestionSeeder::class);
       $this->call(ChoiceSeeder::class);
    }
}
