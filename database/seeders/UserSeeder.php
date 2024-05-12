<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // [
            //     'first_name' => 'Ivanov',
            //     'last_name'  => 'Ivan',
            //     'vkontakte_id' => 9700485,
            //     'password' => bcrypt(str()->random(20)),
            //     'city_id' => 21
            // ],
            [
                'first_name' => 'Petrov',
                'last_name'  => 'Petr',
                'password' => bcrypt(str()->random(20)),
                'vkontakte_id' => 132632720
            ],

        ];

        foreach($items as $item){
            User::updateOrCreate(
                $item
            );
        }
    }
}
