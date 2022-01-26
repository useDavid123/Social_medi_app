

@extends("clean.layout")
@section("content")


    <div id="fh5co-main">
        <div class="fh5co-intro text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="intro-lead">Followi Posts</h1>
                        <p class="">100% Free HTML5 Template by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></p>
                    </div>
                </div>
            </div>
        </div>

        {{--@php dd($posts) @endphp--}}
    @foreach($logs->followi as $log)
        @foreach($log->post as $post)
{{--@php dd($post) @endphp--}}





                @php $logs = $post->log; @endphp
                <div id="fh5co-portfolio">
                    <div align="right">
                        @if ($logs->media_id == null )
                            <img src="{{URL::asset("images/avartar3.jpg")}}" width="100" height="100" style="border-radius:50%">

                        @else
                            <img src="{{Storage::url($logs->medias->media_path)}}" width="100" height="100" style="border-radius:50%">
                        @endif
                        <p><a href="/posts/signIn/pairs/{{$logs->id}}"> <h2>{{$logs->username}}</h2></a></p>
                    </div>
                <div class="fh4co-portfolio-item ">


                    <div class="fh4co-portfolio-description">
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
                        <h2>  {{$post->title}}   </h2>
                        {{--{{$post->id}}<h2> <a href="{{route( "index", ['id' => $post->id ] )}}" >{{$post->title}}  </a> </h2>--}}

                        {{$post->created_at->diffForHumans()}}:


                        @if   ($post->like->where("id",request()->session()->get("user_id"))->count()==1 )
                            <p>Liked</p>
                        @else
                            <br>
                            <a style="cursor:pointer;" onclick="button({{$post->like->count()}},'{{$post->id}}' ); " class="notification" id="{{$post->id}}4" ><span>Like</span><span class="badge"></span></a>

                        @endif
                        <p ><a href="/posts/userlikes/{{$post->id}}" id='{{$post->id}}'> {{$post->like->count()}}  likes </a></p>
                        {{--<p>  comments: {{$achieves->count()}} </p>--}}
                        @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                        <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}">View post({{$achieves->count()}}) </a> </p>


                    </div>
                </div>
            </div>


    @endforeach
    @endforeach
        @section("scripts")
            <script>

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
