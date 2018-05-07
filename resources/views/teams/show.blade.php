@extends('layouts.app')

@section('content')
<div class="players-list container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Players for team {{ $team->name}}</h1>
        </div>
    </div>
</div>
<br />
<player-create :team="{{ $team }}"></player-create>
<br />
<players-list :team="{{ $team }}"></players-list>
@endsection