@extends('admin.layout.main')
@section('pageTitle', 'Dosya Düzenle')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                {!! Form::hidden('folder', 'admin') !!}
                {!! Form::label('Admin Panel Dil Dosyaları') !!}
                {!! Form::select('filename', $adminFiles, $dir == 'admin' ? $filename : 'default', [
                    'placeholder' => __('admin/general.select'),
                ]) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                {!! Form::hidden('folder', 'front') !!}
                {!! Form::label('Site Dil Dosyaları') !!}
                {!! Form::select('filename', $frontFiles, $dir == 'front' ? $filename : 'default', [
                    'placeholder' => __('admin/general.select'),
                ]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('card')
    {!! Form::open(['url' => route("admin.{$route}.updateFileContent", $language), 'method' => 'put']) !!}
    {!! Form::hidden('filename', $filename) !!}
    {!! Form::hidden('folder', $dir) !!}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __("admin/{$folder}.files.title") }}</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-responsive table-bordered">
                <tbody>
                    @forelse ($fileContent as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>
                                <div class="form-group mb-0">
                                    {!! Form::text($key, $value) !!}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-primary mb-0 text-center">{{ __("admin/{$folder}.files.table_empty") }}
                        </div>
                    @endforelse
                    <tr>
                        <td>
                            <div class="form-group">
                                {!! Form::text('key', null) !!}
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                {!! Form::text('value', null) !!}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if (!empty($fileContent))
        {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    @endif
    {!! Form::close() !!}
@endsection
@section('script')
    <script>
        $(function() {
            $("select[name='filename']").change(function() {
                $(this).closest('form').submit();
            });
        });
    </script>
@endsection
