@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="url('')" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new subjects</a>
        <tr>
            <th>Ime</th>
            <th>Semestar</th>
            <th>Ocena</th>
        </tr>
    </thead>
    @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->name}}</td>
                <td>{{$subject->semestar}}</td>
                <td>{{$subject->ocena}}</td>
            </tr>
    @endforeach
    </table>
    </div>
</div>
@endsection
