@extends("clean.layout")


@section("content")
    <div id="fh5co-main">
        <div class="fh5co-intro text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="intro-lead">  Notifications</h1>
                        <p class="">100% Free HTML5 Template by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-portfolio">

            <div class="fh4co-portfolio-item ">

                <div class="fh4co-portfolio-description">
                    @foreach ($logs->notify as $log)
                        @php   $logg=App\Log::find($log->parti_id) @endphp
                        {{--@php dd($logg); @endphp--}}
                        {{--@foreach ($logg as $log )--}}
                        <div class="comments">
                            <ul class="list-group" >
                                <li class="list-group-item" >
                                    @if ($logg->media_id == null )
                                        <p> <img src="" width="100" height="100"></p>

                                    @else    <p> <img src="{{Storage::url($logg->medias->media_path)}}" width="100" height="100"></p>
                                @endif

                                @if ($log->type == "like")
                                    @php   $post=App\Post::find($log->post_id) @endphp
                                    {{--@php dd($log->post_id); @endphp--}}
                                    <li><a href="/posts/signIn/pairs/{{$logg->id}}">{{$logg->username}}</a>Liked your post on {{$post->title}}
                                        <p>{{$log->created_at->diffForHumans()}}</p></li>

                                @elseif ($log->type == "follow")
                                    <li> <a href="/posts/signIn/pairs/{{$logg->id}}">{{$logg->username}}</a><font color="red"> Just followed you</font></li>
                                    <p>{{$log->created_at->diffForHumans()}}</p>
                                @elseif ($log->type =="message")
                                    <li> <a href="/posts/signIn/pairs/{{$logg->id}}">{{$logg->username}}</a><font color="#a52a2a"> {{$log->message}}</font><br><button onclick="openForm()"> reply</button></li>
                            </ul>
                        </div>

                        </ul>
                        @endif
            @endforeach
                </div></div></div></div>
    @endsection