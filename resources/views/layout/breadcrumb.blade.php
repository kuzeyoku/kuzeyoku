<div class="breadcrumb-area text-center shadow dark bg-fixed text-light" style="background-image: url({{ asset('assets/img/breadcrumb.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>@yield('title')</h2>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">@svg('fas-home') Ana Sayfa</a></li>
                    @if (!empty($nav))
                    @foreach ($nav as $url => $title)
                    <li class="{{ $url ? '' : 'active' }}"><a href="{{ $url ? $url : null }}">{{ $title }}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
