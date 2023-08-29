<ul class="submenu">
    @foreach ($menu->subMenu as $subMenu)
        <li class="d-flex flex-row justify-content-between">
            <div>
                @svg('ri-arrow-right-down-line') <a href="{{ $subMenu->url ?? '/' }}">{{ $subMenu->getTitle() }}</a>
            </div>
            <div>
                <a href="{{ route("admin.{$folder}.edit", $subMenu) }}" class="btn btn-sm p-0">
                    @svg('ri-edit-2-line')
                </a>
                {!! Form::open([
                    'url' => route("admin.{$route}.destroy", $subMenu),
                    'method' => 'delete',
                    'class' => 'd-inline',
                ]) !!}
                <button type="button" class="btn btn-sm p-0 destroy-btn">
                    @svg('ri-close-line')
                </button>
                {!! Form::close() !!}
            </div>
        </li>
        @if ($subMenu->subMenu)
            @include('admin.menu.subMenus', ['menu' => $subMenu])
        @endif
    @endforeach
</ul>
