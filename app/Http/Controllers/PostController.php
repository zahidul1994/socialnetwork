<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Custom\FriendsList;
use App\Post;
use App\Picture;
use App\Reaction;
use App\Friend;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Pusher\Pusher;
//use Illuminate\Http\Response;
// import the Intervention Image Manager Class
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    private $p;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $this->p = new Pusher(
            '59b6d021bad0ce5968d7',
            'e77ee1c084c1de44e119',
            '603747',
            $options
        );
        $this->middleware('auth');
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        // configure with favored image driver (gd by default)
        //Image::configure(array('driver' => 'imagick'));
        $this->validate($request, [
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:8000'
        ]);
        $newPost = new Post();
        $newPost->content = $request->content;
        $newPost->privacy = $request->privacy;
        $newPost->user_id = Auth::id();
        $newPost->save();
        if($newPost->id) {
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $image) {
                    $rand = mt_rand(100000, 999999);
                    $name = time() . "_" . Auth::id() . "_" . $rand . "." . $image->getClientOriginalExtension();
                    $name_thumb = time() . "_" . Auth::id() . "_" . $rand . "_thumb." . $image->getClientOriginalExtension();
                    //move image to postimages folder
                    $image->move(public_path() . '/storage/postimages/', $name);
                    $resizedImage = Image::make(public_path() . '/storage/postimages/' . $name)->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $resizedImage_thumb = Image::make(public_path() . '/storage/postimages/' . $name)->resize(120, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    // save file as jpg with medium quality
                    $resizedImage->save(public_path() . '/storage/postimages/' . $name, 60);
                    $resizedImage_thumb->save(public_path() . '/storage/postimages/' . $name_thumb, 70);
                    $data[] = $name;
                    //insert into picture table
                    $pic = new Picture();
                    $pic->imgname = $name;
                    $newPost->pictures()->save($pic);
                }


            }
            //activity
            $a = new Activity();
            $a->post_id = $newPost->id;
            $a->type = 'post';
            $a->user_id = Auth::id();
            $a->save();
            //pusher
            $data['message'] = 'New Post from ' . Auth::user()->name;
            $data['type'] = 'post';
            $data['pid'] = $newPost->id;
            $data['user_id'] = Auth::id();
            $friendsList = FriendsList::Friends(Auth::id());
            if ($request->privacy !== "me") {
            foreach ($friendsList as $fl) {
                $this->p->trigger('user-' . $fl, 'new-post', $data);
            }
        }
            return response()->json([
                'success' => true,
                'message' => 'Post Created'
            ]);
            //event(new PostCreated($newPost));
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Something is Wrong'
            ]);
        }



        //echo "tested";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userpost = Post::
        with('pictures')
            ->with('comments')
            ->with('reactions')
        ->find($id);
        if (!$userpost) { abort (404); }

//        dd(Friend::where('friend_id',Auth::id())->where('user_id',$userpost->user_id)->get()->toSql());
        if($userpost->privacy ==="friends" ){

            if(Friend::where('friend_id',Auth::id())->where('user_id',$userpost->user_id)->get()->count() || Friend::where('friend_id',$userpost->user_id)->where('user_id',Auth::id())->get()->count() || ($userpost->user_id == Auth::id()) ){
                $friendsList = FriendsList::Friends($id);
                // echo "showing ".$userinfo->name;
                // dd($userpost);
                // dd($userinfo->posts);
                return view('single_post')->with('userpost',$userpost);
            }
            else{
                return view('single_post_404');
            }
        }
        else{
            return view('single_post')->with('userpost',$userpost);
        }

        // $userfriend = User::with('friends')->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //echo $post->user_id;
        //echo "i am called";
        //dd($post);
        //$postToDelete = Post::find($post->id);
        if($post->user_id == Auth::id()){
           if(Post::destroy($post->id)){
               return redirect('home')->with('success','Post Deleted!!');
           }
           else{
               return redirect('home')->with('success','Problem Deleting Post!!');
           }

        }
    }
    public function postcomment(Request $request,$id){
        $this->validate($request, [
            'postcomment' => 'required'
        ]);
        //dd($request->toArray());
        $newComment = new Comment();
        $newComment->comment = $request->postcomment;
        $newComment->user_id = Auth::id();
        Post::find($id)->comments()->save($newComment);
        if($newComment->id) {
            $a = new Activity();
            $a->post_id = $id;
            $a->type="comment";
            $a->user_id = Auth::id();
            $a->save();
            return back()->with('success', 'Comment Added!!');
        }
        else{
            return back()->with('success', 'Error in Comment!!');
        }
    }

    public function react(Request $request)
    {
       $this->validate($request, [
            'postid' => 'required',
            'react'=>'required'
        ]);
        $reaction = Reaction::firstOrNew([
            'post_id'=>$request->postid,
            'user_id'=>Auth::id()
        ]);
        $reaction->user_id = Auth::id();
        $reaction->type = $request->react;
        $reactType = "";
        if($request->react === "l"){$reactType = "Liked";}
        elseif ($request->react === "d"){$reactType = "Disliked";}
        elseif ($request->react === "h"){$reactType = "Loved";}
        elseif ($request->react === "s"){$reactType = "Smiled";}
        else{}


        $post = Post::find($request->postid);
        $postuser = $post->user->name;
        if($post->reactions()->save($reaction)){
            $a = new Activity();
            $a->post_id = $post->id;
            $a->type = "react";
            $a->user_id = Auth::id();
            $a->save();
            //pusher
            $data['message'] = Auth::user()->name.' '.$reactType. ' a Post from '.$postuser;
            $data['type'] = 'reaction';
            //$data['user_id'] = Auth::id();

            $this->p->trigger('user-'.$post->user_id, 'new-post', $data);

            return response()->json([
                'success' => true,
                'message' => 'Reacted'
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Error'
            ]);
        }


    }

    public function images($id){
        $allImages = Picture::with('post.user')
            ->where('user_id',$id)
            ->get();
    }
}
