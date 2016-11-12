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
            <span class="text-danger">*</span><small id="boardTitleHelp" class="form-text text-left"> fields are required</small>
        </div><br/><br/>
        <form class="text-left">
            <div class="form-group col-md-8 col-xs-12 col-md-offset-2">
                <label for="boardTitle">Title</label><span class="text-danger">*</span>
                <input type="text" class="form-control" id="boardTitle" name="boardTitle" aria-describedby="emailHelp" placeholder="Enter title">
                <small id="boardTitleHelp" class="form-text">The name of your board</small>
            </div>

            <div class="form-group col-md-8 col-xs-12 col-md-offset-2">
                <fieldset>Sections<span class="text-danger">*</span></fieldset>
                <small id="boardTitleHelp" class="form-text">Name each section on the board. At least 1 name required.</small>
            </div>

            <div class="form-group col-md-4 col-xs-12 col-md-offset-2">
                <label for="section1Name">Section 1 Name</label>
                <input type="text" class="form-control" id="section1Name" name="section1Name" aria-describedby="section1Name" placeholder="Enter name">
            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label for="section2Name">Section 2 Name</label>
                <input type="text" class="form-control" id="section2Name" name="section2Name" aria-describedby="section2Name" placeholder="Enter name">
            </div>
            <div class="form-group col-md-4 col-xs-12 col-md-offset-2">
                <label for="section3Name">Section 3 Name</label>
                <input type="text" class="form-control" id="section2Name" name="section3Name" aria-describedby="section3Name" placeholder="Enter name">
            </div>
            <div class="form-group col-md-4 col-xs-12">
                <label for="section2Name">Section 4 Name</label>
                <input type="text" class="form-control" id="section4Name" name="section4Name" aria-describedby="section4Name" placeholder="Enter name">
            </div>
            <div class="col-md-offset-4 col-md-4 col-xs-12">
                <button type="submit" class="btn btn-default btn-primary col-xs-12">Create</button>
            </div>

        </form>
    </div>

@stop
