<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Pages;
use \App\Http\Controllers\PageController;

// Локализация
$locale = request()->segment(1, '');
if ($locale && isset(config('app.locales')[$locale]) && $locale != config('app.locale'))
    App::setLocale($locale);
else $locale = false;

// Маршруты по локализации
Route::prefix($locale)->group(function () {

    Route::get('trip', [PageController::class, 'home'])->name('trip'); // главная


    // Основные страницы
    Route::get('/', [Pages\HomeController::class, 'index'])->name('home'); // главная
    Route::get('about', [Pages\AboutController::class, 'index'])->name('about'); // Об отеле
    Route::get('rooms', [Pages\RoomController::class, 'index'])->name('rooms'); // номера
    Route::get('services', [Pages\ServiceController::class, 'index'])->name('services'); // услуги
    Route::get('photos', [Pages\PhotoController::class, 'index'])->name('photos'); // фотогалерея
    Route::get('contacts', [Pages\ContactController::class, 'index'])->name('contacts'); // контакты
    Route::get('booking', [Pages\BookingController::class, 'index'])->name('booking'); // бронирование

    Route::get('requisites', [Pages\RequisiteController::class, 'index'])->name('requisites'); // реквизиты

});
