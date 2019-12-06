<!--Edit Profile Menu-->
<ul class="edit-menu">
    <li>{{Route::current()->uri}}</li>
    <li class='{{Route::current()->uri == 'profile/{profile}'?'active':''}}'><i class="icon ion-ios-information-outline"></i><a href="{{url('profile/'.$user->id)}}">Basic Information</a></li>
    <li class='{{Route::current()->uri == 'education/{education}'?'active':''}}'><i class="icon ion-ios-briefcase-outline"></i><a href="{{url('education/'.$user->id)}}">Education and Work</a></li>
    <li class='{{Route::current()->uri == 'interest/{interest}'?'active':''}}'><i class="icon ion-ios-heart-outline"></i><a href="{{url('interest/'.$user->id)}}">My Interests</a></li>
    <li><i class="icon ion-ios-settings"></i><a href="edit-profile-settings.html">Account Settings</a></li>
    <li><i class="icon ion-ios-locked-outline"></i><a href="edit-profile-password.html">Change Password</a></li>
</ul>
