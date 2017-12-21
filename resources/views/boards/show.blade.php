@extends('layouts.master')
@section('title')
    Board | Retro Board
@stop
@section('headContent')
    <!-- Page Specific Styles -->
    <link rel="stylesheet"  href="{{ asset('css/print.css')}}" media="print">
@stop
@section('bodyContent')
        <div data-ng-controller="boardCtrl" class="main-content-area" class="col-xs-12 row text-center" data-ng-init="loadBoard()" ng-cloak>
            <div class="text-right">
                @if($ownsBoard)
                <button title="Delete Board" class="btn btn-danger btn-md board-buttons" data-toggle="modal" data-target="#confirmBoardDeleteModal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                </button>
                @endif
                <button title="Print Board" class="btn btn-primary btn-md board-buttons" onclick="window.print()">
                    <i class="fa fa-print" aria-hidden="true"></i> Print
                </button>
                <button title="Refresh Board" class="btn btn-primary btn-md board-buttons" data-ng-click="loadBoard()">
                    <i class="fa fa-refresh" aria-hidden="true"></i> Refresh
                </button>
            </div>
            <div class="page-header text-center">
                <h1>[[board.title]]</h1>
            </div>
            <div class="text-right">
                <div id="dd-sort-container" class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dd-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Sort By &nbsp;&nbsp;<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dd-sort">
                        <li><a data-ng-click="setSort('-votes')">Votes</a></li>
                        <li><a data-ng-click="setSort('message')">Message</a></li>
                        <li><a data-ng-click="setSort('id')">Nothing</a></li>
                    </ul>
                </div>
            </div>
            <div data-ng-repeat="row in getRows() track by $index" class="row">
                <div data-ng-repeat="section in sections track by $index"
                     data-ng-if="[[$index]] < [[($parent.$index+1)*2]] && [[$index]] >= [[$parent.$index*2]]"
                     id="section[[$index]]" class="col-xs-12 col-md-6">
                    <h3>[[section.title]] </h3>
                    <div class="note-group">
                        <div data-ng-repeat="note in section.notes | orderBy:order " class="note-group-item text-left" ng-class="{'note-group-item-last':$last}" bs-popover>
                            <div class="row" >
                                <button title="Up Vote" class="voteButton btn btn-primary btn-md col-sm-2 col-xs-2"
                                     data-ng-click="upVoteNote([[$parent.$index]],[[note.id]])"
                                        rel="popover"
                                        data-content="Voted!">
                                    <i class="fa fa-thumbs-up" aria-hidden="true">
                                    </i>
                                    &nbsp;<span class="badge">[[note.votes]]</span>
                                </button>
                                <div class="list-group-item-text col-sm-9 col-xs-8 col-print-10 note-group-item-text"
                                     data-ng-model="note[[$index]]">[[$index+1]]. [[note.message]]</div>
                                <div title="Delete Note" class="btn btn-danger btn-md col-sm-1 col-xs-2 delete-note-button"
                                     data-ng-click="deleteNote([[$parent.$index]],[[note.id]])">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter a note"
                               data-ng-model="noteInputs[ [[$index]] ]"
                               data-ng-enter="addNote([[$index]])">
                        <span class="input-group-btn">
                                <button title="Add Note" class="btn btn-success" type="button"
                                        data-ng-click="addNote([[$index]])" >
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </span>
                    </div>
                </div>
            </div>
            <!-- Delete Board Confirmation Modal -->
            <div id="confirmBoardDeleteModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content text-center">
                        <div class="modal-header ">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Board</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this board and all of its contents?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-ng-click="deleteBoard()">Delete Board</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close Dialog</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop
