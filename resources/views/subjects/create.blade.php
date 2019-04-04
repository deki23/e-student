@extends('layouts.app')

@section('content')

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
  <h1>Add new subject</h1>
  <div class="row col-md-12 col-lg-12 col-sm-12">
    <form  action="{{ route('subjects.store') }}" method="post">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="subject-name">Name<span class="required">*</span></label>
        <input placeholder="Enter name" id="subject-name" name="name" spellcheck="false" class="form-control" required />
      </div>

      <div class="form-group">
        <label for="subject_semestar">Semestar</label>
          <select id="subject_semestar" class="form-control" name="semestar">
            <option value="1"> I </option>
            <option value="2"> II </option>
          </select>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit"/>
      </div>
    </form>
  </div>
</div>
@endsection
