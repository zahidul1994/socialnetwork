@extends("layouts.blue")
@push('style')
        .mycss{ background-color: green;}
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
        <li><i class="icon ion-ios-people-outline"></i><div><a href="{{url('friends/'.Auth::id())}}">Friends</a></div></li>
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
            @if($friend->id != Auth::id())
                    <li class="list-inline-item"><a href="{{url('profile/'.$friend->id)}}" title="{{$friend->name}}"><img src="{{asset('storage/profile/'.$friend->id.'_icon.jpg')}}" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
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
    <!-- Friend List
            ================================================= -->
    <div class="friend-list">
        <h3>{{$friends->count()}} Friends</h3>
        <div class="row">
            @forelse($friends as $friend)
            <div class="col-md-6 col-sm-6">
                <div class="friend-card">
                    <img src="{{asset('storage/profile/'.$friend->id.'_cover.jpg')}}" alt="profile-cover" class="img-fluid cover" />
                    <div class="card-info">
                        <img src="{{asset('storage/profile/'.$friend->id.'_profile_thumb.jpg')}}" alt="user" class="profile-photo-lg" />
                        <div class="friend-info">
                            <a href="#" class="pull-right text-green">My Friend</a>
                            <h5><a href="{{url('profile/'.$friend->id)}}" class="profile-link">{{$friend->profile?$friend->profile->f_name.' '.$friend->profile->l_name :$friend->name}}</a></h5>
                            <p>{{$friend->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
                @empty
                <div class="col-md-12 col-sm-12">
                    <h3>No friends to show</h3>
                </div>
@endforelse
        </div>
    </div>
    <!-- Friend List End
      ================================================= -->

@endsection

@section('sidebar-right')

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
        var form_data = new FormData();
        $(document).ready(function(e){
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
                $('.preview').html("");
                len_files = $("#post-images").prop("files").length;
                var construc = "<div class='row'>";
                for (var i = 0; i < len_files; i++) {
                    var file_data = $("#post-images").prop("files")[i];
                    form_data.append("photos[]", file_data);
                    //TODO: work on delete image btn in file upload
                    construc += '<div class="col-3"><span class="btn btn-sm btn-danger imageremove">&times;</span><img width="120px" height="120px" src="' +  window.URL.createObjectURL(file_data) + '" alt="'  +  file_data.name  + '" /></div>';
                }
                construc += "</div>";
                $('.preview').append(construc);
            });

            $(".preview").on('click','span.imageremove',function(){
                console.log($(this).next("img"));
            })


            $("#publishpost").click(function(){
                var url = '{{URL::to('/')}}' +"/post";
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
                        //alert(data.message);
                        //location.reload();
                        //$('#postform').trigger("reset");
                        //$(".preview").html("");
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

        });
    </script>
@endsection
@push('style')

        .anothercss{ background-color: green;}

@endpush


