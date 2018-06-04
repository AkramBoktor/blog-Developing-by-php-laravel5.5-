<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //
        $user = User::all();
        return view('admin.users.index')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.users.create');
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

        $this->validate($request,[

            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([

            'user_id'=> $user->id

        ]);

        Session::flash('success','User added Succesfully');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::find($id);

        $user->delete();
        $user->profile->delete();
        Session::flash('success','User Deleted');

        return redirect()->back();
    }

     public function admin($id)
    {
        //
        $user = User::find($id);

        $user->admin = 1 ;

        $user->save();

        Session::flash('success','successfully change user permission');

        return redirect()->route('users');

    }

    public function not_admin($id)
    {
        //
        $user = User::find($id);

        $user->admin = 0 ;

        $user->save();

        Session::flash('success','successfully change user permission');

        return redirect()->route('users');

    }
}
