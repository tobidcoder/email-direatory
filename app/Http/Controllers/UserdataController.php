<?php

namespace App\Http\Controllers;

use App\Userdata;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Showing add user data form, and user data
        $userdatas = Userdata::all();

        return view('userdata', compact('userdatas'));
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
        //
        $request->validate([
            'email' =>'required|email|unique:userdatas',
            'first_name' =>'required',
            'surname' =>''
        ]);

        $userdate = new Userdata([
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'surname' => $request->get('surname'),
            ]);
        $userdate->save();

        return redirect('/')->with('success', 'User data saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function show(userdata $userdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function edit(userdata $userdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userdata $userdata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(userdata $userdata)
    {
        //
    }
}
