@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Deine Buttons</h1>
    <div class="row">
        @forelse ($buttons as $button)
            <div class="col-sm-3 thumbnail">
                <a href="{{ route('button.edit', ['id' => $button->id ]) }}">
                    <img title="{{ $button->name }}" src="/img/button-{{ $button->type }}.png">
                </a>
            </div>
        @empty
            <div class="col-md-12">
                <p>Keine Buttons eingerichtet. Einen <a href="{{ route('button.create') }}">Button einrichten</a>.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
