@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('status') }}
        </div>
    @endif

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
