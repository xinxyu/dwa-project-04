@extends('layouts.master')

@section('title')
    Board Deleted | Retro Board
@stop


@section('bodyContent')
    <div class="main-content-area" class="col-xs-12 row text-center">
        <div class="page-header text-center">
            <h1>Board Deleted</h1>
        </div>
        <div class="lead text-center">
            <p>Your board has been successfully deleted. Create another board <a href="/boards/create" target="_self">here</a>.</p>
        </div>

    </div>
@stop
