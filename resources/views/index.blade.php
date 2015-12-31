@extends('layouts.baselayout')
@section('title')
    Malifaux Card Database
@endsection
@section('content')
    <div class="row">
        <h1>Malifaux Card Database - Models Grouped by Type</h1>
        Faction: {!! Form::select('size', $factionsSelect, 'all') !!}
        @include('partials.table', ['id' => 'factionsTable', 'tableData' => $factions, 'sortable' => 'tablesorter'])
        <br>
        Masters: {!! Form::select('size', $mastersSelect, 'all') !!}
        @include('partials.table', ['id' => 'mastersTable', 'tableData' => $masters, 'sortable' => 'tablesorter'])
        <br>
        Henchmen
        @include('partials.table', ['id' => 'henchmenTable', 'tableData' => $henchmen, 'sortable' => 'tablesorter'])
        <br>
        Totems
        @include('partials.table', ['id' => 'totemsTable', 'tableData' => $totems, 'sortable' => 'tablesorter'])
        <br>
        Enforces
        @include('partials.table', ['id' => 'enforcersTable', 'tableData' => $enforcers, 'sortable' => 'tablesorter'])
        <br>
        Minions
        @include('partials.table', ['id' => 'minionsTable', 'tableData' => $minions, 'sortable' => 'tablesorter'])
        <br>
        Peons
        @include('partials.table', ['id' => 'peonsTable', 'tableData' => $peons, 'sortable' => 'tablesorter'])
    </div>
@endsection