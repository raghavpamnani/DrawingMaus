@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('org_title') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Organization Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="org_title" value="{{ old('org_title') }}" required autofocus>

                                @if ($errors->has('org_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('org_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('org_description') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Organization Detail</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="org_description" value="{{ old('org_description') }}" required autofocus>

                                @if ($errors->has('org_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('org_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('owner_name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Owner Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="owner_name" value="{{ old('owner_name') }}" required autofocus>

                                @if ($errors->has('owner_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('owner_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group{{ $errors->has('owner_phone') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Owner Phone</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="owner_phone" value="{{ old('owner_phone') }}" required autofocus>

                                @if ($errors->has('owner_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('owner_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
