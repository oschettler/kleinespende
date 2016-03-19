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
                                    <span id="open-donations" class="amount">{{ number_format($receiver->open_donations, 2 , ',' , '.') }}</span> €
                                    <br>Offene Spenden
                                    <br>Noch <span id="remaining-amount">{{ number_format($receiver->donation_threshold - $receiver->open_donations, 2 , ',' , '.') }}</span> € bis zur nächsten Spende
                                </div>
                                <div class="col-sm-6 donation-dash">
                                    <span id="month-total-donations" class="amount">{{ number_format($receiver->month_total_donations, 2 , ',' , '.') }}</span> €
                                    <br>In diesem Monat schon gespendet
                                </div>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.pusher.com/3.0/pusher.min.js"></script>
<script>
    Pusher.log = function(message) {
        if (window.console && window.console.log) {
            window.console.log(message);
        }
    };
    var pusher = new Pusher("{{ env('PUSHER_KEY') }}", {
        cluster: 'eu',
        encrypted: true
    });
</script>
<script src="/js/pusher.js"></script>
@endsection
