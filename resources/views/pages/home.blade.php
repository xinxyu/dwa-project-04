@extends('layouts.master')

@section('title')
    Main | Retro Board
@stop

@section('bodyContent')
    <div id="cover-area" class="col-xs-12 row text-center">
        <h1>Retro Board</h1>
        <p class="lead">Virtual boards for agile
            <a href="http://searchsoftwarequality.techtarget.com/definition/Agile-retrospective" target="_blank">retrospectives</a>.
        </p>
        <p class="lead">
            <a href="/boards/create" target="_self"><button class="btn btn-primary btn-md" >Start a Board</button></a>
        </p>
    </div>

@stop
