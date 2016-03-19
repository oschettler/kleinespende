@extends('layouts.app')

@section('content')
<div class="container">
    @if ($button)
        <h1>Button &laquo;{{ $button->name }}&raquo; ändern</h1>
    @else
        <h1>Neuen Button anlegen</h1>
    @endif
</div>
@endsection
