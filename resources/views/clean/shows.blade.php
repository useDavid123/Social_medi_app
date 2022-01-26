@extends("clean.layout")

@section("content")
    <style>
        .display{
            display: none;
        }

        .commentt {
            display: none;
            margin-left: 10%;}
        .displays{
            margin-left:10%;


        }
      p b{

           }

    </style>
	<h3>By:  {{$post->log->username}}</h3>
    @if ($post->media_id != 0)
        @if ($post->media->media_type == 'image/jpeg')
            <img src="{{Storage::url($post->media->media_path)}}" width="600" height="400">

        @elseif($post->media->media_type == 'image/png')
            <img src="{{Storage::url($post->media->media_path)}}" width="600" height="400">
        @endif
    @endif
    @if ($post->media_id2 != 0)
        @if ($post->medi->media_type == 'image/jpeg')
            <img src="{{Storage::url($post->medi->media_path)}}" width="600" height="400">

        @elseif($post->medi->media_type == 'image/png')
            <img src="{{Storage::url($post->media->media_path)}}" width="600" height="400">
        @endif
    @endif
<h1>  {{$post->title}}</h1>
    <p>         {{$post->body}}
    </p>



 <p>  comments: {{$achieves->count()}} </p>


	<hr>
<div class="comments">
<ul class="list-group" >
	@foreach ($post->comments as $comment)


            @if($comment->parent_id == null && $comment->relation_id == null)

<li class="list-group-item" >
	<p><strong>
		{{$comment->created_at->diffForHumans()}}: &nbsp;
	</strong></p>
    @php  $logs=$comment->log; @endphp
    @if ($logs->media_id == null )
        <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

    @else
        <img src="{{Storage::url($logs->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
    @endif
    @if ( $comment->log->id !==request()->session()->get("user_id")  )
	    <a href="/posts/signIn/pairs/{{$logs->id}}">{{$logs->username}}</a> : {{$comment->body  }}
        <br>
    <hr>
        <button onclick="k('{{$comment->id}}')">reply</button>
    @else
       {{$logs->username}} : {{$comment->body  }}
<br>
    @endif




    @if($comment->replies->count() !== 0)

        <button onclick="slide('{{$comment->body}}')"> View replies({{$comment->replies->count()}})</button>

</li>@endif
     @endif




                <div id="{{$comment->id}}" class ="display">
                    <div class="card-block">
                        <form  id="reply_comment" ACTION="{{route('comment_reply')}}" method="get" >
                            {{ csrf_field() }};
                            <div class="form-group">
                                <input type="text"  name="body" placeholder="Your message" value="to {{$logs->username}} : " class="form-control" required>

                                <input type="hidden" name="post_id" value="{{$post->id}}" >
                                <input type="hidden" name="parent_id" value="{{$comment->id}}" >
                                <input type="hidden" name="log_id" value="{{$logs->id}}">


                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary " id="btn-submit" >Reply
                                </button>
                            </div>

                        </form>
                    </div>
                </div>




  <div id="{{$comment->body}}"   class="commentt">
        @php $comments=$comment->id;  @endphp
    @foreach ($comment->replies as $comment)

                <div class="list-group" >
                    <strong>
                       <p> {{$comment->created_at->diffForHumans()}}:</p> &nbsp;
                    </strong>
                    @php  $logs=$comment->log; @endphp
                    @if ($logs->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="80" height="80" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logs->medias->media_path)}}" width="80" height="80" style="border-radius:50%">
                    @endif
                    @if($logs->id == request()->session()->get("user_id"))
                <p>{{$logs->username}} :{{$comment->body  }} </p>
                    @else
                   <p> <a href="/posts/signIn/pairs/{{$logs->id}}">{{$logs->username}} </a> {{$comment->body  }}</p>
                    <a onclick="k('{{$comment->id}}')"> reply</a>
                        <a onclick="k('{{$comment->id}}')" style="margin: 20px">  like(0)</a>
                        <hr>
                    @endif

                </div>

                    <div id="{{$comment->id}}" class ="display">
                        <div class="card-block">
                            <form  id="reply_comments" ACTION="{{route('comment_reply')}}" >
                                {{ csrf_field() }};
                                <div class="form-group">
                                    <input type="text"  name="body" placeholder="Your message" value="to {{$logs->username}} : " class="form-control" required>

                                    <input type="hidden" name="post_id" value="{{$post->id}}" >
                                    <input type="hidden" name="parent_id" value="{{$comments}}" >
                                    <input type="hidden" name="relation_id" value="{{$comment->id}}">
                                    <input type="hidden" name="log_id" value="{{$logs->id}}">



                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary " id="btn-submit" >Reply
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
        @endforeach
</ul>
</div>



    @endforeach
    </div>

<hr>
<div class="card">
<div class="card-block">
<form  id="comment_form" ACTION="{{route('post_comment')}}" >
 {{ csrf_field() }};
<div class="form-group">
<textarea name="body" placeholder="your comments" class="form-control" required></textarea>

    <input type="hidden" name="post_id" value="{{$post->id}}" >
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary " id="btn-submit" >Add comments
</button>
</div>

</form>
</div>
</div>




@section("scripts")
	<script>

        function k(comment){

            var srcElement = document.getElementById(comment);
            if (srcElement != null) {
                if (srcElement.style.display == "block") {
                    srcElement.style.display = 'none';
                }
                else {
                    srcElement.style.display = 'block';
                }
                return false;
            }

        }
        function slide(comment){

            var srcElement = document.getElementById(comment);
            if (srcElement != null) {
                if (srcElement.style.display == "block") {
                    srcElement.style.display = 'none';
                }
                else {
                    srcElement.style.display = 'block';
                }
                return false;
            }

        }



        function openForm(comment_id) {
            document.getElementById(comment_id).style.display = "block";
        }

        function closeForm(comment_id) {
            document.getElementById(comment_id).style.display = "none";
        }







$(document).ready(function() {

    $("#comment_form").submit(function(e) {


    //e.preventDefault();
    var formData = $(this).serialize();

                $.ajax({

                    type: 'get',

                    {{--url: "{{route('post_comment')}}",--}}
                    data: formData,
                    //
                    success: function (Response) {
                        // console.log(Response);

                        location.reload();
                    }
                })


});

});

        $(document).ready(function() {

            $("#reply_comments").submit(function(e) {


                //e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({

                    type: 'get',


                    data: formData,
                    //
                    success: function () {
                        // alert("comment replied");
                        // console.log("simple reply");
                        location.reload();

                    }
                })


            });

        });


        $(document).ready(function() {

            $("#reply_comment").submit(function(e) {


                //e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({

                    type: 'get',


                    data: formData,
                    //
                    success: function () {
                        // alert("comment replied");
                        // console.log("simple reply");
                        location.reload();

                    }
                })


            });

        });

	</script>
	@endsection
@endsection
