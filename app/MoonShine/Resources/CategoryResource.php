<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Category>
 */
class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Категории';

    protected string $sortColumn = 'sort';

    protected string $sortDirection = 'ASC';


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок','title'),

                Textarea::make('Описание', 'content'), 

                Image::make('Иконка категории','thumbnail') 
                    ->hideOnIndex()
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('category') . '/' . Str::random(10) . '.' . $file->extension();
                   })
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']) ,

                Number::make('Порядок сортировки','sort')
                    ->default(500),

                BelongsTo::make(
                        'Родительская номинация',
                        'parent',
                        fn($item) => "$item->title",
                        resource: new self()
                    )
                    ->nullable()
                    ->badge('purple'),
            
                Switcher::make('Активный', 'status')
                    ->default(true)
            ]),
        ];
    }

    public function import(): ?ImportHandler 
    {
        return null;
    }
 
    public function export(): ?ExportHandler
    {
        return null;
    } 

    /**
     * @param Category $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'max:150'],
            'thumbnail' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:4096','nullable'],
            'content' => [],
            'status' => ['required','boolean']
        ];
    }


}
