@extends('layouts.baselayout')
@section('title')
    Malifaux Card Database
@endsection
@section('content')
    <div class="row">
        <h1>Malifaux Card Database</h1>
        Faction: {!! Form::select('size', $factionsSelect, 'all') !!}
        @include('partials.table', ['tableData' => $factions])
        <br>
        Masters: {!! Form::select('size', $mastersSelect, 'all') !!}
        @include('partials.table', ['tableData' => $masters])
        <br>
        Henchmen
        @include('partials.table', ['tableData' => $henchmen])
        <br>
        Totems
        @include('partials.table', ['tableData' => $totems])
        <br>
        Enforces
        @include('partials.table', ['tableData' => $enforcers])
        <br>
        Minions
        @include('partials.table', ['tableData' => $minions])
        <br>
        Peons
        @include('partials.table', ['tableData' => $peons])
    </div>

@endsection