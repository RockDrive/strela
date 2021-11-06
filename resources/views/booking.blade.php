@extends('layouts.base')
@section('content')
    <section class="provider provider_style_primary">
        <div class="provider__container provider__container_booking">

            <h1 class="provider__title">Strela, г. Ялта</h1>

            <div class="booking__description">
                <p class="text-with-nl text-left-align">Бронирование номеров – это услуга, которая позволяет выкупить номер в гостинице на нужную дату заранее.<br>Пожалуйста выберите даты заезда, выезда и количество гостей.<br>Трансфер предоставляется по запросу. Для заказа трансфера свяжитесь с нами по телефону &#43;7(987)-060-10-50 или напишите нам на почту hotelstrela@yandex.ru</p>
            </div>

            <x-travelline.booking/>

        </div>
    </section>
@endsection
