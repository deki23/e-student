<?php

namespace App\Http\Controllers;

use App\Subject;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(Auth::check() ){
          $predmet =  Auth::user()->id;
          $subjects = Subject::where('user_id', $predmet)->get();
          return view('subjects.index')
                ->with('subjects', $subjects);
        }

        return view('auth.login');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id = null)
    {
      if(Auth::user()->admin==1){
      $users=null;
      if(!$user_id){
        $users = User::where('id', $user_id);
        return view('subjects.create')
        ->with('users', Student::all());
      }
        return view('subjects.create', ['user_id'=>$user_id, 'users'=>$users]);
      }
        abort(401);
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

        $this->validate($request, [
            'name'=>'required|max:125',
            'semestar'=>'required',
            'user_id'=>'required'
        ]);
        if (Auth::user()->admin==1) {
          $subject = new Subject;
          $subject->name = $request->input('name');
          $subject->semestar = $request->input('semestar');
          $subject->user_id = $request->input('user_id');
          $subject->save();

          return redirect('subjects');
        }

        abort(401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
