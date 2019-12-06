<?php

namespace App\Http\Controllers;

use App\Custom\FriendsList;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
//       echo "you want to search: " . $request->search;
//        dd($request);
//$sentRequest = Friend::where('user_id',Auth::id())->pluck('friend_id')->toArray();
        $sentRequest = FriendsList::Friends(Auth::id());
        $searchResult = User::with('profile')
            ->where('name','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
            ->orderBy('name')
            ->get();
        //dd($searchResult);
        return view("search")
            ->with('users',$searchResult)
            ->with('req',$sentRequest);

    }
}
