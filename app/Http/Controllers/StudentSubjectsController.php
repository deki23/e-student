<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Subject;
use App\StudentSubject;
use Auth;

class StudentSubjectsController extends Controller
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
          $pronadji =  Auth::user()->id;
          $subjects = StudentSubject::where('user_id', $pronadji)->get();
          return view('studentsubjects.index', ['subjects'=>$subjects]);
        }
          return view('auth.login');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id=null)
    {
        //
        if(Auth::user()->admin==1){
          $subjects = Subject::all();
          $users=null;
          if(!$user_id){
            $users = Student::get();
            return view('studentsubjects.create', ['users' => $users, 'subjects' => $subjects]);
          }

          return view('studentsubjects.create', ['user_id'=>$user_id, 'users'=>$users, 'subjects'=>$subjects]);
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
            'user_id'=>'required',
            'subject_id'=>'required'
        ]);
        if (Auth::user()->admin==1) {
          $subject = new StudentSubject;
          $subject->user_id = $request->input('user_id');
          $subject->subject_id = $request->input('subject_id');
          $subject->save();

          return redirect('students');
        }
        abort(401);
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
        $subjects = StudentSubject::find($id);

        return view('studentsubjects.edit', ['subjects'=> $subjects]);
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
        $subjects = StudentSubject::where('id', $id)->get()->first();

        $this->validate($request, [
          'kolokvijum'=>'numeric|min:15|max:30',
          'seminarski'=>'numeric|min:5|max:10',
          'aktivnost'=>'numeric|min:5|max:10'
        ]);

        $subjectsUpdate = StudentSubject::where('id', $id)
              ->update([
                    'kolokvijum'=>$request->input('kolokvijum'),
                    'seminarski'=>$request->input('seminarski'),
                    'aktivnost'=>$request->input('aktivnost')
                  ]);

        if($subjectsUpdate){
            return redirect()->route('subjects.show', [$subjects->student->id])->with('status', 'Subject updated!');
        }

        return back()->withInput();
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
        if(Auth::user()->admin==1){
        $subject = StudentSubject::where('id', $id);
        $subject->delete();
        if($subject->delete()){
          return redirect()->route('users.index');
        }
        return back()->withInput()->with('error', 'User could not be deleted');
        }
        abort(401);
    }
}
