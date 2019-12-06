@extends("layouts.blue")
@push('style')
        .mycss{ background-color: green;}
        .singleImage{
        position:relative;
        }
        .singleImage span{
        position:absolute;
        top:-10px;
        right:-10px;
        border-radius:50%;
        }

@endpush

@section('sidebar-left')
    <div class="profile-card">
        <img src="{{asset('storage/profile/'.Auth::id().'_profile_thumb.jpg')}}" alt="user" class="profile-photo" />
        <h5><a href="timeline.html" class="text-white">{{Auth::user()->name}}</a></h5>
        <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
    </div><!--profile card ends-->
    <ul class="nav-news-feed">
        <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Newsfeed</a></div></li>
        <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">People Nearby</a></div></li>
        <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
        <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
        <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
        <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
    </ul><!--news-feed links ends-->
    <div id="friends-block">
        <div class="title">Friends</div>
        <hr>
        <ul class="online-users list-inline list-unstyled">
        @forelse($friends as $friend)
{{--Example {"id":30,"user_id":1,"friend_id":4,"approved":1,"blocked":0,"created_at":"2018-09-17 07:25:41","updated_at":"2018-09-17 07:25:48","user":{"id":1,"name":"Admin","email":"admin@idbbisew.com","email_verified_at":null,"created_at":"2018-09-10 04:17:28","updated_at":"2018-09-10 04:17:28"},"friend_info":{"id":4,"name":"SOHEL RANA","email":"emdsohel@gmail.com","email_verified_at":null,"created_at":"2018-09-12 06:11:35","updated_at":"2018-09-12 06:11:35"}}--}}
            @if($friend->user_id != Auth::id())
                    <li class="list-inline-item"><a href="{{url('profile/'.$friend->user_id)}}" title="{{$friend->user->name}}"><img src="{{asset('storage/profile/'.$friend->user_id.'_icon.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                @endif
                @if($friend->friend_id != Auth::id())
                    <li class="list-inline-item"><a href="{{url('profile/'.$friend->friend_id)}}" title="{{$friend->friendInfo->name}}"><img src="{{asset('storage/profile/'.$friend->friend_id.'_icon.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
                @endif

            @empty
            <h3>no friends yet, search for new friends</h3>
            @endforelse
            </ul>
    </div><!--Friends block ends-->
    <div id="chat-block">
        <div class="title">Chat online</div>
        <ul class="online-users list-inline list-unstyled">
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Linda Lohan"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Sophia Lee"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="John Doe"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Alexis Clark"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="James Carter"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Robert Cook"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Richard Bell"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Anna Young"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li class="list-inline-item"><a href="newsfeed-messages.html" title="Julia Cox"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        </ul>
    </div><!--chat block ends-->
@endsection

