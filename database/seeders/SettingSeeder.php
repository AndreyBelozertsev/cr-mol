<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $items = [
            [
                'key' => 'organization',
                'value' => 'Государственный комитет молодежной политики Республики Крым, АНО «Дом Молодежи»',
            ],
            [
                'key' => 'address',
                'value' => 'г. Симферополь, Сергеева-Ценского, д. 12/4, 3 этаж',
            ],
            [
                'key' => 'email',
                'value' => 'molvol@gkmp.rk.gov.ru',
            ],
            [
                'key' => 'vk',
                'value' => ''
            ],
            [
                'key' => 'tg',
                'value' => ''
            ]
        ];

        foreach($items as $item){
            Setting::updateOrCreate(
                $item
            );
        }

    }
}
