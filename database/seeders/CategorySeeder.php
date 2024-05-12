<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Открытие года',
                'sort' => 100,
                'thumbnail' => 'images/category/2024/05/07/t176CY9HeJ.svg',
                'content' => 'для молодежи от 14 до 35 лет, проявившей себя в общественной, социальной и иной деятельности и достигшей признания в молодежном сообществе',
                'type_of' => 'standart',
            ],
            [
                'title' => 'Доброволец года',
                'sort' => 200,
                'thumbnail' => 'images/category/2024/05/07/Cw7M65Hx0h.svg',
                'content' => 'для молодежи от 14 до 35 лет, имеющей достижения в добровольческой (волонтерской) деятельности на муниципальном, республиканском, всероссийском или международном уровнях',
                'type_of' => 'standart',
            ],
            [
                'title' => 'Молодежный лидер года',
                'sort' => 300,
                'thumbnail' => 'images/category/2024/05/07/ly9yvWGLWl.svg',
                'content' => 'для представителя молодежи в возрасте от 14 до 35 лет, проявившего особые лидерские качества в общественной, социальной, добровольческой и иной деятельности на муниципальном, республиканском, всероссийском или международном уровнях, в том числе в общественной организации или инициативной группе',
                'type_of' => 'standart',
            ],
            [
                'title' => 'Голос молодых',
                'sort' => 400,
                'thumbnail' => 'images/category/2024/05/07/1KDWCT92SC.svg',
                'content' => 'для крымчан в возрасте от 14 до 35 лет, имеющих достижения в медиа сфере на муниципальном, республиканском, всероссийском или международном уровнях; для команды регионального молодежного медиа',
                'type_of' => 'standart',
            ],            
            [
                'title' => 'Наставник года',
                'sort' => 500,
                'thumbnail' => 'images/category/2024/05/07/U5UjWhYyIL.svg',
                'content' => 'для крымчан старше 18 лет, в т.ч. работников сферы молодежной политики; организаторов и кураторов молодежных мероприятий и проектов, которые внесли наибольший вклад в развитие молодежной политики в Республике Крым',
                'type_of' => 'standart',
            ],            
            [
                'title' => 'Проект года в сфере молодежной политики',
                'sort' => 600,
                'thumbnail' => 'images/category/2024/05/07/JpNEswUjkA.svg',
                'content' => 'проект, событие (цикл акций, мероприятие, комплекс мероприятий), реализуемый или реализованный молодыми людьми, молодежным общественным объединением, имеющий социально-значимый результат для молодежи Республики Крым и получивший положительный отзыв в молодежной среде',
                'type_of' => 'standart',
            ],            
            [
                'title' => 'Друг молодых',
                'sort' => 700,
                'thumbnail' => 'images/category/2024/05/07/tkFBLyhgT5.svg',
                'content' => 'для социально активного бизнеса, коммерческих компаний, представителей малого и среднего бизнеса',
                'type_of' => 'standart',
            ],            
            [
                'title' => 'Время достижений',
                'sort' => 800,
                'thumbnail' => 'images/category/2024/05/07/gjZtejWLJH.svg',
                'content' => 'для молодежи от 14 до 35 лет, проявившей себя в спортивной, научной и творческой деятельности, а также достигшей признания в молодежном сообществе',
                'type_of' => 'standart',
            ],            
            [
                'title' => 'ZOV молодежи',
                'sort' => 900,
                'thumbnail' => 'images/category/2024/05/07/bZx9EeLM5F.svg',
                'content' => 'для молодежи от 14 до 35 лет, активно поддерживающей участников специальной военной операции: для участников гуманитарных миссий в исторические регионы Российской Федерации',
                'type_of' => 'special',
            ],            
            [
                'title' => 'Молодая семья',
                'sort' => 1000,
                'thumbnail' => 'images/category/2024/05/07/HKKebFSj5s.svg',
                'content' => 'для молодых семей Крыма, занимающихся общественно полезной, творческой, научной, добровольческой или иной социально активной деятельностью',
                'type_of' => 'special',
            ],            
            [
                'title' => 'Точка притяжения',
                'sort' => 1100,
                'thumbnail' => 'images/category/2024/05/07/MvwtdzP3fj.svg',
                'content' => 'для молодежных пространств и центров в муниципальных образованиях Республики Крым',
                'type_of' => 'special',
            ],            [
                'title' => 'ГосСтарт',
                'sort' => 1200,
                'thumbnail' => 'images/category/2024/05/07/z5M1vUzqJz.svg',
                'content' => 'для молодых государственных служащих Крыма в возрасте от 18 до 35 лет.',
                'type_of' => 'special',
            ],            
            [
                'title' => 'Команда года',
                'sort' => 1300,
                'thumbnail' => 'images/category/2024/05/07/w7SjLsfTZM.svg',
                'content' => 'для коллективных заявок от организаций, объединений, отдельных сообществ в категориях: муниципальная команда, студенческая команда, молодежное сообщество',
                'type_of' => 'special',
            ],
            [
                'title' => 'Муниципальная команда',
                'sort' => 100,
                'thumbnail' => 'images/category/2024/05/07/w7SjLsfTZM.svg',
                'type_of' => 'special',
                'category_id' => 13,
            ],
            [
                'title' => 'Студенческая команда',
                'sort' => 200,
                'thumbnail' => 'images/category/2024/05/07/w7SjLsfTZM.svg',
                'type_of' => 'special',
                'category_id' => 13,
            ],
            [
                'title' => 'Молодежное сообщество',
                'sort' => 300,
                'thumbnail' => 'images/category/2024/05/07/w7SjLsfTZM.svg',
                'type_of' => 'special',
                'category_id' => 13,
            ],
            [
                'title' => 'Спорт',
                'sort' => 100,
                'thumbnail' => 'images/category/2024/05/07/gjZtejWLJH.svg',
                'type_of' => 'standart',
                'category_id' => 8,
            ],
            [
                'title' => 'Наука',
                'sort' => 200,
                'thumbnail' => 'images/category/2024/05/07/gjZtejWLJH.svg',
                'type_of' => 'standart',
                'category_id' => 8,
            ],
            [
                'title' => 'Творчество',
                'sort' => 300,
                'thumbnail' => 'images/category/2024/05/07/gjZtejWLJH.svg',
                'type_of' => 'standart',
                'category_id' => 8,
            ]
        ];
        

        foreach($items as $item){
            Category::updateOrCreate(
                $item
            );
        }
    }
}
