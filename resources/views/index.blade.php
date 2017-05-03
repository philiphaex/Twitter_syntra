@extends('layouts.app')

@section('content')
    <div class="container">


        @if (count($tweets) > 0)
            @foreach ($tweets as $tweet)
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>{{$tweet->user->name}}</b>
                                <div class="pull-right">{{--Timestamp--}}{{$tweet->created_at}}</div>
                            </div>
                            <div class="panel-body">
                                {{--Message--}}
                                {{$tweet->message}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>


@endsection
