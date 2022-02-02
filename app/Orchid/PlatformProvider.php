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

        // TODO временная хрень (возможно)
        LayoutFactory::macro('page', function (string $name) {
            return new class($name) extends Layout
            {
                public $name;
                public function __construct(string $name)
                {
                    $this->name = $name;
                }
                public function build(Repository $repository)
                {
                    return $this->name;
                }
            };
        });
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        $navigations = [];

        // Страницы
        $pageMenu = [];
        $lang = request('lang') ?? "ru";
        foreach (Page::get() as $page) {
            $pageMenu[] = Menu::make($page->title)
                ->icon('doc')
                ->route('platform.page', ["page" => $page->id, "lang" => $lang]);
        }
        $navigations[] = Menu::make('Страницы')
            ->slug('pages')
            ->icon('docs')
            ->list($pageMenu);

        // Навигация
        $navigations[] = Menu::make("Главное меню")
            ->icon('menu')
            ->route('platform.example')
            ->title('Навигация');

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
