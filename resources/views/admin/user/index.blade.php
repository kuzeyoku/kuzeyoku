@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.list"))
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap table-bordered table-center mb-0">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>{{ __("admin/{$folder}.table.name") }}</th>
                    <th>{{ __('admin/general.table.role') }}</th>
                    <th>{{ __('admin/general.table.created_at') }}</th>
                    <th>{{ __('admin/general.table.updated_at') }}</th>
                    <th>{{ __('admin/general.table.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->role->title() }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>@include('admin.layout.action')</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('admin/general.table.no_data') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $items->render('pagination::bootstrap-5') }}
@endsection