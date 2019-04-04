<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\StudentSubject;
use Auth;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('exams.index')->with('exams', Exam::get());
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

        $this->validate($request, [
            'subjects_id'=>'required'
        ]);
        $proveri = $request->input('subjects_id');
        $bodovi = StudentSubject::where('subject_id', $proveri)->first();
        $pio = $bodovi->kolokvijum + $bodovi->aktivnost + $bodovi->seminarski;
        if($pio >= 25){
        $exam = new Exam;
        $exam->subjects_id =  $request->input('subjects_id');
        $exam->save();
        return redirect('studentsubjects')->with('status', 'Uspesno ste prijavili ispit.');
        }

        return redirect()->route('studentsubjects.index')->with('error', 'Nije moguce prijaviti ispit,
        proverite da li su vam upisane predispitne obaveze!');
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
        $exam = Exam::find($id);
        return view('exams.edit', ['exam'=>$exam]);
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
        $this->validate($request, [
          'score'=>'numeric|min:26|max:50',
          'status'=>'required'
                ]);

      $examUpdate = Exam::where('id', $id)
              ->update([
                    'score'=>$request->input('score'),
                    'status'=>$request->input('status')
          ]);

      if($examUpdate){
        return redirect()->route('exams.index')->with('status', 'Uspesno ste uneli ispitne bodove!');
      }

      return redirect()->route('exams.index')->with('error', 'Nije moguce uneti bodove, obratite se tehnickoj podrsci.');

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
        $findExam = Exam::find($id);
        $findExam->delete();
        return redirect()->route('studentsubjects.index')->with('status', 'Uspesno ste odjavili ispit.');
    }
}
