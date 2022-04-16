<nav class="menu">
    <ul class="menu__list">
        <li>
            <ul class="menu__items menu__items_with-padding">
                @foreach($menu as $item)
                    <li class="menu__item menu__item {{ request()->routeIs($item['page']) ? "menu__item_current" : "" }}">
                        <a class="menu__link" href="{{ route($item['page']) }}">{{ $item['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav>
