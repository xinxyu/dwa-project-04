@extends('layouts.master')

@section('title')
    Board | Retro Board
@stop


@section('bodyContent')
    <div id="app-description-area" class="col-xs-12 row text-center">
        <div class="page-header text-center">
            <h1>{{$title}}</h1>
        </div>
        <div class="col-xs-12">
            <h3>{{$section1}}</h3>
        </div>
        <div class="col-xs-12">
            <h3>{{$section2}}</h3>
        </div>
        <div class="col-xs-12">
            <h3>{{$section3}}</h3>
        </div>
        <div class="col-xs-12">
            <h3>{{$section4}}</h3>
        </div>
    </div>

@stop
