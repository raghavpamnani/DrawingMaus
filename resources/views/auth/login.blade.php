
<style>
	div#mobileLogin
	{
		display: none;
	}
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				@if(session()->has('message'))
					<div class="alert alert-danger" id="errorMsg" style="margin:10px">{{ session()->get('message') }}</div>
				@endif
                <div class="panel-heading" style="text-align: center;">
					 
						<button type="submit" class="btn btn-primary" value="Click" onclick="switchVisible();">Sign In with Email</button>
						<button type="submit" class="btn btn-primary" value="Click" onclick="switchVisible2();">Sign In with Mobile</button>
					
				</div>

                <div class="panel-body">
				
					
					<div id="emailLogin">  
						<form class="form-horizontal" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
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
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Login
									</button>

									<a class="btn btn-link" href="{{ route('password.request') }}">
										Forgot Your Password?
									</a>
								</div>
							</div>
						</form>
					</div>
					<div id="mobileLogin">  
						<form class="form-horizontal" method="POST" action="{{ url('/').'/mobileLogin' }}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
								<label for="phone" class="col-md-4 control-label">Mobile No.</label>

								<div class="col-md-6">
									<input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

									@if ($errors->has('phone'))
										<span class="help-block">
											<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Send Otp
									</button>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">  
   
	function switchVisible() {
		document.getElementById('emailLogin').style.display = 'block';
		document.getElementById('mobileLogin').style.display = 'none';
			
	}
	function switchVisible2() {
		document.getElementById('emailLogin').style.display = 'none';
		document.getElementById('mobileLogin').style.display = 'block';
			
	}
</script>
