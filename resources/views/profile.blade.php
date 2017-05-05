@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">

                    <div class="panel-heading">Profile
                    <div class="pull-right">
                        @if($unfollowButton)
                            <a href="{{url('unfollows/'.$username)}}">Unfollow</a>
                            @else
                            @if($followButton)
                                <a href="{{url('follows/'.$username)}}">Follow</a>
                            @endif
                        @endif
                    </div>
                    </div>
                    <div class="panel-body">
                        {{ $username }}

                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="panel panel-default" style="padding: 10px 10px 50px 10px;">
                    <form action="{{ url('tweets/create') }}" method="get">
                        <div class="form-group">
                            <textarea name='message' class="form-control" rows="5" id="inputMessage" style="resize:none"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Tweet</button>
                    </form>
                </div>
            </div>
        </div>

              @if (count($tweets) > 0)
                  @foreach ($tweets as $tweet)
                      @if((count($tweet->tweets) > 0) and ($tweet->id == 1))
                          {{$tweet}}
                          <div class="row">
                              <div class="col-md-6 col-md-offset-3">
                                  <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <b>Username</b>
                                          <div class="pull-right">Timestamp</div>
                                      </div>
                                      <div class="panel-body">
                                          Message
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endif
                  @endforeach
              @endif
    </div>
@endsection