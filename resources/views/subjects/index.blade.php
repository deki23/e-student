@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-9 col-sd-3 col-md-offset-1 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Ime predmeta</th>
            <th>Semestar</th>
        </tr>
    </thead>
    @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->name}}</td>
                <td>{{$subject->semestar}}</td>
            </tr>
    @endforeach
    </table>
    <div class="pull-right">
          {{$subjects->links()}}
    </div>

    </div>
</div>
@endsection
