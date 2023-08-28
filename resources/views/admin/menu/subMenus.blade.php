<ul class="submenu">
    @foreach ($menu->getSubMenu() as $subMenu)
        <li>@svg('ri-arrow-right-down-line') {{ $subMenu->getTitle() }}</li>
        @if ($subMenu->getSubMenu())
            @include('admin.menu.subMenus', ['menu' => $subMenu])
        @endif
    @endforeach
</ul>
