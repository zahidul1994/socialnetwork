<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Route;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userinfo = User::with('profile')->find(Auth::id());
        $countryList = config('country.list');
        return view('profile')
            ->with('user',$userinfo)
            ->with('country',$countryList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $editPro_basic = new Profile();
        $editPro_basic= Profile::firstOrNew(['user_id' => Auth::id()]);
        $editPro_basic->f_name = $request->firstname;
        $editPro_basic->l_name = $request->lastname;
        $editPro_basic->u_mail = $request->email;
        $editPro_basic->dob = $request->dob;
        $editPro_basic->sex = $request->sex;
        // dd($editPro_basic->sex);
        $editPro_basic->city = $request->city;
        $editPro_basic->country = $request->country;
        $editPro_basic->user_id = Auth::id();
        if($request->hasfile('ppic')){
            $name=Auth::id()."_profile.".$request->file('ppic')->getClientOriginalExtension();
            $name_thumb=Auth::id()."_profile_thumb.".$request->file('ppic')->getClientOriginalExtension();
            $icon_thumb=Auth::id()."_icon.".$request->file('ppic')->getClientOriginalExtension();
            $request->file('ppic')->move(public_path().'/storage/profile/',$name);
            $resizedImage = Image::make(public_path().'/storage/profile/'.$name)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage_thumb = Image::make(public_path().'/storage/profile/'.$name)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage_icon = Image::make(public_path().'/storage/profile/'.$name)->resize(48, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage->save(public_path().'/storage/profile/'.$name, 70);
            $resizedImage_thumb->save(public_path().'/storage/profile/'.$name_thumb, 70);
            $resizedImage_icon->save(public_path().'/storage/profile/'.$icon_thumb, 70);
            $editPro_basic->pp = $name;

        }
        if($request->hasfile('cpic')){
            $name=Auth::id()."_cover.".$request->file('cpic')->getClientOriginalExtension();
            $name_thumb=Auth::id()."_cover_thumb.".$request->file('cpic')->getClientOriginalExtension();
//            $icon_thumb=Auth::id()."_icon.".$request->file('ppic')->getClientOriginalExtension();
            $request->file('cpic')->move(public_path().'/storage/profile/',$name);
            $resizedImage = Image::make(public_path().'/storage/profile/'.$name)->resize(1030, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage_thumb = Image::make(public_path().'/storage/profile/'.$name)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
//            $resizedImage_icon = Image::make(public_path().'/storage/profile/'.$name)->resize(48, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
            $resizedImage->save(public_path().'/storage/profile/'.$name, 70);
            $resizedImage_thumb->save(public_path().'/storage/profile/'.$name_thumb, 70);
//            $resizedImage_icon->save(public_path().'/storage/profile/'.$icon_thumb, 70);
            $editPro_basic->cp = $name;
        }

//exit();
        //save info
        $editPro_basic->save();
        if($editPro_basic->id){
            return back()->with('success','Profile Updated');

        }
        else{
            return back()->with('success','Problem Updating Profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userinfo = User::
        with('profile')
            ->with('posts.pictures')
            ->with('posts.comments')
            ->with('education')
            ->with('works')
            ->with('interests')
        ->find($id);
        // echo "showing ".$userinfo->name;
        // dd($userinfo);
        // dd($userinfo->posts);
       return view('showProfile')->with('user',$userinfo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
