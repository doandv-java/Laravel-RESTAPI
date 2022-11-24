<?php
declare(strict_types=1);

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
//        if (app()->environment('local')) {
//            $this->call(DefaultUserSeeder::class);
//        }
        Post::factory(20)->for(
            User::factory()->create([
                'first_name' => 'Duong',
                'last_name' => 'Doan',
                'email' => "administrator@gmail.com"
            ])
        )->create();

    }
}
