@extends('layouts.chatbox')
@section('content')
<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
            <div class="inbox_chat">
                @forelse($users as $user)
                    @if($user->id !== Auth::id())
                    <div class="chat_list" data-userid="{{$user->id}}">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="{{asset('storage/profile/'.$user->id.'_profile_thumb.jpg')}}" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>{{$user->name}} <span class="chat_date">Dec 25</span></h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                        @endif
                @empty
                @endforelse

            </div>
        </div>
        <div class="mesgs">
          <div class="msg_history" id="msg_history_container">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            {{--<div class="incoming_msg">--}}
              {{--<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
              {{--<div class="received_msg">--}}
                {{--<div class="received_withd_msg">--}}
                  {{--<p>Test, which is a new approach to have</p>--}}
                  {{--<span class="time_date"> 11:01 AM    |    Yesterday</span></div>--}}
              {{--</div>--}}
            {{--</div>--}}
            {{--<div class="outgoing_msg">--}}
              {{--<div class="sent_msg">--}}
                {{--<p>Apollo University, Delhi, India Test</p>--}}
                {{--<span class="time_date"> 11:01 AM    |    Today</span> </div>--}}
            {{--</div>--}}
            {{--<div class="incoming_msg">--}}
              {{--<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
              {{--<div class="received_msg">--}}
                {{--<div class="received_withd_msg">--}}
                  {{--<p>We work directly with our designers and suppliers,--}}
                    {{--and sell direct to you, which means quality, exclusive--}}
                    {{--products, at a price anyone can afford.</p>--}}
                  {{--<span class="time_date"> 11:01 AM    |    Today</span></div>--}}
              {{--</div>--}}
            {{--</div>--}}
          </div>
          <div class="type_msg">



            <div class="input_msg_write">
              <input type="text" fid="0" id="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>

          </div>
        </div>
      </div>


      {{--<p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>--}}

    </div></div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var baseurl = '{{URL::to('/')}}' +"/";
            //listen pusher start
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
            var pusher = new Pusher('59b6d021bad0ce5968d7', {
                cluster: 'ap2',
                forceTLS: true
            });
            var channel = pusher.subscribe('user-{{Auth::id()}}');
            channel.bind('new-post', function(data) {
//console.log(data);
$m = data.message;
//http://localhost/socialnetwork/public/storage/profile/2_profile_thumb.jpg
if(data.type == "message"){
    //console.log(data.mtime);
    if(data.user_id == $("#write_msg").attr('fid') || data.user_id == '{{Auth::id()}}') {
        if (data.user_id == '{{Auth::id()}}') {
            var template = '<div class="outgoing_msg"><div class="sent_msg"><p>' + data.chatmessage + '</p><span class="time_date">' + data.mtime.date + '(' + data.mtime.timezone + ')' + '</span></div></div>';
        }
        else {
            var template = '<div class="incoming_msg"><div class="incoming_msg_img"><img src="' + baseurl + 'storage/profile/' + data.user_id + '_profile_thumb.jpg' + '" alt="' + data.user_name + '"></div><div class="received_msg"><div class="received_withd_msg"><p>' + data.chatmessage + '</p><span class="time_date">' + data.mtime.date + '(' + data.mtime.timezone + ')' + '</span></div></div></div>';

        }
        $("#msg_history_container").append(template);
    }
    else {
        $(".chat_list[data-userid='"+data.user_id+"']").find('p').html(data.chatmessage).addClass('text-danger');
//notification start
        if(data.type == "message" && data.user_id !== '{{Auth::id()}}'){
            var template = '<a class="dropdown-item preview-item"><div class="preview-thumbnail"><div class="preview-icon bg-success"><i class="mdi mdi-alert-circle-outline mx-0"></i>\n' +
                '</div></div><div class="preview-item-content"><h6 class="preview-subject font-weight-medium text-dark">New Message From ' + data.user_name + '</h6><p class="small-text text-success">'+data.mtime.date+'(utc)</p></div></a><div class="dropdown-divider"></div>';
            $("#notificationDropdown span.count").text(
                parseInt($("#notificationDropdown span.count").text())
                +1).addClass('text-danger');
            $("#noteItemContainer").prepend(template);
        }

//notification end
    }
}
            });
            //listen pusher end

            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //ajax setup

//select user
            $(".inbox_chat").on("click",".chat_list",function(){
                $s = $(this);
                if($('.chat_list').hasClass('active_chat')){
                    $('.chat_list').removeClass('active_chat');
                }
                $s.addClass('active_chat');
                $s.find('p').html('');
                $withUser = $s.data('userid');
                //alert($withUser);
                $("#write_msg").attr('fid',$withUser);
                //ajax start
                var url = '{{URL::to('/')}}' +"/chathistory";
                $.ajax({
                    method: "POST",
                    url:url,
                    // cache: false,
                    // contentType: false,
                    // processData: false,
                    data:{
                        id:$withUser
                    }
                }).done(function(data){
                    //console.log(data);
                    if(data.length) {
                        showMessages(data);
                    }
                    else{
                        $("#msg_history_container").html("");
                    }
                }).fail(function(data){
                    alert(data);
                });
                //ajax end
            });
//select user
            //send chat
            $("#write_msg").keypress(function (e) {
                if(e.which == '13' && $(this).val() != ""){
                    if($(this).attr('fid') == '0'){
                        alert("select a friend first");
                        return;
                    }
                    //alert("send " + $(this).val());
                    //ajax start
                    var url = '{{URL::to('/')}}' +"/sendchat";
                    $.ajax({
                        method: "POST",
                        url:url,
                        // cache: false,
                        // contentType: false,
                        // processData: false,
                        data:{
                            fid:$(this).attr('fid'),
                           m:$(this).val()
                        }
                    }).done(function(data){
                        $("#write_msg").val("");
                        //console.log(data);
                        // if(data.status){
                        //     //alert(data.message);
                        //     //location.reload();
                        //     //$('#postform').trigger("reset");
                        //     //$(".preview").html("");
                        // }
                        //console.log(data);
                    }).fail(function(data){
                        alert(data.message);
                    });
                    //ajax end
                }
            });
            //send chat end
//function: showMessages start
            function showMessages(data){
                $t = "";
                if(!data.length) {
                    $t = "<h3>No Message To Show</h3>";
                }
                else {
                    for(var d in data){
                        console.log(data[d]);
                    if (data[d].user_id == '{{Auth::id()}}') {
                        $t += '<div class="outgoing_msg"><div class="sent_msg"><p>' + data[d].message + '</p><span class="time_date">' + data[d].created_at + '(UTC)' + '</span></div></div>';
                    }
                    else {
                        $t += '<div class="incoming_msg"><div class="incoming_msg_img"><img src="' + baseurl + 'storage/profile/' + data[d].user_id + '_profile_thumb.jpg' + '" alt="' + data[d].user_id + '"></div><div class="received_msg"><div class="received_withd_msg"><p>' + data[d].message + '</p><span class="time_date">' + data[d].created_at + '(UTC)' + '</span></div></div></div>';
                    }
                    }
                    $("#msg_history_container").html($t);
                }
            }
//function: showMessages end
        });
    </script>

    @endsection
