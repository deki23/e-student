@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-9 col-sd-3 col-md-offset-1 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Ime predmeta</th>
            <th>Semestar</th>
            @if(Auth::user()->admin==1)
              <th>Delete</th>
            @endif
        </tr>
    </thead>
    @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->name}}</td>
                <td>{{$subject->semestar}}</td>
                @if(Auth::user()->admin==1)
                  <td>
                    <form action="{{ route('subjects.destroy', [$subject->id]) }}" method="post">
                      {{csrf_field() }}
                      {{method_field('DELETE') }}
                      <button class="btn btn-xs btn-danger">Delete</buton>
                    </form>
                  </td>
                @endif
            </tr>
    @endforeach
    </table>
    <div class="pull-right">
          {{$subjects->links()}}
    </div>

    </div>
</div>
@endsection
