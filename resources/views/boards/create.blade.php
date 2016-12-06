@extends('layouts.master')

@section('title')
    Create a Board | Retro Board
@stop


@section('bodyContent')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Board</div>
                <div class="panel-body">

                    <div class="col-md-4 col-xs-12 text-left">
                        <span class="text-danger">*</span><small id="formHelp" class="form-text text-left"> fields are required</small>
                    </div>
                    <br/>
                    <br/>
                    <form class="form-horizontal" method="post" action="/boards">
                    {{ csrf_field() }}
                <div class="form-group{{ $errors->has('boardTitle') ? ' has-error' : '' }}">
                    <label id="boardTitleLabel" class="col-md-4 control-label" for="boardTitle">Board Title<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="boardTitle" name="boardTitle"
                               aria-describedby="boardTitleLabel"
                               placeholder="Enter title"
                                value = "{{old("boardTitle")}}" required autofocus>
                        @if($errors->get("boardTitle"))
                        <span class="help-block">
                        @foreach ($errors->get("boardTitle") as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                        </span>
                        @endif
                    </div>
                </div>
                @for ($i = 0; $i < 4; $i++)
                <div class="form-group {{ $i==0 && $errors->has('section.0') ? ' has-error' : '' }}">
                    <label id="section{{$i+1}}Label" class="col-md-4 control-label" for="section1Name">
                        Section {{$i+1}} Name @if($i==0)<span class="text-danger">*</span>@endif
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="section{{$i+1}}Name" name="section[{{$i}}]"
                               aria-describedby="section{{$i+1}}Name" placeholder="Enter name"
                               onClick="this.setSelectionRange(0, this.value.length)"
                               value="{{old("section.".$i,$defaultValues[$i])}}" {{$i==0 ? "required": ""}}>
                        @if($i==0 && $errors->get("section.0"))
                            <span class="help-block">
                        @foreach ($errors->get("section.0") as $error)
                                <strong>{{ $error }}</strong>
                                @endforeach
                            </span>
                        @endif
                    </div>
                </div>
                @endfor

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-primary">Create</button>
                    </div>
                </div>

            </form>
                </div>
            </div>
        </div>
    </div>

@stop
