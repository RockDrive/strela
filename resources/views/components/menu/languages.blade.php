<div class="lang">
    <div class="button button_lang js-lang__button">
        <i class="lang__flag lang__flag_{{ app()->getLocale() }}"></i>
        <i class="icon-arrow5 lang__icon_arrow"></i>
    </div>
    <ul class="lang__list js-lang__list">
        <li>
            <ul class="lang__items">
                @foreach ($langs as $lang => $url)
                    @if(app()->getLocale() == $lang)
                        <li class="lang__item lang__item_current">
                            <a class="lang__link lang__flag_{{$lang}}"></a>
                        </li>
                    @else
                        <li class="lang__item ">
                            <a class="lang__link lang__flag_{{$lang}}" href="{{$url}}"></a>
                        </li>
                    @endif
                    @if (($loop->iteration % 4) == 0)
            </ul>
            <ul class="lang__items">
                @endif
                @endforeach
            </ul>
        </li>
    </ul>
</div>
