<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;
use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Участники голосования';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Общая информация', [
                        Text::make('Фамилия','last_name')
                            ->readonly()
                            ->required(),

                        Text::make('Имя','first_name')
                            ->readonly()
                            ->required(),

                        Text::make('Отчество','patronymic')
                            ->readonly(),
                        
                        Text::make('Номер телефона','phone')
                            ->readonly(),

                        Date::make('Дата рождения','birthday')
                            ->readonly(),  
                            
                        BelongsTo::make(
                                'МО',
                                'city',
                                fn($item) => "$item->title" ,
                                resource: new CityResource()
                            )
                            ->searchable()
                            ->readonly()
                            ->badge('purple'),

                        Text::make('ID vkontakte','vkontakte_id')
                            ->readonly()
                    ]),


                    Tab::make('Номинанты', [
                        BelongsToMany::make(
                            'Выбранные номинанты',
                            'units',
                            fn($item) => "$item->title",
                                new UnitResource
                        )
                        ->badge('green')
                        ->onlyCount()
                        ->readonly(),
                    ])

                ])

            ])

        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array 
    {
        return [ 'view', 'update' ];
    } 
}