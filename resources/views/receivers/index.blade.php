@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.status')

    <h1>Spendenempfänger</h1>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <a class="pull-right" href="{{ route('receiver.create') }}"><i class="fa fa-btn fa-plus-circle"></i></a>
                    Name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receivers as $receiver)
                <tr>
                    <td><a href="{{ route('receiver.edit', ['id' => $receiver->id]) }}">{{ $receiver->name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
