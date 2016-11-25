@extends('layouts.master')

@section('title')
    Create Board | Retro Board
@stop


@section('bodyContent')
    <div id="app-description-area" class="col-xs-12 row text-center">
        <div class="page-header text-center">
            <h1>Create Board</h1>
        </div>
        <div class="col-md-4 col-xs-12 col-md-offset-2 text-left">
            <span class="text-danger">*</span><small id="formHelp" class="form-text text-left"> fields are required</small>
        </div><br/><br/>
        <form class="text-left" method="post" action="/boards">
            {{ csrf_field() }}
            <div class="form-group col-md-8 col-xs-12 col-md-offset-2">
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

            <div class="form-group col-md-4 col-xs-12 col-md-offset-2">
                <label id="section1Label" for="section1Name">Section 1 Name</label>
                <input type="text" class="form-control" id="section1Name" name="section[0]" aria-describedby="section1Name" placeholder="Enter name"
                       onClick="this.setSelectionRange(0, this.value.length)"
                       value="{{old("section.0","What Went Well")}}">
            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label id="section2Label" for="section2Name">Section 2 Name</label>
                <input type="text" class="form-control" id="section2Name" name="section[1]" aria-describedby="section2Name" placeholder="Enter name"
                       onClick="this.setSelectionRange(0, this.value.length)"
                       value="{{old("section.1","What Needs Improvement")}}">
            </div>
            <div class="form-group col-md-4 col-xs-12 col-md-offset-2">
                <label id="section3Label" for="section3Name">Section 3 Name</label>
                <input type="text" class="form-control" id="section3Name" name="section[2]" aria-describedby="section3Name" placeholder="Enter name"
                       onClick="this.setSelectionRange(0, this.value.length)"
                       value="{{old("section.2","Action Items")}}">
            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label id="section4Label" for="section4Name">Section 4 Name</label>
                <input type="text" class="form-control" id="section4Name" name="section[3]" aria-describedby="section4Name" placeholder="Enter name"
                       onClick="this.setSelectionRange(0, this.value.length)"
                       value="{{old("section.3","Other Comments")}}">
            </div>
            <div class="col-md-offset-4 col-md-4 col-xs-12">
                <button type="submit" class="btn btn-default btn-primary col-xs-12">Create</button>
            </div>

        </form>
    </div>

@stop
