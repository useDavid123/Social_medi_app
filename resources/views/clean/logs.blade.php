@extends("clean.layout")
@section("content")

                        <div class="navbar-header">
                            <!-- Mobile Toggle Menu Button -->

                            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle visible-xs-block" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>



                            <div class="form-popup" id="myForm">
                                <form method="get"       action="/posts/message" class="form-container" >
                                    {{ csrf_field() }};
                                    <h1>message</h1>

                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your message" class="form-control" required></textarea>
                                    </div>
                                    <input type="hidden" name="log_id" value="{{$logs->id}}">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send
                                        </button>
                                    </div>
                                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                </form>
                            </div>
                            <div  style="margin-top:50px ">
                                <div class="row">
                                    <div class="col-sm-4">
                            @if ($logs->media_id == null )
                                           <img scr ="{{URL::asset("images/avatar3.jpg")}}" width="540" height="370">

                        @else     <img src="{{Storage::url($logs->medias->media_path)}}" width="550" height="400" style="margin:30px">
                            @endif
                                    </div>
                                    <div class="col-sm-8" >
                                        <div style="margin-left:40%; margin-top:50px">
                            <div class="navbari"  >
                                <a href=""><span>{{$posts->count()}}<br>posts <span class="border"></span></span></a>
                                <a href="/posts/followers/{{$logs->id}}"><span>{{$logs->followers->count()}}<br>Followers <span class="border"></span></span></a>
                                <a href="/posts/followi/{{$logs->id}}"><span>{{$logs->followi->count()}}<br>following<span class="border"></span></span></a>

                            </div>
                            <h2> Name: {{$logs->fullname}}</h2>
                            <h2> Email: {{$logs->email}}</h2>
            @if   ($logs->followers->where("id",request()->session()->get("user_id"))->count()==1 )
                                <button class="button" style="cursor:pointer;" onclick="unfollow('{{$logs->id}}')">unfollow</button>

                                 @else
                                <button class="button"  style="cursor:pointer;" onclick="follow('{{$logs->id}}')" >follow</button>
                                  @endif
                                            <button onclick="openForm()" class="button"  style="cursor:pointer;">message</button>
                                    </div>
                                </div>
                        </div>
<br><br>






                        {{--<div id="fh5co-navbar" class="navbar-collapse collapse">--}}

    <div id="fh5co-main">
        <div class="fh5co-intro text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="intro-lead">posts from {{$logs->fullname}}</h1>
                        <p class="">100% Free HTML5 Template by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></p>
                    </div>
                </div>
            </div>
        </div>
@foreach($posts as $post)


    <div id="fh5co-portfolio">

        <div class="fh4co-portfolio-item ">

            <div class="fh4co-portfolio-description">
                {{--@foreach($media as $medias)--}}


                @if ($post->media_id != 0)
                    @if ($post->media->media_type == 'image/jpeg')
                        <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">

                    @elseif($post->media->media_type == 'image/png')
                        <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                    @endif
                @endif
                @if ($post->media_id2 != 0)
                    @if ($post->medi->media_type == 'image/jpeg')
                        <img src="{{Storage::url($post->medi->media_path)}}" width="400" height="400">

                    @elseif($post->medi->media_type == 'image/png')
                        <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                    @endif
                @endif
                {{--@endforeach--}}
                <h2> {{$post->title}} </h2>



                {{$post->created_at->diffForHumans()}}:



                @if   ($post->like->where("id",request()->session()->get("user_id"))->count()==1 )
                    <p>Liked</p>
                @else
                    <br>
                    <a style="cursor:pointer;" onclick="button({{$post->like->count()}},'{{$post->id}}' ); " class="notification" id="{{$post->id}}4" ><span>Like</span><span class="badge"></span></a>

                @endif
                <p ><a href="/posts/userlikes/{{$post->id}}" id='{{$post->id}}'> {{$post->like->count()}}  likes </a></p>
                @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}"> view post({{$achieves->count()}}) </a> </p>
            </div>
        </div>
    </div>


        @endforeach
        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
            window.onscroll = function() {scrollFunction()};
        </script>

        @section("scripts")
            <script>


                function follow(logs_id){
                    $.ajax({
                        type: "GET",
                        url: "/posts/follow/"+logs_id,
                        success: function() {
                            location.reload();

                            // console.log("Simple example");
                        }
                    })
                }
                function unfollow(logs_id){
                    $.ajax({
                        type: "GET",
                        url: "/posts/unfollow/"+logs_id,

                        success: function() {
                            location.reload();
                            // console.log("Simple example");
                        }
                    })
                }



                function button(m , f ){

                    var button =
                            document.getElementById(f),
                        count = m;

                    if(count>m){}
                    else{
                        document.getElementById(f+4).style.display = "none";
                        count += 1;
                        button.innerHTML = + count + " likes";

                        $.ajax({
                            type: "GET",
                            url: "/posts/like/"+f,
                            //data: "",
                            success: function() {

                                console.log("Simple example");
                            }
                        })
                    }


                }






            </script>
        @endsection
@endsection


