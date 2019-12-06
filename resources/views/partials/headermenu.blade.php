<!-- Header
================================================= -->
<div class="container-fluid">
    <div class="fixed-top">
        <div class="row bg-info " style="background-color: #e3f2fd;">
            <div class="col-md-2">
                <img class="mt-2" src="{{asset('images/logo.png')}}" alt="logo" style="width: 210px;" />
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <nav class="navbar  navbar-expand-lg navbar-light bg-info">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{--<form class="form-inline my-2 my-lg-0">--}}
                            {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}

                        {{--</form>--}}
                        {!!   Form::open([
'url' => 'search','method' => 'get','class'=>'form-inline my-2 my-lg-0'
                    ]) !!}
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                        {{--<button class="btn btn-danger fa fa-search"></button>--}}
                        {!!   Form::close() !!}


                        <ul class="navbar-nav justify-content-end" id="nav_design">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/home')}}">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                                <a title="Profile" class="nav-link" href="{{url('/profile/'.Auth::id().'')}}">{{Auth::user()->name}}<span class="sr-only">(current)</span></a>
                            </li>
							<li class="nav-item ">
                                <a title="Chat With Friends" class="nav-link" href="{{url('/chat')}}"> <i class="fas fa-comments"></i> <span class="sr-only">(chat)</span></a>
                            </li>
                            {{--<li class="nav-item ">--}}
                                {{--<a class="fa fa-user-plus nav-link nav_icon" id="note-user">--}}
                                    {{--<span class="num"><span class="fa fa-comment"></span>5</span>--}}

                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                                {{--<a class="fa fa-envelope nav-link nav_icon" id="note-mess">--}}
                                    {{--<span class="num">5</span>--}}

                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                                {{--<a class="fa fa-bell nav-link nav_icon" id="note-bell">--}}
                                    {{--<span class="num">5</span>--}}
                                    {{--<div class="modal fade" id="myyModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                                        {{--<div class="modal-dialog" role="document">--}}

                                            {{--<!-- Modal content-->--}}
                                            {{--<div class="modal-content">--}}
                                                {{--<div class="modal-header">--}}
                                                    {{--<h4 class="modal-title" id="exampleModalLabel">Notifications</h4>--}}
                                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                        {{--<span aria-hidden="true">&times;</span>--}}
                                                    {{--</button>--}}
                                                {{--</div>--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--<p>Some notifications.</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                                {{--<a class="nav-link" href="#" title="Friend requests"><ion-icon name="person-add" class="nav_icon"></ion-icon><span class="sr-only">(current)</span></a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                                {{--<a class="nav-link" href="#" title="Messages"><ion-icon name="mail" class="nav_icon"></ion-icon><span class="sr-only">(current)</span></a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item ">--}}
                                {{--<a class="nav-link" href="#" title="Notifications"><ion-icon name="notifications" class="nav_icon"></ion-icon><span class="sr-only">(current)</span></a>--}}
                            {{--</li>--}}
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                    <i class="fa fa-bell"></i>
                                    <span class="count">0</span>
                                </a>
                                <div id="notificationContainer" class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                    <a class="dropdown-item">
                                        <p class="mb-0 font-weight-normal float-left text-info">You have <span id="notecount">0</span> new notifications
                                        </p>
                                        <span class="badge badge-pill badge-warning float-right">Mark all as Read</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <div id="noteItemContainer">

                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </a>
                                <div class="dropdown-menu" id="drop_menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('activity')}}">Activity</a>
                                    <a class="dropdown-item" href="{{url('/profile')}}">Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>

                    </div>
                </nav>

            </div>
        </div>
    </div>
</div>

<!--Header End-->
