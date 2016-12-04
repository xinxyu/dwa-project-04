@extends('layouts.master')

@section('title')
    Create Board | Retro Board
@stop


@section('bodyContent')
    <div class="main-content-area" class="col-xs-12 row text-center">
        <div class="page-header text-center">
            <h1>Create Board</h1>
        </div>
        <div class="col-md-4 col-xs-12 col-md-offset-2 text-left">
            <span class="text-danger">*</span><small id="formHelp" class="form-text text-left"> fields are required</small>
        </div><br/><br/>
        <form class="text-left" method="post" action="/boards">
            {{ csrf_field() }}
            <div class="form-group col-md-8 col-xs-12 col-md-offset-2{{ $errors->has('boardTitle') ? ' has-error' : '' }}">
                <label id="boardTitleLabel" for="boardTitle">Title</label><span class="text-danger">*</span>
                <input type="text" class="form-control" id="boardTitle" name="boardTitle"
                       aria-describedby="boardTitleLabel"
                       placeholder="Enter title"
                        value = "{{old("boardTitle")}}">
                <small id="boardTitleHelp" class="form-text">The name of your board</small>
                @foreach ($errors->get("boardTitle") as $error)
                <br/>
                <small class="text-danger">{{ $error }}</small>
                @endforeach

            </div>

            <div class="form-group col-md-8 col-xs-12 col-md-offset-2">
                <fieldset>Sections<span class="text-danger">*</span></fieldset>
                <small id="sectionTitleHelp" class="form-text">Name each section on the board.</small>
                @foreach ($errors->get("section.0") as $error)
                    <br/>
                    <small class="text-danger">{{ $error }}</small>
                @endforeach
            </div>

            @for ($i = 0; $i < 4; $i++)
                <div class="form-group col-md-4 col-xs-12{{ $i%2 == 0 ? " col-md-offset-2" : ""}} {{ $i==0 && $errors->has('section.0') ? ' has-error' : '' }}">
                    <label id="section{{$i+1}}Label" for="section1Name">Section {{$i+1}} Name</label>
                    <input type="text" class="form-control" id="section{{$i+1}}Name" name="section[{{$i}}]"
                           aria-describedby="section{{$i+1}}Name" placeholder="Enter name"
                           onClick="this.setSelectionRange(0, this.value.length)"
                           value="{{old("section.".$i,$defaultValues[$i])}}">
                </div>
            @endfor

            <div class="col-md-offset-4 col-md-4 col-xs-12">
                <button type="submit" class="btn btn-default btn-primary col-xs-12">Create</button>
            </div>

        </form>
    </div>

@stop
