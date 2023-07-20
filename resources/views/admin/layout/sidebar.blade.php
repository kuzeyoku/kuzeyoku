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
                {{-- <li>
                    <a href="{{ route('admin.message.index') }}">@svg('ri-mail-send-line')<span> Mesaj Yönetimi</span>
                    </a>
                </li> --}}
                @foreach (\App\Enums\ModuleEnum::cases() as $index => $module)
                    @if (array_key_exists('create', $module->menu()))
                        <li class="submenu">
                            <a href="javascript:void(0);">@svg($module->icon())<span>
                                    {{ $module->title() }}</span> <span class="menu-arrow">@svg('ri-arrow-right-s-line')</span></a>
                            <ul>
                                <li><a
                                        href="{{ route("admin.{$module->route()}.create") }}">{{ __("admin/{$module->value}.create") }}</a>
                                </li>
                                <li><a
                                        href="{{ route("admin.{$module->route()}.index") }}">{{ __("admin/{$module->value}.list") }}</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ route("admin.{$module->route()}.index") }}">@svg($module->icon())<span>
                                    {{ $module->title() }}</span></a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</div>
