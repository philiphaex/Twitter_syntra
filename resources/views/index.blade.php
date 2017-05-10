@extends('layouts.app')

@section('content')
    <div class="container">

       {{-- <?php var_dump($tweets->count())
        ?>--}}
        @if ($tweets->count() > 0 )
            @foreach (  $tweets as $tweet  )

                <div class="row">
                    <?php var_dump($tweet);
                    var_dump($tweet->user);
                    var_dump($tweet->user->name);
                        die()
                    ?>
                    {{--
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                User
                                <a href="{{url('profile/'.$tweet->user->name)}}"><strong>{{$tweet->user->name}}</strong></a>
                                <div class="pull-right"> Timestamp{{$tweet->created_at}}</div>
                            </div>
                            <div class="panel-body">
                                Message
                                {{$tweet->message}}
                            </div>
                            @if(  !empty(Auth::user())  )
                                @if(  ($tweet->user->name == Auth::user()->name) )
                                    <div class="panel-footer clearfix">
                                        <div class="pull-right">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <button class="btn btn-default editButton">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-1 col-md-offset-1">
                                                    <form action="{{ url('tweets/'.$tweet->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-default" id="deleteButton">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="editInput"  style="display:none">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <form action="{{ url('tweets/'.$tweet->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <textarea name='message'  class="form-control" rows="1" style="resize:none">{{$tweet->message}}</textarea>
                                                            <input type="hidden" name="id" value="{{$tweet->id}}">
                                                            <button type="submit" class="btn btn-primary pull-right ">Edit</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>--}}
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
    <script src="{{ asset('js/show.js') }}"></script>




@endsection
