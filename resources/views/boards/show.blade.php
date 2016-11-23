@extends('layouts.master')

@section('title')
    Board | Retro Board
@stop

@section('bodyContent')
        <div ng-controller="boardCtrl" id="app-description-area" class="col-xs-12 row text-center" data-ng-init="loadBoard()">

        <div class="page-header text-center">
            <h1>[[board.title]]</h1>
        </div>

        <div data-ng-repeat="row in getRows() track by $index" class="row">
            <div data-ng-repeat="section in sections track by $index" data-ng-if="[[$index]] < [[($parent.$index+1)*2]] && [[$index]] >= [[$parent.$index*2]]"
                 id="section[[$index]]" class="col-xs-12 col-md-6">
                <h3>[[section.title]] </h3>
                <div class="note-group">
                    <div data-ng-repeat="note in section.notes track by $index" class="note-group-item text-left">
                        <div class="row">
                            <div class="list-group-item-text col-xs-11 note-group-item-text" data-ng-model="note[[$index]]">[[note.message]]</div>
                            <div title="Delete Note" class="btn btn-danger btn-md col-xs-1" data-ng-click="deleteNote([[$parent.$index]],[[$index]])">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="note"  data-ng-model="noteInputs[ [[$index]] ]" data-ng-enter="addNote([[$index]])">
                    <span class="input-group-btn">
                            <button title="Add Note" class="btn btn-success" type="button"
                                    data-ng-click="addNote([[$index]])" >
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                </div>
            </div>
        </div>


    </div>

@stop
