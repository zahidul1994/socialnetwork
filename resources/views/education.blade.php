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
    <link href="{{asset('css/my_css.css')}}" rel="stylesheet"

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/fav.png')}}"/>
	</head>
  <body>

  @include('partials.headermenu')

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover" style="background-image: url('{{asset('storage/profile/'.Auth::id().'_cover.jpg')}}')">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <div class="profile-info">
                  <img src="{{asset('storage/profile/'.$user->id.'_profile_thumb.jpg')}}" alt="" class="img-fluid profile-photo" />
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


        </div>
        <div id="page-contents">
          <div class="row">
            <div class="col-md-3">

                @include('partials.profilemenu')
            </div>
            <div class="col-md-7">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="errorcontainer">
                        <h3>{{ $message }}</h3>
                    </div>
            @endif
              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                  <h4 class="grey d-inline"><i class="icon ion-android-checkmark-circle"></i>My education</h4>
                    @if($user->id == Auth::id())
                    <button class="btn btn-primary pull-right" id="edu_toggle_btn">+</button>
                  <div class="line"></div>
@endif
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                  <div class="line"></div>
                </div>
                  @if($user->id == Auth::id())
                  <div id="edu_form_container">
                      <div class="edit-block">
                          {!! Form::open([
                          'url' => 'education',
                          'class'=>'form-inline']) !!}

                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="school">My Institute</label>
                                  <input id="school" class="form-control " type="text" name="institute" title="Enter Institute" placeholder="My Institute"/>
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="date-from">Session</label>
                                  <input id="date-from" class="form-control" type="text" name="sess" title="Enter a Date" placeholder="year-year" value="2006-2010" />
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="level">Level</label>
                                  {{--<input id="date-from" class="form-control" type="text" name="major" title="Major Group" placeholder="Science"/>--}}
                                  {{Form::select('level', [
      'ssc'=>'SSC',
      'dakhil'=>'dakhil',
      'olevel'=>'O level',
      'hsc'=>'HSC',
      'alim'=>'Alim',
      'alevel'=>'A level',
      'hons'=>'honours',
      'fazil'=>'Fazil',
      'masters'=>'Masters',
      'kamil'=>'Kamil',
      'phd'=>'PHD',
      'diploma'=>'diploma',
      'postdiploma'=>'Post diploma',
      'other'=>'Other'
      ], null, ['id'=>'level','class'=>'form-control','placeholder' => 'Pick a size...'])}}
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="major">Major</label>
                                  <input id="major" class="form-control" type="text" name="major" title="Major Group" placeholder="Science"/>
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="edu-description">Description</label>
                                  <textarea id="edu-description" name="description" class="form-control" placeholder="Some texts about my education" rows="4" cols="70"></textarea>
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-md-12">
                                  <label for="graduate">Graduated? </label>
                                  <input id="graduate" type="checkbox" name="graduate" value="graduate" checked>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                          {!! Form::close() !!}
                      </div>
                  </div>
                  @endif
                  <div class="line"></div>
                  <div id="edu_info_container">
                      <table class="table table-responsive">
                          <tr>
                          <th>#</th>
                          <th>Instutute</th>
                          <th>Session</th>
                          <th>Level</th>
                          <th>Major</th>
                          <th>Desc</th>
                              @if($user->id == Auth::id())
                          <th>Action</th>
                                  @endif
                          </tr>

                      @forelse($user->education as $education)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$education->institute}}</td>
    <td>{{$education->sess}}</td>
    <td>{{$education->level}}</td>
    <td>{{$education->major}}</td>
    <td>{{$education->description}}</td>
    @if($user->id == Auth::id())
    <td><a href="#"><span class="fa fa-edit"></span></a>
        <a href="#"><span class="fa fa-trash"></span></a>
    </td>
        @endif
</tr>
                          @empty
                          <tr><td colspan="7"><h3>no info found. Add some education info</h3></td></tr>

                          @endforelse
                      </table>
                  </div>

			    <div class="block-title">
                  <h4 class="grey d-inline"><i class="icon ion-ios-briefcase-outline"></i>Work Experiences</h4>
				  <button class="btn btn-primary pull-right" id="work_toggle_btn">+</button>

                  <div class="line"></div>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                </div>
                <div class="line"></div>
				<div id="work_form_container">
                <div class="edit-block">
                    {!! Form::open([
                    'url' => 'work',
                    'files'=>true,
                    'class'=>'form-inline']) !!}
					  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="company">Company</label>
                        <input id="company" class="form-control input-group-lg" type="text" name="company" title="Enter Company" placeholder="Company name" value="Envato Inc" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="designation">Designation</label>
                        <input id="designation" class="form-control input-group-lg" type="text" name="designation" title="Enter designation" placeholder="designation name" value="Exclusive Author" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="from-date">From</label>
                        <input id="from-date" class="form-control input-group-lg" type="date" name="workfrom" title="Enter a Date" placeholder="from" value="2016" />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="to-date" class="">To</label>
                        <input id="to-date" class="form-control input-group-lg" type="date" name="workto" title="Enter a Date" placeholder="to" value="2018" />
                      </div>
                    </div>
					<div class="form-group col-md-12">
                           <label for="working">Working? </label>
                           <input id="working"  class="ml-3" type="checkbox" name="working" value="working" checked>
                           </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="work-city">City/Town</label>
                        <input id="work-city" class="form-control input-group-lg" type="text" name="city" title="Enter city" placeholder="Your city" value="Melbourne"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="work-description">Description</label>
                        <textarea id="work-description" name="description" class="form-control" placeholder="Some texts about my work" rows="4" cols="70">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</textarea>
                      </div>
                    </div>
                    <button class="btn btn-primary">Save Changes</button>
			         {!! Form::close() !!}
                </div>
				 </div>


				 <div class="line"></div>
                  <div id="work_info_container">
                      <table class="table table-responsive">
                          <tr>
                          <th>#</th>
                          <th style="width: 40%">Information</th>
                          <th>Description</th>
                          <th>Action</th>
                          </tr>

                      @forelse($user->works as $work)
<tr>
    <td>{{$loop->iteration}}</td>
    <td><ul>
            <li>Company: {{$work->company}}</li>
            <li>Designation: {{$work->designation}}</li>
            <li>Workfrom: {{$work->workfrom}}</li>
            <li>Workto: {{$work->workto}}</li>
            <li>City: {{$work->city}}</li>
        </ul></td>
    <td>{{$work->description}}</td>

    <td><a href="#"><span class="fa fa-edit"></span></a>
        <a href="#"><span class="fa fa-trash"></span></a>
    </td>
</tr>
                          @empty
                          <tr><td colspan="7"><h3>no info found. Add some education info</h3></td></tr>

                          @endforelse
                      </table>
                  </div>
                </div>
            </div><!-- end of col-md-7-->


            <div class="col-md-2 static">

              <!--Sticky Timeline Activity Sidebar-->
              <div id="sticky-sidebar">
                <h4 class="grey">Sarahs activity</h4>
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
                    <p><a href="#" class="profile-link">Sarah</a> Liked her friends post</p>
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
<script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
  @if($user->id == Auth::id())
  <script>
      $(document).ready(function(){
          $("#edu_form_container").hide();
          $("#edu_toggle_btn").click(function(){
              $("#edu_form_container").toggle(200);
          });
		  $("#work_form_container").hide();
          $("#work_toggle_btn").click(function(){
              $("#work_form_container").toggle(200);
          });
      });

  </script>
      @endif
  </body>
</html>
