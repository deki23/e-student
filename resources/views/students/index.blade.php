@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
      @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif

      <div class="col-md-12">
      <h4>All students</h4>
      <div class="table-responsive">


            <table id="mytable" class="table table-bordred table-striped">

                 <thead>

                 <th>First Name</th>
                  <th>Last Name</th>
                   <th>Verification number</th>
                   <th>Email</th>

                    <th>Edit</th>
                    <th>Delete</th>
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
  <td><a href="/students/{{$student->id}}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
  <td>

        <form action="{{ route('students.destroy', [$student->id]) }}" method="post">
          {{csrf_field() }}
          {{method_field('DELETE') }}
          <button class="btn btn-xs btn-danger">Delete</buton>
        </form>


  </td>
  <td><a href="{{route('subjects.show', [$student])}}">All subjects</a></td>
  <td>
    <a href="studentsubjects/create/{{$student->id}}">
            Add subjects
          </a>
  </td>
  </tr>

@endforeach
  </tbody>

</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
<li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
<li class="active"><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>

          </div>

      </div>
</div>
</div>

@endsection
