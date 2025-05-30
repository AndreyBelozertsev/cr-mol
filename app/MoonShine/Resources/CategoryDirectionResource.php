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
use App\Models\CategoryDirection;
use Illuminate\Http\UploadedFile;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;

use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<CategoryDirection>
 */
class CategoryDirectionResource extends ModelResource
{
    protected string $model = CategoryDirection::class;

    protected string $title = 'Направления';

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

                Number::make('Порядок сортировки','sort')
                    ->default(500),
            
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
            'status' => ['required','boolean']
        ];
    }


}
