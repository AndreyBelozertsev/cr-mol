<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use App\Models\Unit;

use App\Models\Category;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Decorations\Tab;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @extends ModelResource<Unit>
 */
class UnitResource extends ModelResource
{
    protected string $model = Unit::class;

    protected string $title = 'Номинанты';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [

            Block::make([
                Tabs::make([
                    Tab::make('Общая информация', [
                        Text::make('Заголовок','title')
                            ->required()
                            ->showOnExport(),

                        Text::make('Адрес','address'),

                        Text::make('Возраст','age')
                            ->hideOnIndex(),

                        Textarea::make('Краткое описание', 'description')
                            ->hideOnIndex(), 

                        Textarea::make('Описание', 'content')
                            ->hideOnIndex(), 

                        Image::make('Фото','thumbnail')
                            ->allowedExtensions(['jpeg','png','jpg','gif','svg'])
                            ->customName(function (UploadedFile $file, Image $field){
                                return getUploadPath('unit') . '/' . Str::random(10) . '.' . $file->extension();
                            })
                            ->removable()
                            ->enableDeleteDir()
                            ->hideOnIndex(),
                        
                        BelongsTo::make(
                                'Номинация',
                                'category',
                                fn($item) => "$item->title" ,
                                resource: new CategoryResource()
                            )
                            ->searchable()
                            ->required()
                            ->badge('purple')
                            ->showOnExport(),
                        
                        Image::make('Дополнительные фото','images') 
                            ->hideOnIndex()
                            ->multiple()
                            ->removable() 
                            ->customName(function (UploadedFile $file, Field $field){
                                return getUploadPath('unit') . '/' . Str::random(10) . '.' . $file->extension();
                            })
                            ->allowedExtensions(['jpeg','png','jpg']),

                        Switcher::make('Активный', 'status')
                            ->default(true)
                    ]),
                    Tab::make('Проголосовавшие', [
                        BelongsToMany::make(
                            'Голосов',
                            'users',
                            fn($item) => "$item->last_name $item->first_name $item->patronymic",
                                new UserResource
                        )
                        ->badge('green')
                        ->onlyCount()
                        ->selectMode()
                        ->readonly()
                        ->showOnExport(),
                    ])
                ])
            ]),
        ];
    }

    /**
     * @param Unit $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'max:150'],
            'thumbnail' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:4096','nullable'],
            'address' => ['sometimes', 'max:150'],
            'age' => ['sometimes','max:30','nullable'],
            'description' => [],
            'content' => [],
            'status' => ['required','boolean'],
            'category_id' => ['required','numeric', 'max:' . Category::max('id')],
            'images' => ['sometimes','array','nullable'],
            'images.*' => ['image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
        ];
    }

    public function filters(): array 
    {
        return [
            Text::make('ФИО / Название', 'title'),
            BelongsTo::make(
                'Номинация',
                'category',
                fn($item) => "$item->title" ,
                resource: new CategoryResource()
            )
            ->searchable(),

        ];
    } 

    public function query(): Builder 
    {
        return parent::query()
        ->withCount('users')->orderBy('users_count', 'desc');
    } 

    public function export(): ?ExportHandler 
    {
        return ExportHandler::make('Export');
    } 

}


