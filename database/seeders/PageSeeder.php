<?php

namespace Database\Seeders;


use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'title' => 'Политика обработки персональных данных',
                'content' => fake()->paragraph(),
                'slug' => '/policy',
                'status' => 1,
            ],
            [
                'title' => 'Пользовательское соглашение',
                'content' => fake()->paragraph(),
                'slug' => '/policy-agree',
                'status' => 1,
            ],

        ];

        foreach($items as $item){
            Page::updateOrCreate(
                $item
            );
        }
    }
}
