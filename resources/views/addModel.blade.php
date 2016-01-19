@extends('layouts.baselayout')
@section('title')
    Malifaux Card Database - Model
@endsection
@section('content')
    <div class="row">
        <h1>Malifaux Card Database - Add Model</h1>
        <style type="text/css">
            .modelInputNums {
                width: 2em;
            }
            #modelcost, #modelcache {
                width: 3.5em;
            }
        </style>
        <form>
            @foreach($modelFields as $field)
                <input id="model{{$field}}" type="text" class="@if($field !== 'name') modelInputNums @endif" placeholder="{{$field}}" name="{{$field}}">
            @endforeach
                <br>
            @foreach($factions as $faction)
                <input id="faction{{$faction->faction}}" type="checkbox" name="faction" value="{{$faction->faction}}"><label for="faction{{$faction->faction}}">{{$faction->faction}}</label>
            @endforeach
        </form>
    </div>
@endsection