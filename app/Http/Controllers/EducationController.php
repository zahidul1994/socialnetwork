<?php

namespace App\Http\Controllers;

use App\education;
use App\User;
use App\work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EducationController extends Controller
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

    public function index($id)
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
    {
        $education_basic = new Education();
        $education_basic->institute = $request->institute;
        $education_basic->sess = $request->sess;
        $education_basic->level = $request->level;
        $education_basic->major = $request->major;
        $education_basic->description = $request->description;
        $education_basic->graduate = $request->graduate != null?"1":"0";
        //$education_basic->user_id = Auth::id();
        //dd($education_basic->graduate);
        //$education_basic->save();
        User::find(Auth::id())->education()->save($education_basic);
        if($education_basic->id){
            return back()->with('success','Education Updated');

        }
        else{
            return back()->with('success','Problem Updating Education');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\education  $education
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($user);
        $userinfo = User::with(['education','works'])->find($id);
        //dd($userinfo);
        return view('education') ->with('user',$userinfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(education $education)
    {
        //
    }
}
