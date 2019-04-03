@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
      <div class="col-md-12">
      <h4>All exams</h4>
      <div class="table-responsive">
            <table class="table table-bordered table-striped">
                 <thead>
                 <th>Score</th>
                 <th>Status</th>
                 <th>Student</th>
                 <th>Broj indeksa</th>
                 </thead>
  <tbody>
    @foreach($exams as $exam)
  <tr>
  <td>{{$exam->score}}</td>
  <td>{{$exam->status}}</td>
  <td>{{$exam->subject->student->name}} {{$exam->subject->student->last_name}}</td>
  <td>{{$exam->subject->student->br_indeksa}}</td>
  </tr>
  @endforeach
  </tbody>
</table>
          </div>
      </div>
</div>
</div>
@endsection
