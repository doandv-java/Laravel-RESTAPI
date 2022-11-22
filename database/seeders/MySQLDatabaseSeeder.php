<?php


namespace Database\Seeders;


use App\Models\MySQL\Authors;
use App\Models\MySQL\Books;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MySQLDatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('en_EN');
        Authors::truncate();
        //Init database for Authors
        for ($i = 0; $i < 100; $i++) {
            Authors::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "bio" => $faker->paragraph
            ]);
        }
        $author_ids = Authors::select("id")->get();
        //Init database for
        Books::truncate();
        for ($i = 0; $i < 1000; $i++) {
            if (count($author_ids) > 0) {
                $author_id = $author_ids[rand(0, count($author_ids) - 1)]['id'];
            } else {
                $author_id = $faker->uuid();
            }
            Books::create([
                "title" => $faker->sentence,
                "note" => $faker->sentence,
                "author_id" => $author_id
            ]);
        }

    }
}
