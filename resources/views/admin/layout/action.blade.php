<a href="{{ route("admin.{$route}.edit", $item) }}" class="btn btn-edit">@svg('ri-edit-2-line')</a>
{!! Form::open([
    'url' => route("admin.{$route}.destroy", $item),
    'method' => 'delete',
    'class' => 'd-inline',
]) !!}
<button type="button" class="btn btn-delete destroy-btn">@svg('ri-delete-bin-2-line')</button>
{!! Form::close() !!}
