@extends('layouts.app')

@section('content')
<div class="container">

    @if (!empty($button))
        <h1>Button &laquo;{{ $button->name }}&raquo; ändern</h1>
        {!! Form::model($button, ['route' => ['button.update', $button->id], 'method' => 'PUT']) !!}
    @else
        <h1>Neuen Button anlegen</h1>
        {!! Form::open(['route' => 'button.store']) !!}
    @endif

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('Typ') !!}
                {!! Form::select('type', ['littlebits' => 'LitteBits CloudBit'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                {!! Form::label('Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('ID') !!}
                {!! Form::text('button_id', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('Spendenbetrag') !!}
                <div class="input-group">
                    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                    <div class="input-group-addon"> €</div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                {!! Form::label('Spende an') !!}
                {!! Form::select('receiver', $receivers, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('Schlüssel') !!}
                {!! Form::text('button_key', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    {!! Form::submit('Speichern', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
</div>
@endsection
