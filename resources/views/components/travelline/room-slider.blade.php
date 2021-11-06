<div class="slider slider_category slider_rooms">
    <ul class="slider__list slick-slider_category clearfix">
        @for($slide = 10; $slide > 0; $slide--)
            <li class="slider__item">
                <div class="slider__item-content room lazy" data-bgsrc="url('{{ asset('img/hotel-img.jpg') }}')">
                    <div class="slider__item-overlay">
                        <h3 class="room__title">({{$slide}}) Первая категория &#34;Стандартный 2-х местный номер&#34;</h3>
                        <div class="room__booking clearfix">
                            <a class="button button_room" href="{{route('rooms')}}">Узнать цену</a>
                        </div>
                    </div>
                </div>
            </li>
        @endfor
    </ul>
</div>
