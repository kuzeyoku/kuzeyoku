@extends('admin.layout.main')
@section('pageTitle', 'Dosya Düzenle')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                {!! Form::hidden('folder', 'admin') !!}
                {!! Form::label('Site Dil Dosyaları') !!}
                {!! Form::select('file', $adminFiles, 'default') !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::open(['url' => route("admin.{$route}.files", $language)]) !!}
                {!! Form::hidden('folder', 'front') !!}
                {!! Form::label('Site Dil Dosyaları') !!}
                {!! Form::select('file', $files, 'default') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('card')
    <div class="card">
        <div class="card-header">
            <strong>Dil Dosyası Düzenle</strong>
        </div>
        <table class="table table-responsive">
            <tbody>
                @if (isset($fileContent))
                    @forelse ($fileContent as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                    @empty
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("select[name='file']").change(function() {
                $(this).closest('form').submit();
                // let languageFileName = $(this).val();
                // let formUrl = $(this).attr('form-url');
                // let folder = $(this).attr('folder');
                // $.post(formUrl, {
                //     _token: "{{ csrf_token() }}",
                //     file: languageFileName,
                //     folder: folder
                // }, function(data) {
                //     $("#languageFileContent").val(data);
                //     $('table tbody').html('');
                //     $.each(data, function(key, value) {
                //         $('<tr>').append(
                //             $('<td>').text(key),
                //             $('<td>').text(value)
                //         ).appendTo('table tbody');
                //     });
                // });
            });
        });
    </script>
@endsection
