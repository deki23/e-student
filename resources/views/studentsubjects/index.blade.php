@extends('students.layouts.app')

@section('content')
<div class="container">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
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
          <th>Prijavi ispit</th>
        </tr>
      </thead>
      <tbody>
      @foreach($subjects as $subject)
        <tr>
          <td>{{$subject->subject->name}}</td>
          <td>{{$subject->subject->semestar}}</td>
          <td>{{$subject->kolokvijum}}</td>
          <td>{{$subject->seminarski}}</td>
          <td>{{$subject->aktivnost}}</td>
          <td>{{$subject->ocena}}</td>
          <td>
          @if(!$subject->exam)
            <form action="{{ route('exams.store') }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="subjects_id" value="{{$subject->id}}">
              <button class="btn btn-xs btn-success">
                Prijavi ispit
              </button>
            </form>
          @elseif($subject->exam->status==0)
            <form action="{{ route('exams.destroy', [$subject->exam->id]) }}" method="post">
              {{csrf_field() }}
              {{method_field('DELETE') }}
              <button class="btn btn-xs btn-danger">
                  Odjavi ispit
              </button>
            </form>
          @else
            <button class="btn btn-xs btn-info">
              Ispit položen sa {{$subject->exam->score}} bodova
            </button>
          @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
