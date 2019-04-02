@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
  </div>
  @endif
    <div class="row col-md-9 col-sd-3 col-md-offset-1 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Ime predmeta</th>
            <th>Semestar</th>
            <th>Kolokvijum</th>
            <th>Seminarski</th>
            <th>Aktivnost</th>
            <th>Ocena</th>
        </tr>
    </thead>
    @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->subject->name}}</td>
                <td>{{$subject->subject->semestar}}</td>
                <td>{{$subject->kolokvijum}}</td>
                <td>{{$subject->seminarski}}</td>
                <td>{{$subject->aktivnost}}</td>
                <td>{{$subject->ocena}}</td>
                <td><a href="/studentsubjects/{{$subject->id}}/edit"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></a></td>
                <td>
                <form action="{{ route('studentsubjects.destroy', [$subject->id]) }}" method="post">
                  {{csrf_field() }}
                  {{method_field('DELETE') }}
                  <button class="btn btn-xs btn-danger">Delete</buton>
                </form>
                </td>
            </tr>
    @endforeach
    </table>
    </div>
</div>
@endsection
