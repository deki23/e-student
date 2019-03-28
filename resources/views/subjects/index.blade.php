@extends('students.layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-9 col-sd-3 col-md-offset-2 custyle">
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
    @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->name}}</td>
                <td>{{$subject->semestar}}</td>
                <td>{{$subject->kolokvijum}}</td>
                <td>{{$subject->seminarski}}</td>
                <td>{{$subject->aktivnost}}</td>
                <td>{{$subject->ocena}}</td>
                <td>Prijavi ispit</td>
            </tr>
    @endforeach
    </table>
    </div>
</div>
@endsection
