<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}-Search Result</title>
{{--<title>{{ config('app.name', 'Laravel') }} {{env('APP_URL')}}</title>--}}


<!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}" />
    <link href="{{asset('css/emoji.css')}}" rel="stylesheet">
    <style>
        #contentpost{
            width: 100%;
            height: 100px;
        }

    </style>

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/fav.png')}}"/>
</head>
<body>

@include('partials.headermenu')

<div id="page-contents" class="mt-5">
    <div class="container">
        <div class="row">

            <!-- Newsfeed Common Side Bar Left
            ================================================= -->
            <div class="col-md-3">
                <div class="profile-card">
                    <img src="http://placehold.it/300x300" alt="user" class="profile-photo" />
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
            </div>

            <div class="col-md-7">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="errorcontainer">
                        <h3>{{ $message }}</h3>
                    </div>
                @endif
<!-- tabs start-->
                    <h2>Toggleable Tabs</h2>
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">People</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <h3>People Search Results</h3>
                            <div class="people-nearby">
@forelse($users as $user)
                                    <div class="nearby-user">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <img src="{{asset('storage/profile/'.$user->id.'_profile_thumb.jpg')}}" alt="user" class="profile-photo-lg" />
                                            </div>
                                            <div class="col-md-7 col-sm-7">
                                                <h5><a href="#" class="profile-link">{{$user->profile?$user->profile->f_name.' '.$user->profile->l_name :$user->name}}</a></h5>
                                                <p>Software Engineer</p>
                                                <p class="text-muted">500m away</p>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                @if(in_array($user->id,$req))
                                                    <span class="pull-right" >Friends</span>
                                                    @else
                                                    <button class="btn btn-primary pull-right addFrndBtn" data-uid="{{$user->id}}">Add Friend</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    @empty
    @endforelse


                            </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
<!-- tabs end -->

            </div>

            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
            <div class="col-md-2">
                <div class="suggestions" id="sticky-sidebar">
                    <h4 class="grey">Who to Follow</h4>
                    <div class="follow-user">
                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h6><a href="timeline.html">Diana Amber</a></h6>
                            <a href="#" class="text-green">Add friend</a>
                        </div>
                    </div>
                    <div class="follow-user">
                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h6><a href="timeline.html">Cris Haris</a></h6>
                            <a href="#" class="text-green">Add friend</a>
                        </div>
                    </div>
                    <div class="follow-user">
                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h6><a href="timeline.html">Brian Walton</a></h6>
                            <a href="#" class="text-green">Add friend</a>
                        </div>
                    </div>
                    <div class="follow-user">
                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h6><a href="timeline.html">Olivia Steward</a></h6>
                            <a href="#" class="text-green">Add friend</a>
                        </div>
                    </div>
                    <div class="follow-user">
                        <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h6><a href="timeline.html">Sophia Page</a></h6>
                            <a href="#" class="text-green">Add friend</a>
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
       $(document).ready(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$("#home").on("click",".addFrndBtn",function(){

    var url = '{{URL::to('/')}}' +"/addfriend/"+$(this).data('uid');
    alert(url);
    $.ajax({
        method: "POST",
        url:url,
        cache: false,
        data:{r:Math.random()}

    }).done(function(data){
        console.log(data);
        if(data.success){
            alert(data.message);
            //location.reload();
            //$('#postform').trigger("reset");
            //$(".preview").html("");
        }
        //console.log(data);
    }).fail(function(data){
        console.log(data);
        alert(data.message);
    });
});


    });
</script>
</body>
</html>
