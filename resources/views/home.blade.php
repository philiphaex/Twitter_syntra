@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default" style="padding: 10px 10px 50px 10px;">
                    <form>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="inputMessage" style="resize:none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Tweet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{{--Username--}}</b>
                        <div class="pull-right">{{--Timestamp--}}</div>
                    </div>
                    <div class="panel-body">
                        {{--Message--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection