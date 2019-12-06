<?php

namespace App\Http\Controllers;

use App\work;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorkController extends Controller
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
        return view('education');
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
        $work_basic = new Work();
        $work_basic->company = $request->company;
        $work_basic->designation = $request->designation;
        $work_basic->workfrom = $request->workfrom;
        $work_basic->workto = $request->workto;
        $work_basic->working = $request->working != null?"1":"0";
        $work_basic->description = $request->description;
        $work_basic->city = $request->city;

        User::find(Auth::id())->works()->save($work_basic);
        if($work_basic->id){
            return back()->with('success','Work Updated');

        }
        else{
            return back()->with('success','Problem Updating Work');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(work $work)
    {
        //
    }
}
