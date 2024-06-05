<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;



use App\Models\Page;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

class PageResource extends ModelResource
{
    protected string $model = Page::class;

    protected string $title = 'Страницы';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок','title')
                    ->required(),

                TinyMce::make('Содержание','content')
                    ->hideOnIndex(),
                    
                Switcher::make('Активный', 'status')
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

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'min:3']
        ];
    }

    public function getActiveActions(): array 
    {
        return [ 'view', 'update' ];
    } 
}