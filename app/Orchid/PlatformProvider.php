<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;
use Orchid\Screen\Layout;
use Orchid\Screen\LayoutFactory;
use Orchid\Screen\Repository;

class PlatformProvider extends OrchidServiceProvider
{

    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ..
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        $lang = request('lang') ?? config('app.fallback_locale');
        $navigations = [];

        // Страницы
        $pageMenu = [];
        foreach (Page::get() as $key => $page) {
            if($key == 0) {
                $navigations[] = Menu::make($page->title)
                    ->icon('note')
                    ->route('platform.page', ["page" => $page->id, "lang" => $lang])
                    ->title('Страницы');
            } else {
                $navigations[] = Menu::make($page->title)
                    ->icon('note')
                    ->route('platform.page', ["page" => $page->id, "lang" => $lang]);
            }
        }

        // Навигация
        $navigations[] = Menu::make("Главное меню")
            ->icon('menu')
            ->route('platform.menu', ["type" => "main", "lang" => $lang])
            ->title('Навигация');

        // Компоненты
        $navigations[] = Menu::make("Компоненты")
            ->icon('menu')
            ->route('platform.components')
            ->title('Служебное');

        // Пользователи
        $navigations[] = Menu::make(__('Users'))
            ->icon('user')
            ->route('platform.systems.users')
            ->permission('platform.systems.users')
            ->title(__('Access rights'));

        return $navigations;
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
