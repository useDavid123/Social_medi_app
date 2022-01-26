@extends("clean.layout")
@section("content")
    @section("content2")
        <style>
            #alerto{
                display:none;
                /*align:right;*/
                margin:10px;
            }
            li img{
                margin:10px;
            }

        </style>

    <div class="dropdown">
        @php
        $notify = App\Notify::selectRaw("id")->where(["log_id" => $logs->id])->where(["read_type" => null])->get();
        @endphp
        <button onclick="Alert('{{$logs->id}}'); myFuncy({{$logs->notify->count()}})" class="dropbtn">
            @if($notify->count() !== 0)
            {{$notify->count()}}<br>
                @endif
            inbox</button>
        <div id="myDropy" class="dropdown-content">
@foreach ($logg as $log)

            @php   $logg=App\Log::find($log->parti_id) @endphp

                <ul class="list-group" >
@if($log->read_type == null)


                        @if ($log->type == "like")
                            @php   $post=App\Post::find($log->post_id) @endphp


                             <li class="notification-box bg-white">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                    @if ($logg->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                    @endif
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                   <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                    <b>Liked your post on {{$post->title}}</b>
                    <div>


                    </div>
                    <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>
                </div>
            </div>
        </li>
                            <hr>
                        @elseif ($log->type == "follow")
                           <li class="notification-box bg-red">
                            <div class="row">
                              <div class="col-lg-3 col-sm-3 col-3 text-center">
                                  @if ($logg->media_id == null )
                                      <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                                  @else
                                      <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                                  @endif
                          </div>
                          <div class="col-lg-8 col-sm-8 col-8">
                        <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                        <div>
                            <b>just followed you</b>
                            <span class="badge"></span>
                        </div>
                        <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            </li>
                            <hr>
                        @elseif ($log->type == "reply")
                            <li class="notification-box bg-red">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        @if ($logg->media_id == null )
                                            <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                                        @else
                                            <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                                        @endif
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                                        <div>
                                            <b>just replied your comment </b>
                                            <b><a href="/posts/signIn/pair/get/create/post/{{$log->post_id}}">Check link</a></b>
                                            <span class="badge"></span>
                                        </div>
                                        <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </li>
                            <hr>
                        @elseif ($log->type =="message")
                            <li class="notification-box">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        @if ($logg->media_id == null )
                                            <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                                        @else
                                            <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                                        @endif
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                                        <b> {{$log->message}}</b>
                                        <br>
                                        <button onclick ="openForm()" > reply</button>

                                        <div>

                                        </div>
                                        <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>

                                    </div>
                            </li>
<hr>

                        @endif
    @else



                @if ($log->type == "like")
                    @php   $post=App\Post::find($log->post_id) @endphp


        <li class="notification-box bg-white">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                    @if ($logg->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                    @endif
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                   <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                    <b>Liked your post on {{$post->title}}</b>
                    <br>
                    <img src="{{URL::asset("images/eye.png")}}" width="15" height="15">
                    <div>


                    </div>
                    <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>
                </div>
            </div>
        </li>
                            <hr>
                @elseif ($log->type == "follow")
                            <li class="notification-box bg-white">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        @if ($logg->media_id == null )
                                            <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                                        @else
                                            <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                                        @endif
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                                        <b>just followed you</b>
<br>
                                        <div>
                                            <img src="{{URL::asset("images/eye.png")}}" width="15" height="15">

                                        </div>
                                        <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </li>
                            <hr>
                        @elseif ($log->type == "reply")
                            <li class="notification-box bg-red">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                                        @if ($logg->media_id == null )
                                            <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                                        @else
                                            <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                                        @endif
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                                        <div>
                                            <b>just replied your comment </b>
                                            <b><a href="/posts/signIn/pair/get/create/post/{{$log->post_id}}">Check link</a></b>
                                            <span class="badge"></span>
                                        </div>
                                        <div>
                                            <img src="{{URL::asset("images/eye.png")}}" width="15" height="15">

                                        </div>
                                        <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </li>
                    <hr>
                @elseif ($log->type =="message")
            <li class="notification-box">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                        @if ($logg->media_id == null )
                              <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                        @else
                            <img src="{{Storage::url($logg->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                        @endif
                    </div>
                    <div class="col-lg-8 col-sm-8 col-8">
                        <a href="/posts/signIn/pairs/{{$logg->id}}"> <strong class="text-info">{{$logg->username}}</strong></a>
                        <b> {{$log->message}}</b>
                        <br>
                        <button onclick ="openForm()" > reply</button>
                        <br>
                        <img src="{{URL::asset("images/eye.png")}}" width="15" height="15">
                        <div>

                        </div>
                        <small class="text-warning">{{$log->created_at->diffForHumans()}}</small>

                    </div>
                </div>
            </li>
                            <hr>

                @endif

        @endif
                </ul>
                    @endforeach
                </div>
        <div id ="alerto"  >
            <div class="alert alert-success" role="alert" >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><b id ="success"> Post successfully created!</b>
            </div>
        </div>
        </div>






@if($logs->notify->count() !== 0)
                <div class="form-popup" id="myForm">


                    <form id="reply_message"        class="form-container"    ACTION="{{route('message')}}">
                        {{ csrf_field() }};
                        <h1>message</h1>

                        <div class="form-group">
                            <textarea name="message" placeholder="Your message" class="form-control" required></textarea>
                        </div>
                        <input type="hidden" name="log_id" value="{{$logg->id}}" >
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send
                            </button>
                        </div>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                </div>
        @endif
@endsection



@if(count($errors))




@endif



    <div id="fh5co-portfolio">

        <div class="fh4co-portfolio-item ">

            <a href="/posts/notification/{{$logs->id}}" class="notification"><span>Inbox</span><span class="badge">{{$logs->notify->count()}}</span></a>


            <div class="fh4co-portfolio-description">
                <form method="post" action="/posts/profile" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="Title">File</label>
                        <input class="" type="file" name="picture">
                    </div>
                    <div class="container-contact100-form-btn">
                        <button type="submit" class="btn btn-primary">submit

                        </button>
                    </div>
                </form>

         {{--@php dd($logs->notify);@endphp--}}
{{--@php dd($logs->media_id)  @endphp--}}
                <div  style="margin-top:50px ">
                    <div class="row">
                        <div class="col-sm-4">
                @if ($logs->media_id == null )
                  <p>  <img src="{{URL::asset("images/avartar3.jpg")}}" width="550" height="400"> </p>

@else
   <p> <img src="{{Storage::url($logs->medias->media_path)}}" width="550" height="400"></p>
                @endif
                        </div>
                        <div class="col-sm-8" >
                            <div style="margin-left:30%; margin-top:50px">
                <div class="navbari">
                    <a  href="#">{{$posts->count()}}<br>posts</a>
                    <a href="/posts/followers">{{$logs->followers->count()}}<br>Followers</a>
                    <a href="/posts/followi">{{$logs->followi->count()}}<br>following</a>

                </div>
                <br>
                <h2><font color="red"> Name: {{$logs->fullname}}</font></h2>
                                <h2><font color="red"> Email: {{$logs->email}}</font></h2>
                            </div>



            </div></div>
                </div></div></div></div>






        <div id="fh5co-main">
            <div class="fh5co-intro text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="intro-lead"> Posts</h1>
                            <p class="">100% Free HTML5 Template by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @foreach($posts as $post)

<div id="{{$post->id}}">
            <div id="fh5co-portfolio">

                <div class="fh4co-portfolio-item ">

                    <div class="fh4co-portfolio-description">
                        @if ($post->media_id != 0)
                            @if ($post->media->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">

                            @elseif($post->media->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @elseif($post->media->media_type == 'video/mp4')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        @if ($post->media_id2 != 0)
                            @if ($post->medi->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->medi->media_path)}}" width="400" height="400">

                            @elseif($post->medi->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                                @elseif($post->medi->media_type == 'video/mp4')
                                    <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                       <h2>  {{$post->title}}  </h2>

                        {{--{{$post->id}}<h2> <a href="{{route( "index", ['id' => $post->id ] )}}" >{{$post->title}}  </a> </h2>--}}
                        {{$post->created_at->diffForHumans()}}:
                        {{--<p> {{$post->created_at->toFormattedDateString()}}</p>--}}

                        <p><a href="/posts/userlikes/{{$post->id}}"> {{$post->like->count()}}  likes </a></p>
                        @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                        <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}"> {{$achieves->count()}}:comments </a>
                        </p>
                        <div class="dropdown">
                            <button onclick="myFun('{{$post->title}}')" class="dropbtn">Options</button>
                            <div id="{{$post->title}}" class="dropdown-conten">
                                <a style="cursor:pointer; background-color: #999999" onclick="DeletePost('{{$post->id}}')" class="notification"  ><span>Delete post</span><span class="badge"></span></a>
                                {{--<a href="/posts/edit/{{$post->id}}">Edit</a>--}}
                                <a href="/posts/edit/{{$post->id}}" class="notification" style="background-color:#999999"><span>Edit</span></a>

                            </div>
                        </div>
                        {{--<a style="cursor:pointer;" onclick="DeletePost('{{$post->id}}')" class="notification" id="like" ><span>Delete post</span><span class="badge"></span></a>--}}
                    </div>
                </div>
            </div>
        </div>
        </div>

            @section("scripts")
                <script>
                    function openForm() {
                        document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                        document.getElementById("myForm").style.display = "none";
                    }


                    function DeletePost(post_id){

                        var retVal = window.confirm("Do you want to continue ?");
                        if( retVal !== true ){


                        }
                        else{

                            $.ajax({
                                type: "get",
                                url: "/posts/delete/"+post_id,
                                success: function () {


                                    location.reload();
                                }
                            })
                        }
                    }

                    $( document ).ready(function(){
                        // document.getElementById("alerto").display ="block";

                    });

                    function myFun(post_title) {

                        document.getElementById(post_title).classList.toggle("show");

                    }


                    window.onclick = function(event) {
                        if (!event.target.matches('.dropbtn')) {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;
                            for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {


                                    openDropdown.classList.remove('show');
                                }
                            }
                        }
                    }

                    function myFuncy(count) {
                        if(count !== 0)
                        {
                        document.getElementById("myDropy").classList.toggle("show");
                    }
                    }


                    window.onclick = function(event) {
                        if (!event.target.matches('.dropbtn')) {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;

                            for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {


                                    openDropdown.classList.remove('show');
                                }
                            }
                        }
                    }
                    function Alert(log_id){

                        $.ajax({
                            url: "/posts/clear/"+log_id ,
                            type: "GET",


                            success: function () {
                                console.log("Simple example");
                            }
                        })
                    }
                    $(document).ready(function() {
                        $("#buttun").click(function () {
                            $('#buttun').hide();
                            $('#message').show();



                        })

                        $("#reply_message").submit(function(e) {


                            //e.preventDefault();
                            var formData = $(this).serialize();

                            $.ajax({

                                type: 'get',


                                {{--url: "{{route('post_comment')}}",--}}
                                data: formData,
                                //
                                success: function () {
                                    document.getElementById("myForm").style.display = "none";
                                    console.log("success");
                                    // location.reload();
                                }
                            })


                        });

                    });
                    $( document ).ready(function(){
                        // document.getElementById("success").innerHTML ="  Post Deleted";

                        $('#alerto').delay(4000).fadeIn('slow', function(){
                            $('#alerto').delay(3000).fadeOut();

                        });
                    });


                </script>
@endsection
    @endforeach
@section("scripts")
    <script>

    </script>
    @endsection
@endsection

