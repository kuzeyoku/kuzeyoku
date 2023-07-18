@extends('admin.layout.main')
@section('pageTitle', 'Yönetim Paneli')

@section('content')
    <div class="row">
        {{-- <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget">
                <div class="dash-widgetimg">
                    <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="307144.00">307144</span></h5>
                    <h6>Total Purchase Due</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                    <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="4385.00">4385</span></h5>
                    <h6>Total Sales Due</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="385656.50">385656.5</span></h5>
                    <h6>Total Sale Amount</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash3">
                <div class="dash-widgetimg">
                    <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="40000.00">40000</span></h5>
                    <h6>Total Sale Amount</h6>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>{{ Auth::user()->name }}</h4>
                    <h5>Hoşgeldiniz - IP: {{ request()->ip() }}</h5>
                </div>
                <div class="dash-imgs">
                    @svg('ri-shield-user-fill')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das1">
                <div class="dash-counts">
                    @if ($messages > 0)
                        <h4>{{ $messages }}</h4>
                        <h5>Okunmamış Mesajınız Var - <a class="text-white" href="{{ route("admin.message.index") }}">Mesajlara Git</a></h5>
                    @else
                        <h4>Okunmamış Mesajınız Yok</h4>
                    @endif
                </div>
                <div class="dash-imgs">
                    @svg('ri-mail-send-fill')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>100</h4>
                    <h5>Bugün Toplam Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('ri-user-fill')
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>105</h4>
                    <h5>Toplam Ziyaretçi</h5>
                </div>
                <div class="dash-imgs">
                    @svg('ri-user-fill')
                </div>
            </div>
        </div>
    </div>
@endsection
