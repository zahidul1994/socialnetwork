<?php
/**
 * Created by PhpStorm.
 * User: Lab-2
 * Date: 9/27/2018
 * Time: 1:01 PM
 */

namespace App\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Activity
{
    public static function getview($singleActivity)
    {
        $html="";
        if($singleActivity->type == "post") {
            $html .= '<p style="border-bottom: 1px solid #b5d7f3;padding: 5px;"><img src="'.asset('storage/profile/'.$singleActivity->user_id.'_profile_thumb.jpg').'" alt="user" class="img-fluid profile-photo profPost a commentile-photo-md" /> <a href="'.url('profile/'.Auth::id()).'">'.Auth::user()->name.'</a> Create a new <a href="'.url('post/'.$singleActivity->post_id).'"> post</a>.</p>';
                    }
    elseif($singleActivity->type == "comment") {
        $html .= '<p style="border-bottom: 1px solid #b5d7f3;padding: 5px;"><img src="'.asset('storage/profile/'.$singleActivity->post->user->id.'_profile_thumb.jpg').'" alt="user" class="img-fluid profile-photo profPost a commentile-photo-md" /> <a href="'.url('profile/'.Auth::id()).'">'.Auth::user()->name.'</a> Comment on a <a href="'.url('post/'.$singleActivity->post_id).'"> post</a>.</p>';
        }
    elseif($singleActivity->type == "react") {
        $html .= '<p style="border-bottom: 1px solid #b5d7f3;padding: 5px;"><img src="' . asset('storage/profile/' . $singleActivity->post->user->id . '_profile_thumb.jpg') . '" alt="user" class="img-fluid profile-photo profPost a commentile-photo-md" /> <a href="' . url('profile/' . Auth::id()) . '">' . Auth::user()->name . '</a> reacted on a <a href="' . url('post/' . $singleActivity->post_id) . '"> post</a>.</p>';
    }
    elseif($singleActivity->type == "share") {
        $html .= '<p style="border-bottom: 1px solid #b5d7f3;padding: 5px;"><img src="' . asset('storage/profile/' . $singleActivity->post->user->id . '_profile_thumb.jpg') . '" alt="user" class="img-fluid profile-photo profPost a commentile-photo-md" /> <a href="' . url('profile/' . Auth::id()) . '">' . Auth::user()->name . '</a> shared a <a href="' . url('post/' . $singleActivity->post_id) . '">post</a>.</p>';
    }
    else{

    }
    return $html;

}
}
