@extends('admin.layout.main')
@section('pageTitle', 'Yönetim Paneli')

@section('content')
    <div class="row">
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
                        <h5>Okunmamış Mesajınız Var - <a class="text-white"
                                href="{{ route('admin.message.index') }}">Mesajlara Git</a></h5>
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
    <div class="border rounded p-3">

        Hata Kayıtları
        <hr>
        <ul>
            @foreach ($errors as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>

    </div>
@endsection
