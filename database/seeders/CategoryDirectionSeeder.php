<?php

namespace Database\Seeders;

use App\Models\CategoryDirection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryDirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Достигай!',
                'sort' => 100,
            ],
            [
                'title' => 'Помогай!',
                'sort' => 200,
            ],
            [
                'title' => 'Вдохновляй!',
                'sort' => 300,
            ],
            [
                'title' => 'Созидай!',
                'sort' => 400,
            ],
            [
                'title' => 'Объединяй!',
                'sort' => 500,
            ],
        ];


        foreach($items as $item){
            CategoryDirection::updateOrCreate(
                $item
            );
        }
    }
}
