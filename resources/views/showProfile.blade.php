<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Edit Profile | Edit Profile Page</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link href="{{asset('css/my_css.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}" />

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/fav.png')}}"/>
        <style>

            #showcpbtncontainer{
                position: absolute;
                top:100px;
                right: -10px;
                opacity: 0;
                transition: all 0.2s;
            }
            #showcpbtncontainer span{
                padding: 5px;
                border: 2px solid green;
                border-radius: 20%;
            }
            .timeline-cover:hover #showcpbtncontainer {
                opacity: 1;
                cursor: pointer;
            }
        </style>
	</head>
  <body>

  @include('partials.headermenu')

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">

        <div class="timeline-cover" style="background-image: url('{{asset('storage/profile/'.$user->id.'_cover.jpg')}}')">
            <div id="showcpbtncontainer">
                <span><i class="fa fa-expand text-dark"></i></span>
            </div>
          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <div class="profile-info">
                    <a href="{{asset('storage/profile/'.$user->id.'_profile.jpg')}}" data-lightbox="pp">
                  <img src="{{asset('storage/profile/'.$user->id.'_profile_thumb.jpg')}}" alt="" class="img-fluid profile-photo" />
                    </a>
                  <h3>{{$user->name}}</h3>
                  <p class="text-muted">Creative Director</p>
                </div>
              </div>
              <div class="col-md-9 col-sm-9">
                <ul class="list-inline profile-menu">
                  <li class="list-inline-item"><a href="timeline.html">Timeline</a></li>
                  <li class="list-inline-item"><a href="timeline-about.html" class="active">About</a></li>
                  <li class="list-inline-item"><a href="timeline-album.html">Album</a></li>
                  <li class="list-inline-item"><a href="timeline-friends.html">Friends</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li class="list-inline-item">1,299 people following her</li>
                  <li class="list-inline-item"><button type="button" id="add_friend" class="btn btn-primary">Add Friend</button></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
         <!--  <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="{{asset('images/profile_pic.jpg')}}" alt="" class="img-fluid profile-photo" />
              <h4>{{Auth::user()->name}}</h4>
              <p class="text-muted">Creative Director</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li class="list-inline-item"><a href="timline.html">Timeline</a></li>
                <li class="list-inline-item"><a href="timeline-about.html" class="active">About</a></li>
                <li class="list-inline-item"><a href="timeline-album.html">Album</a></li>
                <li class="list-inline-item"><a href="timeline-friends.html">Friends</a></li>
              </ul>
             <button type="button" id="add_friend" class="btn btn-primary">Add Friend</button>
            </div>
          </div> --><!--Timeline Menu for Small Screens End-->

        </div>

          <div id="cpmodal" class="modal fade" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <img class="img-fluid" id="modal_image_container" src="" alt="">
                      </div>
                  </div>
              </div>
          </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">

@include('partials.profilemenu')
            </div>
            <div class="col-md-7">

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <!-- tabs start-->
                    <h2>{{$user->name}} Profile</h2>
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#posts">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pinfo">Personal information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="posts" class="container tab-pane active"><br>
@forelse($user->posts as $userpost)
                                <div class="post-content postid-{{$userpost->id}}">
                                  <div class="post-container">
                                      <img src="{{asset('storage/profile/'.$user->id.'_profile_thumb.jpg')}}" alt="user" class="img-responsive profile-photo profPost a commentile-photo-md pull-left" />
                                      <div class="post-detail">
                                          <div class="user-info">
                                              <h5>
                                                  <a href="{{$user->id}}" class="profile-link">{{$user->profile?$user->profile->f_name.' '.$user->profile->l_name :$user->name}}</a>
                                                  <span class="following">following</span></h5>
                                              <p class="text-muted">Published a photo about 3 mins ago</p>
                                          </div>
<!-- reaction start -->
                    @php
                    $reactCount = [
                    'l'=>0,
                    'd'=>0,
                    'h'=>0,
                    's'=>0,
                    'reacted'=> false,
                    'type'=>"0"
                    ];
                    $totalReactions = $userpost->reactions->count();
                    foreach ($userpost->reactions as $reaction){
                    if($reaction->user_id == Auth::id()){
                    $reactCount['type'] = $reaction->type;
                    $reactCount['reacted'] = true;
                    }
                        //echo "<h3>".$reaction->type."</h3>";
                        $reactCount[$reaction->type]++;
                    }
                    $my_reaction = ($reactCount['reacted'])?"You and ":"";
                    echo "<span>".$my_reaction.$totalReactions." people reacted</span>";
                    //print_r($reactCount);
                    @endphp

                    <div class="reaction">
                        <h3>{{$reactCount['type']}}</h3>
                        <a data-postid="{{$userpost->id}}" data-reaction="l" class="btn text-{{($reactCount['type']==='l')?"primary":"secondary"}} reactionBtn"><i class="icon ion-thumbsup"></i> {{$reactCount['l']}}</a>
                        <a  data-postid="{{$userpost->id}}" data-reaction="d" class="btn text-{{($reactCount['type']==='d')?"danger":"secondary"}} reactionBtn"><i class="fa fa-thumbs-down"></i> {{$reactCount['d']}}</a>
                        <a data-postid="{{$userpost->id}}" data-reaction="h" class="btn text-{{($reactCount['type']==='h')?"success":"secondary"}} reactionBtn"><ion-icon name="heart"></ion-icon> {{$reactCount['h']}}</a>
                        <a data-postid="{{$userpost->id}}" data-reaction="s" class="btn text-{{($reactCount['type']==='s')?"success":"secondary"}} reactionBtn"><ion-icon name="happy"></ion-icon> {{$reactCount['s']}}</a>
                        @if($user->user_id == Auth::id())
                            {!!   Form::open([
'url' => 'post/'.$userpost->id,'method' => 'delete','class'=>'d-inline'
            ]) !!}
                            <button class="btn btn-danger fa fa-trash" onclick="return confirm('Are you sure you want to delete this post?');"></button>
                            {!!   Form::close() !!}
                        @endif
                    </div>
