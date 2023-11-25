@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.title"))
@section('content')
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                @foreach (App\Enums\SettingCategoryEnum::cases() as $tab)
                    <a class="nav-link @if ($loop->first) active @endif mb-2 border" data-bs-toggle="pill"
                        href="#{{ $tab->value }}" role="tab" aria-selected="true">
                        @svg($tab->icon()) {{ $tab->title() }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-8 col-xl-9">
            <div class="tab-content">
                @foreach (App\Enums\SettingCategoryEnum::cases() as $tabContent)
                    <div class="tab-pane fade @if ($loop->first) active show @endif"
                        id="{{ $tabContent->value }}" role="tabpanel">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="card-title">{{ $tabContent->title() }}</h5>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['url' => route("admin.{$route}.update"), 'method' => 'PUT', 'files' => true]) !!}
                                @include("admin.{$folder}." . $tabContent->value)
                                {!! Form::hidden('category', $tabContent->value) !!}
                                {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
