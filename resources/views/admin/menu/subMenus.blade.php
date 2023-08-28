<ul class="submenu">
    @foreach ($menu->getSubMenu() as $subMenu)
        <li class="d-flex flex-row justify-content-between">
            <div>
                @svg('ri-arrow-right-down-line') <a href="{{ $subMenu->url ?? '/' }}">{{ $subMenu->getTitle() }}</a>
            </div>
            <div>
                <a href="{{ route("admin.{$folder}.edit", $subMenu) }}" class="btn btn-sm p-0">
                    @svg('ri-edit-2-line')
                </a>
                <button class="btn btn-sm p-0 delete">
                    @svg('ri-close-line')
                </button>
            </div>
        </li>
        @if ($subMenu->getSubMenu())
            @include('admin.menu.subMenus', ['menu' => $subMenu])
        @endif
    @endforeach
</ul>
