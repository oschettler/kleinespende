@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($receivers as $receiver)
                <div class="panel panel-default">
                    <div class="panel-heading">Deine Spenden an <strong>{{ $receiver->name }}</strong></div>

                    <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6 donation-dash">
                                    <span class="amount">{{ number_format($receiver->open_donations, 2 , ',' , '.') }}</span> €
                                    <br>Offene Spenden
                                    <br>Noch {{ number_format($receiver->donation_threshold - $receiver->open_donations, 2 , ',' , '.') }} € bis zur nächsten Spende
                                </div>
                                <div class="col-sm-6 donation-dash">
                                    <span class="amount">{{ number_format($receiver->year_total_donations, 2 , ',' , '.') }}</span> €
                                    <br>In diesem Jahr schon gespendet
                                </div>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
