<?php
/**
 * Created by PhpStorm.
 * User: Lab-2
 * Date: 9/22/2018
 * Time: 12:46 PM
 */

namespace App\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\User;
use DB;

class FriendsList
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public static function Friends($id){
        $friends1 = DB::table('friends')
            ->where('user_id',$id)
            ->where('approved','1')
            ->where('blocked','0')
            ->get();
        $friends2 = DB::table('friends')
            ->where('friend_id',$id)
            ->where('approved','1')
            ->where('blocked','0')
            ->get();
        $allFriends = $friends1->merge($friends2);
        $friendsList = array((int)$id);
        foreach($allFriends as $friend){
            if($friend->user_id == $id){
                $friendsList[] = $friend->friend_id;
            }
            else{
                $friendsList[] = $friend->user_id;
            }
        }
        return $friendsList;
    }
    public static function FList($id){
        $friends1 = DB::table('friends')
            ->where('user_id',$id)
            ->where('approved','1')
            ->where('blocked','0')
            ->get();
        $friends2 = DB::table('friends')
            ->where('friend_id',$id)
            ->where('approved','1')
            ->where('blocked','0')
            ->get();
        $allFriends = $friends1->merge($friends2);
        $friendsList = array((int)$id);
        foreach($allFriends as $friend){
            if($friend->user_id == $id){
                $friendsList[] = $friend->friend_id;
            }
            else{
                $friendsList[] = $friend->user_id;
            }
        }
        return $friendsList;

        /*$friends1 = DB::table('friends')
            ->where('user_id',$id)
            ->where('approved','1')
            ->where('blocked','0');
        $friends2 = DB::table('friends')
            ->where('friend_id',$id)
            ->where('approved','1')
            ->where('blocked','0');
        if($friends1->count()){
             if($friends2->count()){
                $all = $friends2
                    ->union($friends1)->get();
            }
            else{
                $all = $friends1->get();
            }
        }
        else{
           $all = $friends2->get();
        }
        dd($all);*/

    }
}
