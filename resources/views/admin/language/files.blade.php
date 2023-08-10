@extends('admin.layout.main')
@section('pageTitle', 'Dosya Düzenle')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                {!! Form::hidden('_folder', 'admin') !!}
                {!! Form::label('Admin Panel Dil Dosyaları') !!}
                {!! Form::select('_filename', $adminFiles, 'default') !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                {!! Form::hidden('_folder', 'front') !!}
                {!! Form::label('Site Dil Dosyaları') !!}
                {!! Form::select('_filename', $files, 'default') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('card')
    {!! Form::open(['url' => route("admin.{$route}.updateFileContent", $language), 'method' => 'put']) !!}
    {!! Form::hidden('_filename', $_filename) !!}
    {!! Form::hidden('_folder', $_folder) !!}
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
            $("select[name='_filename']").change(function() {
                $(this).closest('form').submit();
            });
        });
    </script>
@endsection
