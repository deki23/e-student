@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">


      <div class="col-md-12">
      <h4>All users</h4>
      <div class="table-responsive">


            <table id="mytable" class="table table-bordred table-striped">

                 <thead>

                 <th>First Name</th>
                  <th>Last Name</th>
                   <th>Verification number</th>
                   <th>Email</th>
                   <th>Admin</th>

                    <th>Edit</th>
                    <th>Delete</th>
                 </thead>
  <tbody>
@foreach($users as $user)
  <tr>
  <td>{{$user->name}}</td>
  <td>{{$user->last_name}}</td>
  <td>{{$user->br_indeksa}}</td>
  <td>{{$user->email}}</td>
  <td>{{$user->admin}}</td>
  <td><a href="/users/{{$user->id}}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
  <td>
      @if(Auth::id() !== $user->id)
        <form action="{{ route('users.destroy', [$user->id]) }}" method="post">
          {{csrf_field() }}
          {{method_field('DELETE') }}
          <button class="btn btn-xs btn-danger">Delete</buton>
        </form>


      @endif
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
