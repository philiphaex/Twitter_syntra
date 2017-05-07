@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">

                    <div class="panel-heading">Profile
                        <div class="pull-right">
                            @if($unfollowButton)
                                <a href="{{url('unfollows/'.$user->name)}}">Unfollow</a>
                            @else
                                @if($followButton)
                                    <a href="{{url('follows/'.$user->name)}}">Follow</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="panel-body">
                        {{ $user->name }}

                    </div>
                </div>
            </div>
            </div>


            @foreach ($user->tweets()->orderBy('created_at', 'desc')->get() as $tweet)
                {{$tweet}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>{{$user->name}}</b>
                                <div class="pull-right">{{$tweet->created_at}}</div>
                            </div>
                            <div class="panel-body">
                                {{$tweet->message}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
@endsection