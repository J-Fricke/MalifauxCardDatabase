@extends('layouts.baselayout')
@section('title')
    Malifaux Card Database
@endsection
@section('content')
    <div class="row">
        <h1>Malifaux Card Database</h1>
        Faction: {!! Form::select('size', $factionsSelect, 'all') !!}
        @include('partials.table', ['id' => 'factionsTable', 'tableData' => $factions])
        <br>
        Masters: {!! Form::select('size', $mastersSelect, 'all') !!}
        @include('partials.table', ['id' => 'mastersTable', 'tableData' => $masters])
        <br>
        Henchmen
        @include('partials.table', ['id' => 'henchmenTable', 'tableData' => $henchmen])
        <br>
        Totems
        @include('partials.table', ['id' => 'totemsTable', 'tableData' => $totems])
        <br>
        Enforces
        @include('partials.table', ['id' => 'enforcersTable', 'tableData' => $enforcers])
        <br>
        Minions
        @include('partials.table', ['id' => 'minionsTable', 'tableData' => $minions])
        <br>
        Peons
        @include('partials.table', ['id' => 'peonsTable', 'tableData' => $peons])
    </div>
@endsection