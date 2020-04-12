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
        $userdatas = Userdata::orderBy('id', 'DESC')->paginate(5);

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
            'email' =>  'required|email|unique:userdatas',
            'first_name' =>  'required|string',
            'surname' => 'string'
        ]);

        $userdata = new Userdata([
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'surname' => $request->get('surname'),
            ]);
        $userdata->save();

        return redirect('/')->with('success', 'User data saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function show(Userdata $userdata)
    {
        //
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdata $userdata, $id)
    {
        //
        $userdata = $userdata::find($id);
        
        return view('edit', compact('userdata'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userdata $userdata, $id)
    {
        //

        $request->validate([
            'email' =>'required|email',
            'first_name' =>'required|string',
            'surname' => 'string'
        ]);

        $userdata = Userdata::find($id);
        $userdata->email =  $request->get('email');
        $userdata->first_name = $request->get('first_name');
        $userdata->surname = $request->get('surname');
        $userdata->save();

        return redirect('/')->with('success', 'User data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userdata $userdata, $id)
    {
        //
        $userdata = Userdata::find($id);
        $userdata->delete();

        return redirect('/')->with('success', 'User details deleted!');
    }
}
