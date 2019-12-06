<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Picture;
use App\User;
use App\Friend;
use App\Custom\FriendsList;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $friendreq = Friend::with('user')
        ->where("friend_id",$id)->where('approved','0')->get();
        //dd($friendreq);

        $friends = Friend::with(['user','friendInfo'])
            ->where('approved','1')
            ->where('blocked','0')
            ->where("friend_id",$id)
            ->orWhere("user_id",$id)
        ->get();
        $friendsList = array($id);
        foreach($friends as $friend){
            if($friend->user_id == $id){
                $friendsList[] = $friend->friend_id;
            }
            else{
                $friendsList[] = $friend->user_id;
            }
        }
        //return "called";
        //dd($friends);
//        $friendsList = FriendsList::Friends($id);

        //dd($friendsList);
$allpost = Post::
with(['user','pictures','comments.user','reactions'])
    ->whereIn('user_id',$friendsList )
    ->whereIn('privacy',['public','friends'])
    ->orderBy('created_at','desc')
//	->skip(0)
//    ->take(10)
//    ->get();
    ->paginate(10);
//dd($allpost);
        //return view('home',compact('allpost'));
        return view('home')
            ->with('posts',$allpost)
            ->with('requests',$friendreq)
            ->with('friends',$friends);
    }
}
