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
      <h4>All students</h4>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Verification number</th>
            <th>Email</th>
            @if(Auth::user()->admin==1)
              <th>Edit</th>
              <th>Delete</th>
            @endif
            <th>All subjects</th>
            <th>Add subjects</th>
          </thead>
          <tbody>
            @foreach($students as $student)
            <tr>
              <td>{{$student->name}}</td>
              <td>{{$student->last_name}}</td>
              <td>{{$student->br_indeksa}}</td>
              <td>{{$student->email}}</td>
              @if(Auth::user()->admin==1)
                <td><a href="/students/{{$student->id}}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
                <td>
                  <form action="{{ route('students.destroy', [$student->id]) }}" method="post">
                    {{csrf_field() }}
                    {{method_field('DELETE') }}
                    <button class="btn btn-xs btn-danger">Delete</buton>
                  </form>
                </td>
              @endif
              <td><a href="{{route('studentsubjects.show', [$student])}}">All subjects</a></td>
              <td><a href="studentsubjects/create/{{$student->id}}">Add subjects</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{$students->links()}}
    </div>
  </div>
</div>

@endsection
