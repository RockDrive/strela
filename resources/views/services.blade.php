@extends('layouts.base')
@section('content')

    <x-travelline.panel/>

    <section class="services services_inner services_top services_style_primary">
        <div class="services__container">
            <h1 class="services__title">{{ $services["title"] }}</h1>
            <div class="services__description text-with-nl">{{ $services["description"] }}</div>
        </div>
    </section>


    <section class="services services_inner services_hotel services_style_primary">
        <div class="services__container">
            <h2 class="h2">Предлагаем Вам</h2>

            <div class="paid-service__item">

                <div class="paid-service__photo-item">
                    <div class="paid-service__photo lazy" data-bgsrc="url('{{ asset('img/nophoto.png') }}')">
                    </div>
                </div>

                <div class="paid-service__info">

                    <div class="paid-service__name">
                        Организация трансфера
                    </div>

                    <div class="paid-service__description text-with-nl">Мы поможем Вам добраться из аэропорта в отель или из отеля в аэропорт, удобно и просто!<br>Благодаря услуге по организации индивидуального или группового трансфера Вы сможете посетить любой уголок Крымского полуострова. К услугам гостей – легковые автомобили, микроавтобусы. Для заказа трансфера – просто обратитесь на ресепшн отеля по телефону &#43;7(987)-060-10-50 или напишите нам на почту hotelstrela@yandex.ru</div>

                </div>
            </div>

        </div>
    </section>


    <section class="services services_inner services_amenities services_style_primary">
        <div class="services__container">
            <h2 class="h2">Оснащение</h2>
            <ul class="services__list">

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#refrigerator') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="холодильник">холодильник</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#hairdryer') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="фен">фен</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#security-system') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="система безопасности">система безопасности</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#air-conditioner') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кондиционер">кондиционер</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#kitchen-stove') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name"
                          title="плита для приготовления пищи">плита для приготовления пищи</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#cosmetics') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="туалетные средства">туалетные средства</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#towel') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="банные полотенца">банные полотенца</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#cosmetics') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="косметические средства">косметические средства</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#sink') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="раковина">раковина</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#toilet') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="унитаз">унитаз</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#shower') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="душевая кабина">душевая кабина</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#slippers') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="тапочки">тапочки</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="вид на горы">вид на горы</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#wifi') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="Wi-Fi">Wi-Fi</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#double') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="двуспальная кровать">двуспальная кровать</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="диван-кровать">диван-кровать</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#mirror') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="зеркало">зеркало</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#table') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="обеденный стол">обеденный стол</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="раскладной диван">раскладной диван</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="стул">стул</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#cupboard') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="мебельный гарнитур">мебельный гарнитур</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="стол">стол</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#hanger') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="вешалки">вешалки</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#bedside-table') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="комод">комод</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кофейный столик">кофейный столик</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#dishes') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="набор посуды">набор посуды</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#ironing-board') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="гладильная доска">гладильная доска</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#kitchen-stove') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кухня">кухня</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="номер для некурящих">номер для некурящих</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="столовые приборы">столовые приборы</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#kettle') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="чайник">чайник</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#safe') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="сейф">сейф</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кухонная посуда">кухонная посуда</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#tv') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кабельное телевидение">кабельное телевидение</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#iron') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="утюг">утюг</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#balcony') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="балкон с красивым видом">балкон с красивым видом</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#microwave') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="микроволновая печь">микроволновая печь</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#toilet') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="санузел">санузел</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#twin') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="две односпальные кровати">две односпальные кровати</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#chair') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="стулья">стулья</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#desk') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="журнальный столик">журнальный столик</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#cupboard') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="шкаф для одежды">шкаф для одежды</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#service') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="обслуживание номеров">обслуживание номеров</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="сушилка для белья">сушилка для белья</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#cupboard') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="гардеробная">гардеробная</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="стаканы">стаканы</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="туалетный столик">туалетный столик</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#sauna') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="банные принадлежности">банные принадлежности</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#private-room-entrance') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="отдельный вход в номер">отдельный вход в номер</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#toilet') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="биде">биде</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#bathrobe') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="халаты">халаты</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="телевизор с плоским экраном">телевизор с плоским экраном</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#cooler') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кулер на этаже">кулер на этаже</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#shower') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="душ">душ</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#view') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="вид во двор">вид во двор</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#wifi') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="интернет">интернет</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#tile') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="плиточное покрытие">плиточное покрытие</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#sofa') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="гостиная зона">гостиная зона</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#tea-set') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="чайный набор">чайный набор</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#double') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="кровать «King size»">кровать «King size»</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="мини-холодильник">мини-холодильник</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#bath-or-shower') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="ванна или душевая кабина">ванна или душевая кабина</span>
                </li>

                <li class="services__item">
                <span class="services__item-icon">
                    <svg class="services__item-svg">
                        <use xlink:href="{{ asset('img/icons.svg#no-icon') }}"></use>
                    </svg>
                </span>
                    <span class="services__item-name" title="мини-кухня">мини-кухня</span>
                </li>

            </ul>
        </div>
    </section>
@endsection
