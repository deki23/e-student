<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('users.index')->with('users', Auth::user()->all());
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        $user = User::find($user->id);

        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $userUpdate = User::where('id', $user->id)
              ->update([
                    'name'=>$request->input('name'),
                    'last_name'=>$request->input('last_name'),
                    'email'=>$request->input('email'),
                    'br_indeksa'=>$request->input('br_indeksa')
                  ]);

        if($userUpdate){
            return redirect()->route('users.index')
            ->with('success' , 'User updated successfully!');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $findUser = User::where('id', $id);
        $findSubjects = Subject::where('user_id', $id);
        $findSubjects->delete();
        if($findUser->delete()){
          return redirect()->route('users.index');
  }
        return back()->withInput()->with('error', 'User could not be deleted');
    }
}
