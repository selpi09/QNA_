<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

            
        $users = [
            [
               'name'=>'Tatausaha User',
               'nimnip'=>'1234',
               'type'=>0,
               'password'=> '123456',
            ],
            [
               'name'=>'Mahasiswa User',
               'nimnip'=>'321',
               'type'=> 1,
               'password'=> '123456',
            ],
            
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}


