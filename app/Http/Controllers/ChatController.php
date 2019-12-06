<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\Chat;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Custom\FriendsList;
use Pusher\Pusher;
use App\Custom\Push;


class ChatController extends Controller
{
    private $p;
    public function __construct()
		{
		  $this->middleware('auth');
            $this->p = Push::newPush();
		}

		/**
		 * Show chats
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$friends = FriendsList::Friends(Auth::id());

			$users = User::with(['profile'])->whereIn('id',$friends)->get();
			//dd($users);
		  return view('chat')->with('users',$users);
		}

		/**
		 * Fetch all messages
		 *
		 * @return Message
		 */
		public function chatHistory(Request $request)
		{
            $first = DB::table('chats')
                ->where('user_id',Auth::id())
                ->where('friends_id',$request->id);

            $allChats = DB::table('chats')
                ->where('friends_id',Auth::id())
                ->where('user_id',$request->id)
                ->union($first)
                ->orderBy('created_at','desc')
                ->limit(10)
                ->get();
            $allChats = $allChats->reverse()->values();
		    return response()->json($allChats);
		}
		public function sendMessage(Request $request)
		{
		  $user = Auth::user();

		  $message = $user->chats()->create([
			'message' => $request->input('m'),
			'friends_id' => $request->input('fid')
		  ]);
            $data['chatmessage'] = $request->input('m');
            $data['type'] = 'message';
            $data['pid'] = $message->id;
            $data['mtime'] = $message->created_at;
            $data['user_id'] = Auth::id();
            $data['user_name'] = $user->name;

            $this->p->trigger('user-' . $request->input('fid'), 'new-post', $data);
            $this->p->trigger('user-' . Auth::id(), 'new-post', $data);

		  return response()->json(['status' => 'Message Sent!','mid'=>$message->id]);
		}
}
