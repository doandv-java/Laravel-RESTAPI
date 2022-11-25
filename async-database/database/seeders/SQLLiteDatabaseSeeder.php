<?php


namespace Database\Seeders;


use App\Models\SQLLite\Authors;
use App\Models\SQLLite\Books;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SQLLiteDatabaseSeeder extends Seeder
{
    public function run()
    {
        Books::truncate();
        Authors::truncate();
        $faker = Factory::create('en_EN');
        for ($i = 0; $i < 60; $i++) {
            $books_number = rand(1, 20);
            $author = Authors::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "bio" => $faker->paragraph,
                "total_books" => $books_number
            ]);
            for ($j = 0; $j < $books_number; $j++) {
                Books::create([
                    "title" => $faker->sentence,
                    "note" => $faker->sentence,
                    "author_id" => $author['id'],
                ]);
            }
        }
    }
}
