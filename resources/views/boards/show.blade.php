@extends('layouts.master')

@section('title')
    Board | Retro Board
@stop


@section('bodyContent')
    <div ng-controller="boardCtrl" id="app-description-area" class="col-xs-12 row text-center">

        <div class="page-header text-center">
            <h1>[[title]]</h1>
        </div>

        <div ng-repeat="row in getRows() track by $index" class="row">
            <div ng-repeat="section in sections track by $index" ng-if="[[$index]] < [[($parent.$index+1)*2]] && [[$index]] >= [[$parent.$index*2]]"
                 id="section[[$index]]" class="col-xs-12 col-md-6">
                <h3>[[section.name]] </h3>
                <div class="note-group">
                    <div ng-repeat="note in section.notes track by $index" class="note-group-item text-left">
                        <div class="row">
                            <div class="list-group-item-text col-xs-11 note-group-item-text" ng-model="note[[$index]]">[[note]]</div>
                            <div title="Delete Note" class="btn btn-danger btn-md col-xs-1" ng-click="deleteNote([[$parent.$index]],[[$index]])">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="note"  ng-model="noteInputs[ [[$index]] ]" my-enter="addNote([[$index]])">
                    <span class="input-group-btn">
                            <button title="Add Note" class="btn btn-success" type="button"
                                    ng-click="addNote([[$index]])" >
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                </div>
            </div>
        </div>

    </div>

@stop
