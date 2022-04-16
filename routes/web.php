<?php

use Illuminate\Support\Facades\Route;

// Локализация
//$locale = request()->segment(1, '');
//if ($locale && isset(config('app.fallback_locale')[$locale]) && $locale != config('app.fallback_locale')) {
//    App::setLocale($locale);
//}
//else $locale = false;

$pages = \App\Models\Page::get();
foreach (config('app.locales') as $lang => $name) {
    foreach ($pages as $page) {
        $components = [
            "lang" => $lang,
            "seo" => $page->getSeo($lang)
        ];
        foreach ($page->components()->get() as $component) {
            $fields = $component->fields()->firstWhere("lang", $lang);
            if(!$fields) {
                $fields = $component->fields()->firstWhere("lang", config('app.fallback_locale'));
            }
            $components[$component->component->code] = $fields;
        }
        Route::view(
            $page->getSeo($lang)->url,
            $page->template,
            $components
        )->name($page->template . "." . $lang);
    }
}

//// Маршруты по локализации
//Route::prefix($locale)->group(function () {
//
//    // Основные страницы
//    Route::get('/', [Pages\HomeController::class, 'index'])->name('home'); // главная
//    Route::get('about', [Pages\AboutController::class, 'index'])->name('about'); // Об отеле
//    Route::get('rooms', [Pages\RoomController::class, 'index'])->name('rooms'); // номера
//    Route::get('services', [Pages\ServiceController::class, 'index'])->name('services'); // услуги
//    Route::get('photos', [Pages\PhotoController::class, 'index'])->name('photos'); // фотогалерея
//    Route::get('contacts', [Pages\ContactController::class, 'index'])->name('contacts'); // контакты
//    Route::get('booking', [Pages\BookingController::class, 'index'])->name('booking'); // бронирование
//
//    Route::get('requisites', [Pages\RequisiteController::class, 'index'])->name('requisites'); // реквизиты
//
//});
