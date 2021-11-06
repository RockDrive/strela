@extends('layouts.base')
@section('content')
    <x-travelline.panel/>

    <section class="provider provider_style_primary" id="about">
        <div class="provider__container">
            <h1 class="provider__title">{{ $about["title"] }}</h1>
            <div class="provider__information">
                <div class="provider__image">
                    <div class="provider__image-background" style="background-image: url('{{ $about["src"] }}'); background-repeat: no-repeat;"></div>
                </div>
                <div class="provider__description text-with-nl">{{ $about["text"] }}</div>
            </div>

        </div>
    </section>

    <div class="provider provider_style_primary">
        <div class="provider__container provider__container_with_padding">
            <h2>{{ $accomm["title"] }}</h2>
            <p class="text-with-nl text-left-align">{{ $accomm["description"] }}</p>
            <table class="table">
                @foreach($accomm["items"] as $item)
                    <tr>
                        <td class="table__cell table__item">{{ $item["key"] }}</td>
                        <td class="table__cell table__value text-with-nl">{{ $item["value"] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="provider provider_style_primary">
        <div class="provider__container provider__container_with_padding">
            <h2>{{ $conditions["title"] }}</h2>
            <p class="text-with-nl text-left-align">{{ $conditions["text"] }}</p>
        </div>
    </div>
@endsection
