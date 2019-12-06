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

        <div class="timeline-cover" style="background-image: url('{{asset('storage/profile/'.Auth::id().'_cover.jpg')}}')">
            <div id="showcpbtncontainer">
                <span><i class="fa fa-expand text-dark"></i></span>
            </div>
          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <div class="profile-info">
                    <a href="{{asset('storage/profile/'.Auth::id().'_profile.jpg')}}" data-lightbox="pp">
                  <img src="{{asset('storage/profile/'.Auth::id().'_profile_thumb.jpg')}}" alt="" class="img-fluid profile-photo" />
                    </a>
                  <h3>{{Auth::user()->name}}</h3>
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
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
                  <div class="line"></div>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                  <div class="line"></div>
                </div>
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success" id="errorcontainer">
                          <h3>{{ $message }}</h3>
                      </div>
                  @endif
                <div class="edit-block">
                    {{--{{"info: " .$user->profile}}--}}
                    {!! Form::open([
                    'url' => 'profile',
                    'files'=>true,
                    'class'=>'form-inline']) !!}
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="firstname">First name</label>
                        <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name"
                               @if($user->profile)
                               value="{{$user->profile->f_name}}"
                        @endif
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lastname" class="">Last name</label>
                        <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name"
                               @if($user->profile)
                               value="{{$user->profile->l_name}}"
                            @endif
                        />
                      </div>


                      <div class="form-group col-md-12">
                        <label for="email">My email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="My Email"
                               @if($user->profile)
                               value="{{$user->profile->u_mail}}"
                            @endif
                        />
                      </div>

                    <div class="form-group col-md-6 gender">
                      <span class="custom-label pt-1"> Sex</span>
                      <label class="radio-inline pr-1">
                        <input type="radio" value="m" name="sex"
                               @if($user->profile)
                               @if($user->profile->sex == "m")
                               checked
                                @endif
                                @endif
                          /> Male
                      </label>
                      <label class="radio-inline pr-1">
                        <input type="radio" value="f" name="sex">
                          @if($user->profile)
                          @if($user->profile->sex == "f")
                              checked
                          @endif
                          @endif
                          Female
                      </label>
                        <label class="radio-inline">
                            <input type="radio" value="o" name="sex">
                            @if($user->profile)
                            @if($user->profile->sex == "o")
                                checked
                            @endif
                            @endif
                            Other
                        </label>
                    </div>
                      <div class="form-group col-md-6">
                        <label for="dob">Date of birth</label>
                        <input id="dob" class="form-control input-group-lg" type="date" name="dob" title="Enter Dob" placeholder="My Dob"
                               @if($user->profile)
                               value="{{$user->profile->dob}}"
                            @endif
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="city"> My city</label>
                        <input id="city" class="form-control input-group-lg" type="text" name="city" title="Enter city" placeholder="Your city"
                               @if($user->profile)
                               value="{{$user->profile->city}}"
                            @endif
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="country">My country</label>
                          @if($user->profile)
                              {{Form::select('country', $country,$user->profile->country,['class'=>'form-control'] )}}
                              @else
                              {{Form::select('country', $country,null,['class'=>'form-control'])}}
                          @endif

                      </div>
                      <div class="row">
                      <div class="form-group col-md-12">
                        <label for="my-info">About me</label>
                        <textarea id="my-info" name="information" class="form-control" placeholder="Some texts about me" rows="4" cols="400">
                            @if($user->profile)

                            @endif
                        </textarea>
                      </div>
                          <div class="form-group col-md-12">
                              <label for="my-info">Profile picture</label>
                              <input type="file" name="ppic" class="form-control">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="my-info">Cover picture</label>
                              <input type="file" name="cpic" class="form-control">
                          </div>
                      </div>
                    <button type="submit" id="save_basic" class="btn btn-primary">Save Changes</button></div>
                    {!! Form::close() !!}
                </div>
              </div>
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
      });

  </script>
  </body>
</html>