<!-- reaction end -->
                                          <div class="line-divider"></div>
                                          <div class="post-text">
                                              <p>{{$userpost->content}}</p>
                                              <hr>
                                              @forelse($userpost->pictures as $pic)
                                                  <?php
                                                  $imageinfo = pathinfo(url('/storage/postimages/'.$pic->imgname));
                                                  //print_r($imageinfo);
                                                  ?>
                                                  <a href="{{url('/storage/postimages/'.$pic->imgname)}}" data-lightbox="imageset-{{$user->id}}">
                                                      <img src="{{url('/storage/postimages/'.$imageinfo['filename']."_thumb.".$imageinfo['extension'])}}" alt="" width="120px">
                                                  </a>
                                              @empty
                                              @endforelse
                                          </div>
                                          <div class="line-divider"></div>
                                          @forelse($userpost->comments as $usercomment)
                                              <div class="post-comment">
                                                  <img src="{{asset('storage/profile/'.$usercomment->user->id.'_profile_thumb.jpg')}}" alt="" class="profile-photo-sm" />
                                                  <p>
                                                      <a href="{{$usercomment->user->id}}" class="profile-link">
                                                          {{$usercomment->user->name }}</a>
                                                      <i class="em em-laughing"></i> {{$usercomment->comment}}</p>
                                              </div>
                                          @empty
                                              <h3>No comments added yet</h3>
                                          @endforelse
                                          <div class="post-comment">
                                            <img src="{{asset('storage/profile/'.Auth::id().'_profile_thumb.jpg')}}" alt="" class="profile-photo-sm" />
                                            {!! Form::open([
                                            'route' => ['post.comment',$userpost->id],
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
                        </div>

<!-- parsonal info tab-2 -->
                        <div id="pinfo" class="container tab-pane fade"><br>
                          <div class="people-nearby">
                            <div class="nearby-user">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                      <td>Name</td><hr>
                                      <td>Email</td><hr>
                                      <td>Gender</td><hr>
                                      <td>Address</td><hr>
                                      <td>Date of Birth</td>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <td>{{$user->name}}</td><hr>
                                        <td>{{$user->email}}</td><hr>
                                        <td>{{($user->profile)?$user->profile->sex:"not set yet"}}</td><hr>
                                        <td>{{($user->profile)?$user->profile->city:"city not found"}}, {{($user->profile)?$user->profile->country:"country not found"}}</td><hr>
                                        <td>{{($user->profile)?$user->profile->dob:"not set yet"}}</td>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
            </div>
            <!-- tabs end -->
            </div>
            <div class="col-md-2 static">

              <!--Sticky Timeline Activity Sidebar-->
              <div id="sticky-sidebar">
                <h4 class="grey">Sarah's activity</h4>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                    <p class="text-muted">5 mins ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                    <p class="text-muted">an hour ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                    <p class="text-muted">4 hours ago</p>
                  </div>
                </div>
                <div class="feed-item">
                  <div class="live-activity">
                    <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                    <p class="text-muted">a day ago</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            <div class="col-md-3 col-sm-3">
              <a href=""><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
              <ul class="list-inline social-icons">
              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For individuals</h5>
              <ul class="footer-links">
                <li><a href="">Signup</a></li>
                <li><a href="">login</a></li>
                <li><a href="">Explore</a></li>
                <li><a href="">Finder app</a></li>
                <li><a href="">Features</a></li>
                <li><a href="">Language settings</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For businesses</h5>
              <ul class="footer-links">
                <li><a href="">Business signup</a></li>
                <li><a href="">Business login</a></li>
                <li><a href="">Benefits</a></li>
                <li><a href="">Resources</a></li>
                <li><a href="">Advertise</a></li>
                <li><a href="">Setup</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>About</h5>
              <ul class="footer-links">
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms</a></li>
                <li><a href="">Help</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h5>Contact Us</h5>
              <ul class="contact">
                <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
              </ul>
            </div>
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>Thunder Team © 2016. All rights reserved</p>
      </div>
		</footer>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky-kit.min.js')}}"></script>
<script src="{{asset('js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/lightbox.min.js')}}"></script>
<script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
  <script>
      $(document).ready(function(){

         $("#showcpbtncontainer").click(function(){
             var url = $(".timeline-cover").css('background-image');
             var start_quot = url.indexOf("\"") + 1;
             var end_quot = url.lastIndexOf("\"");
             url = url.substring(start_quot,end_quot);
             $("#modal_image_container").attr("src",url);
             $('#cpmodal').modal();
         });

    $("#contentpostContainer").on("click",".reactionBtn",function () {
        var url = '{{URL::to('/')}}' +"/react";
        alert(url);
        //$postid = $(this).data('postid');
        //$reactionid = $(this).data('reaction');
        //alert($postid + ":" + $reactionid);
        //ajax start
        $.ajax({
            method: "POST",
            url:url,
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
});
  </script>
  </body>
</html>
