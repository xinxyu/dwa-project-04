@extends('layouts.master')

@section('title')
    My Boards | Retro Board
@stop


@section('bodyContent')

    <div class="main-content-area" class="col-xs-12 row text-center">
        <div class="page-header text-center">
            <h1>My Boards</h1>
        </div>

        @if(count($boards) == 0)
            <div class="lead text-center">
                <p>You don't have any boards. Create one <a href="/boards/create" target="_self">here</a>.</p>
            </div>
        @else
            <div class="list-group col-xs-12">
                @foreach($boards as $board)
                    <a href="/boards/{{$board->id}}" class="list-group-item">
                        {{$board->title}} - {{$board->created_at}}
                    </a>
                @endforeach
            </div>
        @endif

    </div>
@stop
