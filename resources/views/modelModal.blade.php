@extends('layouts.baseAjaxLayout')
@section('title')
    Malifaux Card Database - Model
@endsection
@section('content')
    <!-- Modal Content -->
    <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <br>
        <div class="te">
            @include('partials.modelContent')
        </div>
    </div>
@endsection