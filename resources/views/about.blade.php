@extends('layouts.base')
@section('content')
    <x-travelline.panel :lang="$lang" />

    <section class="provider provider_style_primary" id="about">
        <div class="provider__container">
            <h1 class="provider__title">{{ $About["title"] }}</h1>
            <div class="provider__information">
                <div class="provider__image">
                    <div class="provider__image-background"
                         style="background-image: url('{{ \Orchid\Attachment\Models\Attachment::find($About['picture'])->url }}'); background-repeat: no-repeat;"></div>
                </div>
                <div class="provider__description text-with-nl">{!! $About["description"] !!}</div>
            </div>

        </div>
    </section>

    <div class="provider provider_style_primary">
        <div class="provider__container provider__container_with_padding">
            <h2>{{ $Accommodation["title"] }}</h2>
            <p class="text-with-nl text-left-align">{!! $Accommodation["description"] !!}</p>
            @if($Accommodation["timetable"])
                <table class="table">
                    @foreach(json_decode($Accommodation["timetable"], true) as $item)
                        <tr>
                            <td class="table__cell table__item">{{ $item["title"] }}</td>
                            <td class="table__cell table__value text-with-nl">{!! $item["description"] !!}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

    <div class="provider provider_style_primary">
        <div class="provider__container provider__container_with_padding">
            <h2>{{ $Condition["title"] }}</h2>
            <p class="text-with-nl text-left-align">{!! $Condition["description"] !!}</p>
        </div>
    </div>
@endsection
