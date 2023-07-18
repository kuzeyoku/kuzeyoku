{!! Form::open(['url' => route('contact.send')]) !!}
<div class="form-group">
    {!! Form::label('name', 'Adınız ve Soyadınız') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Telefon Numaranız') !!}
    {!! Form::text('phone') !!}
</div>
<div class="form group">
    {!! Form::label('email', 'E-Mail Adresiniz') !!}
    {!! Form::text('email') !!}
</div>
<div class="form-group">
    {!! Form::label('subject', 'Konu') !!}
    {!! Form::text('subject') !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Mesajınız') !!}
    {!! Form::textarea('content') !!}
</div>
{!! Form::submit('Gönder') !!}
{!! Form::close() !!}
