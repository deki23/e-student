@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change information about student subject</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('studentsubjects.update', [$subjects->id]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group{{ $errors->has('kolokvijum') ? ' has-error' : '' }}">
                            <label for="kolokvijum" class="col-md-4 control-label">Kolokvijum (15-30)</label>

                            <div class="col-md-6">
                                <input id="kolokvijum" type="text" class="form-control" name="kolokvijum" value="{{ $subjects->kolokvijum }}" required autofocus>

                                @if ($errors->has('kolokvijum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kolokvijum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('seminarski') ? ' has-error' : '' }}">
                            <label for="seminarski" class="col-md-4 control-label">Seminarski (5-10)</label>

                            <div class="col-md-6">
                                <input id="seminarski" type="text" class="form-control" name="seminarski" value="{{ $subjects->seminarski }}" required >

                                @if ($errors->has('seminarski'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seminarski') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('br_indeksa') ? ' has-error' : '' }}">
                            <label for="aktivnost" class="col-md-4 control-label">Aktivnost (5-10)</label>

                            <div class="col-md-6">
                                <input id="aktivnost" type="text" class="form-control" name="aktivnost" value="{{ $subjects->aktivnost }}" required>

                                @if ($errors->has('aktivnost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aktivnost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
