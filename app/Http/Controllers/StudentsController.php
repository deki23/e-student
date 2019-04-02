<?php

namespace App\Http\Controllers;

use App\Student;
use App\Subject;
use App\StudentSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('students.index')->with('students', Student::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
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
            'name'=>'required|max:25',
            'last_name'=>'required|max:25',
            'br_indeksa'=>'required|max:9',
            'email'=>'required',
            'password'=>'required|min:6'
        ]);


          $student = new Student;
          $student->name = $request->input('name');
          $student->last_name = $request->input('last_name');
          $student->br_indeksa = $request->input('br_indeksa');
          $student->email = $request->input('email');
          $student->password = bcrypt($request->input('password'));
          $student->save();


          return redirect()->route('students.index');

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
        $user = Student::find($id);

        return view('students.edit', ['user'=>$user]);
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
        $studentUpdate = Student::where('id', $id)
              ->update([
                    'name'=>$request->input('name'),
                    'last_name'=>$request->input('last_name'),
                    'email'=>$request->input('email'),
                    'br_indeksa'=>$request->input('br_indeksa')
                  ]);

        if($studentUpdate){
            return redirect()->route('students.index')->with('status', 'Student updated successfully!');
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
        $findUser = Student::where('id', $id);
        $findSubjects = StudentSubject::where('user_id', $id);
        $findSubjects->delete();
        if($findUser->delete()){
          return redirect()->route('students.index');
        }
        return back()->withInput()->with('error', 'User could not be deleted');
    }
}
