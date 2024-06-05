<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\City;
use MoonShine\Fields\ID;

use MoonShine\Fields\Field;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<City>
 */
class CityResource extends ModelResource
{
    protected string $model = City::class;

    protected string $title = 'МО';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
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
     * @param City $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
