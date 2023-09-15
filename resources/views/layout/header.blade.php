<header id="home">
    <nav class="navbar navbar-default attr-bg navbar-fixed white no-background bootsnav inc-topbar">
        <div class="container-full">
            <div class="nav-box">

                <div class="attr-nav inc-border">
                    <ul>
                        <li class="button"><a href="{{ route('contact.index') }}">{{ __('front/contact.page_title') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo-light.png') }}" class="logo logo-display" alt="Logo">
                        <img src="{{ asset('assets/img/logo.png') }}" class="logo logo-scrolled" alt="Logo">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                        @foreach ($headerMenu as $menu)
                        @if ($menu->parent_id === 0)
                        @if ($menu->subMenu->count() > 0)
                        @include('layout.menu', ['menu' => $menu])
                        @else
                        <li>
                            <a href="{{ $menu->url }}">{{ $menu->getTitle() }}</a>
                        </li>
                        @endif
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
