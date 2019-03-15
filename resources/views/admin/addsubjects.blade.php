@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
  <h1>Add new subject to user</h1>
      <div class="row col-md-12 col-lg-12 col-sm-12">
          <form  action="{{ route('subjects.store') }}" method="post">
                      {{ csrf_field() }}
                    <div class="form-group">
                          <label for="subject-name">Name<span class="required">*</span></label>
                          <input placeholder="Enter name"
                                  id="subject-name"
                                  required
                                  name="name"
                                  spellcheck="false"
                                  class="form-control"
                                  />
                                  @if($users == null)
                            <input class="form-control"type="hidden"
                                  name="user_id"
                                  value="{{ $user_id}}"
                                  />
                                  @endif
                    </div>


                    @if($users != null)
                    <div class="form-group">
                      <label for="user-content">Select user</label>

                      <select class="form-control" name="user_id">
                        @foreach($users as $user)
                          <option value="{{$user->id}}">
                            {{$user->name}} {{$user->last_name}} {{$user->br_indeksa}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="subject_semestar">Description</label>
                        <select class="form-control" name="semestar">
                          <option value="1"> I </option>
                          <option value="2"> II </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary"
                                value="Submit"/>
                    </div>
          </form>
      </div>
</div>
@endsection
