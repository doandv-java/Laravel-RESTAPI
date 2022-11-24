<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Shared\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{

    public function run()
    {
        User::factory()->create([
            'first_name'=>'Duong',
            'last_name'=>'Doan',
            'email'=>'administrator@gmail.com',


        ]);
    }
}
