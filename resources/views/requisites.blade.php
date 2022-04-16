@extends('layouts.base')
@section('content')
    <x-travelline.panel :lang="$lang" />
    <section class="payment-methods">
        <div class="payment-methods__container">
            <h1 class="payment-methods__title">{{ $Payment["title"] }}</h1>
            <div class="payment-methods__wrap">{!! $Payment["description"] !!}</div>
            <div class="payment-methods__wrap">
                <h2 class="payment-methods__subtitle">{{ $BankPay["title"] }}</h2>
                <div class="payment-methods__text text-with-nl">{!! $BankPay["description"] !!}</div>
            </div>
            <div class="payment-methods__wrap">
                <h2 class="payment-methods__subtitle">{{$PayMethod["title"]}}</h2>
                <ul class="payment-methods__list">
                    <li class="payment-methods__item payment-method">
                        {!! $PayMethod["description"] !!}
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
