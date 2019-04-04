@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
  <h1>Add subjects to student</h1>
  <div class="row col-md-12 col-lg-12 col-sm-12">
    <form  action="{{ route('studentsubjects.store') }}" method="post">
      {{ csrf_field() }}

      @if($users == null)
      <input class="form-control"type="hidden" name="user_id" value="{{ $user_id}}"/>
      @endif

      @if($users != null)
      <div class="form-group">
        <label for="user-content">Select user</label>
        <select id="user-content" class="form-control" name="user_id">
        @foreach($users as $user)
          <option value="{{$user->id}}">
            {{$user->name}} {{$user->last_name}} {{$user->br_indeksa}}
          </option>
        @endforeach
        </select>
      </div>
      @endif

      @if($subjects == null)
      <input class="form-control"type="hidden" name="subject_id" value="{{ $subject_id}}"/>
      @endif
      <div class="form-group">
        <label for="subject_content">Select subject</label>
        <select id="subject_content" class="form-control" name="subject_id">
        @foreach($subjects as $subject)
          <option value="{{$subject->id}}">
            {{$subject->name}} {{$subject->semestar}}
          </option>
        @endforeach
        </select>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit"/>
      </div>
          </form>
  </div>
</div>
@endsection
