<?php

namespace App\Http\Controllers;

use App\Custom\FriendsList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public  function add($id){
       if(!Friend::where('user_id',Auth::id())
       ->where('friend_id',$id)
       ->count() && !Friend::where('friend_id',Auth::id())
               ->where('user_id',$id)
               ->count()){
           $newF = new Friend();
           $newF->user_id = Auth::id();
           $newF->friend_id = $id;
           $newF->save();
           if($newF->id){
               return response()->json(['success'=>'true','message'=>'request sent']);
           }
           else{
               return response()->json(['success'=>'false','message'=>'Problem']);
           }

       }
       else{
           return response()->json(['success'=>'false','message'=>'Already Sent']);
       }

        //return response("hi ".$id);
//return response.json(['success'=>'true','message'=>'request sent']);
    }
    public function confirm($id){
        $f = Friend::where('user_id',$id)
            ->where('friend_id',Auth::id())
            ->where('approved','0')
            ->where('blocked','0')
            ->update(['approved'=>'1']);

        if($f){


                return response()->json(['success'=>'true','message'=>'You are Now Friends.']);
            }
            else{
                return response()->json(['success'=>'false','message'=>'Problem']);

        }
    }

    public function showFriends($id){
        $allFriends = FriendsList::Friends($id);
      $friends = User::with('profile')
            ->whereIn('id',$allFriends)
            ->get();
        //dd($friends);
        return view('friendlist')->with('friends', $friends);
    }
}
