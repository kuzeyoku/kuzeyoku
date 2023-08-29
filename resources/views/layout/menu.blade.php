<li class="dropdown">
    <a href="{{ $menu->url ?? '#' }}" class="dropdown-toggle" data-toggle="dropdown">{{ $menu->getTitle() }}</a>
    <ul class="dropdown-menu">
        @foreach ($menu->subMenu as $subMenu)
            @if ($subMenu->subMenu->count() > 0)
                @include('layout.menu', ['menu' => $subMenu])
            @else
                <li><a href="{{ $subMenu->url }}">{{ $subMenu->getTitle() }}</a></li>
            @endif
        @endforeach
    </ul>
</li>
