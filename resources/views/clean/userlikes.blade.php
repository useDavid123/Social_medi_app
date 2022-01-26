@extends("clean.layout")


@section("content")
    <div id="fh5co-main">
        <div class="fh5co-intro text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="intro-lead"> Likes</h1>
                        <p class="">100% Free HTML5 Template by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></p>
                    </div>
                </div>
            </div>
        </div>


        <div id="fh5co-portfolio">

            <div class="fh4co-portfolio-item ">

                <div class="fh4co-portfolio-description">

                    @foreach($post->like as $post)
                        {{--{{$post->username  }}--}}
                        @if ( $post->id !==request()->session()->get("user_id")  )
                            <li class="notification-box bg-white">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        @if ($post->media_id == null )
                                            <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                                        @else
                                            <img src="{{Storage::url($post->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                                        @endif
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <a href="/posts/signIn/pairs/{{$post->id}}"> <strong class="text-info">{{$post->username}}<br></strong></a>
                                        <b>{{$post->fullname}}</b>
                                        <div>


                                        </div>

                                    </div>
                                </div>
                            </li>
                            <hr>
                       @endif
                    @endforeach
                    @endsection












                </div>
            </div>
        </div>
    </div>