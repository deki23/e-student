@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
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
            <th>Predmet</th>
            <th>Unesi bodove</th>
            <th>Upisi ocenu</th>
          </thead>
          <tbody>
            @foreach($exams as $exam)
            <tr>
              <td>{{$exam->score}}</td>
              <td>{{$exam->status}}</td>
              <td>{{$exam->subject->student->name}} {{$exam->subject->student->last_name}}</td>
              <td>{{$exam->subject->student->br_indeksa}}</td>
              <td>{{$exam->subject->subject->name}}</td>
              <td><a href="/exams/{{$exam->id}}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
              <td>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('studentsubjects.update', [$exam->subject->id]) }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="put">

                  <input type="hidden" name="ocena" value="{{$exam->score}}">
                  <button class="btn btn-xs btn-success">
                    Upisi ocenu
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$exams->links()}}
      </div>
    </div>
  </div>
</div>
@endsection
