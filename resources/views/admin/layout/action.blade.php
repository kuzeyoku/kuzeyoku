<a href="{{ route("admin.{$route}.edit", $item) }}" class="btn btn-edit">@svg('ri-edit-2-line')</a>
<button data-id="{{ $item->id }}" class="btn btn-delete destroy-btn">@svg('ri-delete-bin-2-line')</button>
{!! Form::open([
    'url' => route("admin.{$route}.destroy", $item),
    'method' => 'delete',
    'id' => 'form_' . $item->id,
]) !!}
{!! Form::close() !!}
