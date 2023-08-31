<div class="header">
    <div class="header-left active">
        <a href="{{ route('admin.index') }}" class="logo logo-normal">
            <img src="{{ asset('assets/admin/img/logo.png') }}">
        </a>
        <a href="{{ route('admin.index') }}" class="logo logo-white">
            <img src="{{ asset('assets/admin/img/logo-white.png') }}">
        </a>
        <a href="{{ route('admin.index') }}" class="logo-small">
            <img src="{{ asset('assets/admin/img/logo-small.png') }}">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="{{ route("admin.cache-clear") }}" class="dropdown-toggle nav-link userset">
                @svg('ri-brush-3-line') {{ __('admin/general.cacheclear') }}
            </a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="{{ url('/') }}" class="dropdown-toggle nav-link userset blank">
                @svg('ri-chrome-fill') {{ __('admin/general.gofront') }}
            </a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="{{ route('admin.auth.logout') }}" class="dropdown-toggle nav-link userset">
                @svg('ri-door-open-fill') {{ __('admin/general.logout') }}
            </a>
        </li>
    </ul>
</div>
