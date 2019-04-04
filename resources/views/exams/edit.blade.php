@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Unesite ispitne bodove</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('exams.update', [$exam->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="status" value="1">
            <div class="form-group {{ $errors->has('score') ? ' has-error' : '' }}">
              <label for="score" class="col-md-4 control-label">Score</label>
                <div class="col-md-6">
                  <input id="score" type="text" class="form-control" name="score" required autofocus>
                    @if ($errors->has('score'))
                      <span class="help-block">
                        <strong>{{ $errors->first('score') }}</strong>
                      </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Unesite bodove
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
