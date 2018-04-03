@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				@if(session()->has('message'))
					<div class="alert alert-danger" id="errorMsg" style="margin:10px">{{ session()->get('message') }}</div>
				@endif
              

                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ url('/').'/loginWithOtp' }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="phone" class="col-md-4 control-label">Mobile No.</label>

								<div class="col-md-6">
									<input id="phone" type="number" class="form-control" name="phone" value="{{ session()->get('mblForOtp') }}">

									@if ($errors->has('phone'))
										<span class="help-block">
											<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
								</div>
								
							</div>
							<div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
								<label for="phone" class="col-md-4 control-label">OTP</label>

								<div class="col-md-6">
									<input id="otp" type="password" class="form-control" name="otp" required>

									@if ($errors->has('otp'))
										<span class="help-block">
											<strong>{{ $errors->first('otp') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Sign In
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
 