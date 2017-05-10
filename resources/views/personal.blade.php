@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">

                    <div class="panel-heading">Profile
                    </div>
                    <div class="panel-body">
                        {{ $user->name }}

                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="panel panel-default" style="padding: 10px 10px 50px 10px;">
                    <form action="{{ url('tweets/create') }}" method="get">
                        <div class="form-group">
                            <textarea name='message' class="form-control" rows="3" id="inputMessage" style="resize:none"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Tweet</button>
                    </form>
                </div>
            </div>
        </div>

    {{--@php
    var_dump($followerTweets);
    @endphp--}}

     @foreach($followerTweets as $tweet)
         <div class="row">
             <div class="col-md-6 col-md-offset-3">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <a href="{{url('profile/'.$tweet->name)}}"><strong>{{$tweet->name}}</strong></a>
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