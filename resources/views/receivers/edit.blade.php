@extends('layouts.app')

@section('content')
<div class="container">

    @if (!empty($receiver))
        <h1>Empfänger &laquo;{{ $receiver->name }}&raquo; ändern</h1>
        {!! Form::model($receiver, ['route' => ['receiver.update', $receiver->id], 'method' => 'PUT']) !!}
    @else
        <h1>Neuen Empfänger anlegen</h1>
        {!! Form::open(['route' => 'receiver.store']) !!}
    @endif

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-sm-6">
            @if (!empty($receiver))
                <p>Offene Spenden: {{ number_format($receiver->open_donations, 2 , ',' , '.') }} €</p>
                <p>Spenden dieses Jahr bisher: {{ number_format($receiver->year_total_donations, 2 , ',' , '.') }} €</p>
            @endif
        </div>

    </div>
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('Max. monatliche Spende') !!}
                <div class="input-group">
                    {!! Form::text('month_max_donations', null, ['class' => 'form-control']) !!}
                    <div class="input-group-addon"> €</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('Schwellwert für Spenden') !!}
                <div class="input-group">
                    {!! Form::text('donation_threshold', null, ['class' => 'form-control']) !!}
                    <div class="input-group-addon"> €</div>
                </div>
            </div>
        </div>

    </div>

    {!! Form::submit('Speichern', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}

</div>
@endsection