@section('content')
    <div class="row">

    </div>
    <!-- Post Create Box
                ================================================= -->
    <div class="create-post">
        <form action="" id="postform">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <img src="{{asset('storage/profile/'.Auth::id().'_profile_thumb.jpg')}}" alt="" class="profile-photo-md" />
                </div>
                <div class="col-md-10 col-sm-10">
                    <textarea name="texts" id="contentpost" class="form-control" placeholder="Write what you wish"></textarea>
                </div>

                <div class="col-md-2 col-sm-2">
                </div>
                <div class="col-md-10 col-sm-10">
                    <div class="tools">
                        <ul class="publishing-tools list-inline list-unstyled">
                            <li class="list-inline-item"><a href="#"><i class="ion-compose"></i></a></li>
                            <li class="list-inline-item">

                                <label for="post-images" title="Upload Images">
                                    <i class="ion-images"></i>
                                </label>
                                <input type="file" id="post-images" class="d-none" name="photos[]" accept="image/gif, image/jpeg, image/png" multiple />



                            </li>
                            <li class="list-inline-item"><a href="#"><i class="ion-ios-videocam"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ion-link"></i></a></li>
                            <li class="list-inline-item">
                                <select id="privacy">
                                    <option value="public">Public</option>
                                    <option value="friends">Friends</option>
                                    <option value="me">Only me</option>
                                </select>
                            </li>
                        </ul>
                        <button type="button" id="publishpost" class="btn btn-primary pull-right">Publish</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <div class="preview"></div>
                    </div>

                </div>
            </div>
        </form>
    </div><!-- Post Create Box End-->
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="errorcontainer">
            <h3>{{ $message }}</h3>
        </div>
    @endif
    <div class="scroll">
    @forelse($posts as $post)


        <!-- Post Content
                ================================================= -->
        <div class="post-content postid-{{$post->id}}">
            {{--<img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" />--}}

            <div class="post-container">
                <img src="{{asset('storage/profile/'.$post->user_id.'_profile_thumb.jpg')}}" alt="user" class="img-responsive profile-photo profPost a commentile-photo-md pull-left" />
                <div class="post-detail">
                    <div class="user-info">
                        <h5>
                            <a href="timeline.html" class="profile-link">{{$post->user->name}}</a>
                            <span>
                                @if($post->privacy == 'public')
                                    <i class="ion-ios-world"></i>
                                @elseif($post->privacy == 'friends')
                                    <i class="fas fa-users"></i>
                                @endif

                            </span>
                            <span class="following">following</span></h5>
                        <p class="text-muted">Published  about {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
                    </div>
                    @php
                    $reactCount = [
                    'l'=>0,
                    'd'=>0,
                    'h'=>0,
                    's'=>0,
                    'reacted'=> false,
                    'type'=>"0"
                    ];
                    $totalReactions = $post->reactions->count();
                    foreach ($post->reactions as $reaction){
                    if($reaction->user_id == Auth::id()){
                    $reactCount['type'] = $reaction->type;
                    $reactCount['reacted'] = true;
                    }
                        //echo "<h3>".$reaction->type."</h3>";
                        $reactCount[$reaction->type]++;
                    }
                    $my_reaction = ($reactCount['reacted'])?"You and ":"";
                    if($reactCount['reacted'] && $totalReactions == 1 ){
                    echo "<span>Only you reacted</span>";
                    }
                    else{
                    if($reactCount['reacted']){$totalReactions--;}
                    echo "<span>".$my_reaction. $totalReactions." people reacted</span>";
                    }
                    //print_r($reactCount);
                    @endphp

                    <div class="reaction">
                        <a data-postid="{{$post->id}}" data-reaction="l" class="btn text-{{($reactCount['type']==='l')?"primary":"secondary"}} reactionBtn"><i class="icon ion-thumbsup"></i> {{$reactCount['l']}}</a>
                        {{--<a data-postid="{{$post->id}}" data-reaction="l" class="btn text-primary reactionBtn"><i class="icon ion-thumbsup"></i> 0</a>--}}
                        <a  data-postid="{{$post->id}}" data-reaction="d" class="btn text-{{($reactCount['type']==="d")?"danger":"secondary"}} reactionBtn"><i class="fa fa-thumbs-down"></i> {{$reactCount['d']}}</a>
                        {{--<a  data-postid="{{$post->id}}" data-reaction="d" class="btn text-danger reactionBtn"><i class="fa fa-thumbs-down"></i> 0</a>--}}
                        <a data-postid="{{$post->id}}" data-reaction="h" class="btn text-{{($reactCount['type']==="h")?"success":"secondary"}} reactionBtn"><ion-icon name="heart"></ion-icon> {{$reactCount['h']}}</a>
                        {{--<a data-postid="{{$post->id}}" data-reaction="h" class="btn text-success reactionBtn"><ion-icon name="heart"></ion-icon> 0</a>--}}
                        <a data-postid="{{$post->id}}" data-reaction="s" class="btn text-{{($reactCount['type']==="s")?"success":"secondary"}} reactionBtn"><ion-icon name="happy"></ion-icon> {{$reactCount['s']}}</a>
                        {{--<a data-postid="{{$post->id}}" data-reaction="s" class="btn text-success reactionBtn"><ion-icon name="happy"></ion-icon> 0</a>--}}
                        {{--<a class="btn text-danger"><i class="fa fa-thumbs-down"></i> 0</a>--}}
                        @if($post->user_id == Auth::id())
                            {!!   Form::open([
'url' => 'post/'.$post->id,'method' => 'delete','class'=>'d-inline'
            ]) !!}
                            <button class="btn btn-danger fa fa-trash" onclick="return confirm('Are you sure you want to delete this post?');"></button>
                            {!!   Form::close() !!}
                        @endif
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-text">
                        <p>{!!$post->content!!}</p>
                        <hr>
                        @forelse($post->pictures as $pic)

                            <?php
                            $imageinfo = pathinfo(url('/storage/postimages/'.$pic->imgname));
                            //print_r($imageinfo);
                            ?>
                            <a href="{{url('/storage/postimages/'.$pic->imgname)}}" data-lightbox="imageset-{{$post->id}}">
                                <img src="{{url('/storage/postimages/'.$imageinfo['filename']."_thumb.".$imageinfo['extension'])}}" alt="" width="120px">
                            </a>

                        @empty

                        @endforelse
                    </div>
                    <div class="line-divider"></div>
                    <a href="javascript:void(0)" class="commentToggleBtn">{{$post->comments->count()}} comment{{($post->comments->count()>1)?"s":""}}</a>
                    <div class="commentContainer">
                    @forelse($post->comments as $usercomment)


                        <div class="post-comment">
                            <img src="{{asset('storage/profile/'.$usercomment->user_id.'_profile_thumb.jpg')}}" alt="" class="profile-photo-sm" />
                            <p>
                                <a href="timeline.html" class="profile-link">
                                    {{$usercomment->user->name }}</a>
                                <i class="em em-laughing"></i> {{$usercomment->comment}}</p>
                        </div>

                    @empty
                        <h3>No comments added yet</h3>
                    @endforelse
                    </div>
                    <div class="post-comment">
                        <img src="{{asset('storage/profile/'.Auth::id().'_profile_thumb.jpg')}}" alt="" class="profile-photo-sm" />
                        {!! Form::open([
                        'route' => ['post.comment',$post->id],
                        'class'=>'form-inline']) !!}
                        <div class="form-group">
                            <input type="text" name="postcomment" class="form-control" placeholder="Post a comment">
                            <button class="btn btn-primary form-control" type="submit" name="commentBtn">Comment</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

    @empty
        <h1>No posts available. Create a new one</h1>
    @endforelse
        {{ $posts->links() }}
    </div>

@endsection

@section('sidebar-right')
    <div class="suggestions" id="sticky-sidebar">
        <h4 class="grey">Friend Requests</h4>
        <hr>
@forelse($requests as $request)
            <div class="follow-user">
                <img src="{{asset('storage/profile/'.$request->user_id.'_profile_thumb.jpg')}}" alt="" class="profile-photo-sm pull-left" />
                <div>
                    <h6><a href="timeline.html">{{$request->user->name}}</a></h6>
                    <a class="confirmBtn text-green" data-uid="{{$request->user_id}}" href="javascript:void(0)">Confirm</a>
                    <a class="deleteBtn text-danger" data-uid="{{$request->user_id}}" href="javascript:void(0)">Delete</a>
                </div>
            </div>
    @empty
    <h5>No Friend Request</h5>
@endforelse
    </div>
@endsection

@section("script")
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('59b6d021bad0ce5968d7', {
            cluster: 'ap2',
            forceTLS: true
        });

        //var channel = pusher.subscribe('Lara-Social');
        //var channel = pusher.subscribe('Lara-Social');
        var channel = pusher.subscribe('user-{{Auth::id()}}');
            channel.bind('new-post', function(data) {
            //alert(data.message);
            if (data.type == "post") {

            var template = '<a href="{{url('post/')}}/'+data.pid+'" class="dropdown-item preview-item"><div class="preview-thumbnail"><div class="preview-icon bg-success"><i class="mdi mdi-alert-circle-outline mx-0"></i>\n' +
                '</div></div><div class="preview-item-content"><h6 class="preview-subject font-weight-medium text-dark">' + data.message + '</h6><p class="small-text text-success">\n' +
                'Just now</p></div></a><div class="dropdown-divider"></div>';
        }
        else if(data.type == "reaction"){
                var template = '<a class="dropdown-item preview-item"><div class="preview-thumbnail"><div class="preview-icon bg-success"><i class="mdi mdi-alert-circle-outline mx-0"></i>\n' +
                    '</div></div><div class="preview-item-content"><h6 class="preview-subject font-weight-medium text-dark">' + data.message + '</h6><p class="small-text text-success">\n' +
                    'Just now</p></div></a><div class="dropdown-divider"></div>';
            }
            $("#notificationDropdown span.count").text(
                parseInt($("#notificationDropdown span.count").text())
                +1);
            $("#noteItemContainer").prepend(template);
        });

    </script>
    <script>
        var storedFiles = [];
        $(document).ready(function(e){
        $(".commentContainer").hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //jscroll
            $("ul.pagination").hide();
            $('.scroll').jscroll({
                autoTrigger: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scroll',
                callback: function() {
                    $('ul.pagination:visible:first').hide();
                }
            });
            //jscroll

            /* WHEN YOU UPLOAD ONE OR MULTIPLE FILES */
            $(document).on('change','#post-images',function(){
                //$('.preview').html("");
                len_files = $("#post-images").prop("files").length;
                var construc = "<div class='row'>";
                for (var i = 0; i < len_files; i++) {
                    var file_data = $("#post-images").prop("files")[i];
                    storedFiles.push(file_data);
                    //console.log(file_data);
                    //form_data.append("photos[]", file_data);
                    //TODO: work on delete image btn in file upload
                    construc += '<div class="col-3 singleImage my-3"><span data-file="'+file_data.name+'" class="btn ' +
                     'btn-sm btn-danger imageremove">&times;</span><img width="120px" height="auto" src="' +  window.URL.createObjectURL(file_data) + '" alt="'  +  file_data.name  + '" /></div>';
                }
                construc += "</div>";
                $('.preview').append(construc);
            });

            $(".preview").on('click','span.imageremove',function(){
                //console.log($(this).next("img"));
                //console.log($(this).next("img"));
                var trash = $(this).data("file");
                for(var i=0;i<storedFiles.length;i++) {
                			if(storedFiles[i].name === trash) {
                				storedFiles.splice(i,1);
                				break;
                			}
                		}
                		$(this).parent().remove();

            })


            $("#publishpost").click(function(){
                if($("#contentpost").val() == ""){
                    alert("Add Some Text to post your status");
                    return;
                }
                var url = '{{URL::to('/')}}' +"/post";
                var form_data = new FormData();
                for(var i=0, len=storedFiles.length; i<len; i++) {
                			form_data.append('photos[]', storedFiles[i]);
                		}
                form_data.append("content", $("#contentpost").val());
                form_data.append("privacy", $("#privacy").val());
                //alert(url);
                $.ajax({
                    method: "POST",
                    url:url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:form_data
                }).done(function(data){
                    if(data.success){
                    //clear formdata and image files link
                    form_data = new FormData();
                    storedFiles=[];
                    //
                        alert(data.message);
                        //location.reload();
                        $('#postform').trigger("reset");
                        //location.reload();
                        $(".preview").html("");
                    }
                    //console.log(data);
                }).fail(function(data){
                    alert(data.message);
                });
            });
//confirn friend
            $(".confirmBtn").click(function(e){
                var t = $(this);
                e.preventDefault();
                var f = $(this).data('uid');
                var url = '{{URL::to('/')}}' +"/confirmfriend/"+f;
                $.ajax({
                    method: "POST",
                    url:url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data:{r:Math.random()}
                }).done(function(data){
                    //console.log(data);
                    //return;
                    if(data.success){
                        alert(data.message);
                        t.parent().parent().remove();
                        //location.reload();
                        //$('#postform').trigger("reset");
                        //$(".preview").html("");
                    }
                    //console.log(data);
                }).fail(function(data){
                    alert(data.message);
                });
            });
            //delete friend request

            //reaction start
$("#contentpostContainer").on("click",".reactionBtn",function () {
    var url = '{{URL::to('/')}}' +"/react";
    //alert(url);
    //$postid = $(this).data('postid');
    //$reactionid = $(this).data('reaction');
    //alert($postid + ":" + $reactionid);
    //ajax start
    $.ajax({
        method: "POST",
        url:url,
        // cache: false,
        // contentType: false,
        // processData: false,
        data:{
            'postid':$(this).data('postid'),
            'react':$(this).data('reaction'),
            r:Math.random()
        }
    }).done(function(data){
        console.log(data);
        //return;
        if(data.success){
            //alert(data.message);

            location.reload();
            //$('#postform').trigger("reset");
            //$(".preview").html("");
        }
        //console.log(data);
    }).fail(function(data){
        alert(data.message);
    });
    //ajax end
});
            //reaction end
            //comment container show hide start
            $("#contentpostContainer").on("click",".commentToggleBtn", function(){
                $(this).next(".commentContainer").toggle(300);
            });
            //comment container show hide end

        });
    </script>
@endsection
@push('style')

        .anothercss{ background-color: green;}

@endpush


