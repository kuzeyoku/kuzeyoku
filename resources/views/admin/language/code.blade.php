@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.title"))
@section('content')
    <form action="https://www.geografik.com.tr/admin/language/firstlangup" id="lang" method="post" accept-charset="utf-8">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th style="width: 20px">Sıra</th>
                    <th style="width: 100px">Anahtar</th>
                    <th style="width: 500px">Orjinal Metin</th>
                    <th>Güncelle</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>{txt1}</td>
                    <td>Telefon</td>
                    <td class="p-1"><input type="text" name="txt1" value="Telefon" class="form-control"> </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
