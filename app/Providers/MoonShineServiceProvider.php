<?php

declare(strict_types=1);

namespace App\Providers;

use Closure;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuElement;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\UnitResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use App\MoonShine\Resources\CategoryDirectionResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            
            MenuItem::make(
                    static fn() => 'Номинанты',
                    new UnitResource()
                )
                ->icon('heroicons.outline.academic-cap'),
            MenuItem::make(
                    static fn() => 'Номинации',
                    new CategoryResource()
                )
                ->icon('heroicons.outline.light-bulb'),
            MenuItem::make(
                    static fn() => 'Направления',
                    new CategoryDirectionResource()
                )
                ->icon('heroicons.outline.academic-cap'),
            MenuItem::make(
                    static fn() => 'Пользователи',
                    new UserResource()
                )
                ->icon('heroicons.outline.users'),
            MenuItem::make(
                    static fn() => 'Страницы',
                    new PageResource()
                )
                ->icon('heroicons.outline.clipboard-document-list'),
            MenuGroup::make(static fn() => 'Настройки', [
                MenuItem::make(
                    static fn() => 'Администраторы сайта',
                    new MoonShineUserResource()
                    )
                    ->icon('heroicons.outline.user'),
                MenuItem::make(
                        static fn() => 'Контакты',
                        new SettingPage()
                    )
                    ->icon('heroicons.outline.envelope'),
                MenuItem::make(
                        static fn() => 'SEO',
                        new SeoResource()
                    )
                    ->icon('heroicons.outline.globe-alt'),
            ])
            ->icon('heroicons.outline.cog'),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
