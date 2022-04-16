@extends('layouts.base')
@section('content')

    <x-travelline.panel :lang="$lang" />

    <section class="services services_inner services_top services_style_primary">
        <div class="services__container">
            <h1 class="services__title">{{ $Service["title"] }}</h1>
            <div class="services__description text-with-nl">{!! $Service["description"] !!}</div>
        </div>
    </section>


    <section class="services services_inner services_hotel services_style_primary">
        <div class="services__container">
            <h2 class="h2">{{ $Offer["title"] }}</h2>

            <div class="paid-service__item">

                <div class="paid-service__photo-item">
                    <div class="paid-service__photo lazy" data-bgsrc="url('{{ \Orchid\Attachment\Models\Attachment::find($Offer['picture'])->url }}')">
                    </div>
                </div>

                <div class="paid-service__info">

                    <div class="paid-service__name">
                        {{ $Offer["title_text"] }}
                    </div>

                    <div class="paid-service__description text-with-nl">{!! $Offer["description"] !!}</div>

                </div>
            </div>

        </div>
    </section>


    <section class="services services_inner services_amenities services_style_primary">
        <div class="services__container">
            <h2 class="h2">{{ $Equipment["title"] }}</h2>
            <ul class="services__list">
                @foreach(json_decode($Equipment["equipments"], true) as $equip)
                    <li class="services__item">
                        <span class="services__item-icon">
                            <svg class="services__item-svg">
                                <use xlink:href="{{ asset('img/icons.svg#'.$equip["icon"]) }}"></use>
                            </svg>
                        </span>
                        <span class="services__item-name" title="{{$equip["name"]}}">{{$equip["name"]}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
