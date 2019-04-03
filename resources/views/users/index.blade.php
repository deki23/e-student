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
      <h4>All users</h4>
      <div class="table-responsive">
            <table class="table table-bordered table-striped">

                 <thead>
                 <th>First Name</th>
                  <th>Last Name</th>
                   <th>Email</th>
                    @if(Auth::user()->admin==1)
                   <th>Admin</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    @endif
                 </thead>
  <tbody>
@foreach($users as $user)
  <tr>
  <td>{{$user->name}}</td>
  <td>{{$user->last_name}}</td>
  <td>{{$user->email}}</td>
  @if(Auth::user()->admin==1)
  @if(!$user->admin)
  <td><form action="{{ route('users.update', [$user]) }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">
      <input type="hidden" name="admin" value="1">
      <button class="btn btn-xs btn-success">
          Make admin
      </button>
  </form>
  </td>
  @else
  <td><form action="{{ route('users.update', [$user->id]) }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">
      <input type="hidden" name="admin" value="0">
      <button class="btn btn-xs btn-danger">
          Remove admin
      </button>
  </form>
  </td>
  @endif
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
  @endif
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
