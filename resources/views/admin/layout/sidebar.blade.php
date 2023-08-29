<div class="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.index') }}">@svg('ri-dashboard-fill')<span> Ana Sayfa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting') }}">@svg('ri-settings-4-fill')<span> Site Ayarları</span>
                    </a>
                </li>

                @foreach (App\Enums\ModuleEnum::cases() as $module)
                    @if (count($module->menu()) == 1)
                        <li><a
                                href="{{ route("admin.{$module->route()}.index") }}">@svg($module->icon())<span>{{ $module->title() }}</span></a>
                        </li>
                    @else
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                @svg($module->icon())
                                <span>{{ $module->title() }}</span>
                                <span class="menu-arrow">
                                    {{ svg('ri-arrow-right-s-line') }}
                                </span>
                            </a>
                            <ul>
                                @foreach ($module->menu() as $key => $value)
                                    <li>
                                        <a href="{{ route("admin.{$module->route()}.{$key}") }}">
                                            {{ $value }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</div>
