<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Коломийчук Никита Сергеевич',
                'category_id' => 1,
                'age' => '16 лет',
                'address' => 'с. Медведевка, Джанкойский район',
                'content' => 'Никита принимает активное участие в общественной жизни Джанкойского района. Всегда добивается поставленных целей, не останавливается перед трудностями. С октября 2023 года является муниципальным президентом Ученического самоуправления Джанкойского района, также состоит во многих общественных организациях, таких как Волонтеры Победы, Движение Первых, Молодежный совет при главе администрации Джанкойского района, участник Региональной команды «Большой Перемены». Награжден грамотой главы администрации Джанкойского района «за реализацию государственной молодежной политики в Джанкойском районе, развитие волонтёрского и добровольческого движения».',
            ],
            [
                'title' => 'Молодежный медиацентр Керченского политихнического колледжа',
                'category_id' => 11,
                'address' => 'г. Керчь, ул. Войкова, 1',
                'content' => 'На базе ГБПОУ РК «Керченский политехнический колледж» действует студенческий медиацентр, который направлен на освещение деятельности в рамках образовательного учреждения.На площадке медиацентра проходят различные мастер-классы, тематические мероприятия, а также запись студенческого радио.',
            ],

        ];


        foreach($items as $item){
            Unit::updateOrCreate(
                $item
            );
        }
    }
}