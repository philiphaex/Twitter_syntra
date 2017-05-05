@extends('layouts.app')

@section('content')
    <div class="container">


        @if (count($tweets) > 0)
            @foreach ($tweets as $tweet)

                <div class="row">
{{--                    {{$tweet}}--}}
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{--User--}}
                                <a href="{{url('profile/'.$tweet->user->name)}}"><strong>{{$tweet->user->name}}</strong></a>
                                <div class="pull-right"> {{--Timestamp--}}{{$tweet->created_at}}</div>
                            </div>
                            <div class="panel-body">
                                {{--Message--}}
                                {{$tweet->message}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Tweets</strong>
                        </div>
                        <div class="panel-body">
                            No tweets
                        </div>
                    </div>
                </div>
            </div>

            @endif
    </div>


@endsection
