<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sahastrabahu</title>
 <!--   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
    <div id="app">
       <example-component></example-component>    
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>-->
<link rel="stylesheet" href="{{asset('design/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('design/bower_components/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('design/bower_components/Ionicons/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('design/dist/css/AdminLTE.min.css')}}">
<link rel="stylesheet" href="{{asset('design/plugins/iCheck/square/blue.css')}}">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--<body class="hold-transition login-page htmlback" style="background: url('public/images/2.jpg') no-repeat center center fixed;  height:100%; background-size: 100% 100%;">-->
<body class="hold-transition login-page htmlback">
	<div class="login-box" style="margin-top:5%;">

	  <!-- /.login-logo -->
	  <div class="login-box-body">
		<!--<div class="login-logo">   
			<img src="public/images/logo.png" alt="Brand Logo" width="70%">
		</div>-->
		<div class="col-xs-12" style="text-align: center;">   
			<button type="button" value="Click" onclick="switchVisible();">Sign In with Email</button>
			<button type="button" value="Click" onclick="switchVisible2();">Sign In with Mobile</button>
		</div>
		<p class="login-box-msg"></p>
			@if(session()->has('message'))
				<div class="alert alert-danger" id="errorMsg" style="margin:10px">{{ session()->get('message') }}</div>
			@endif
		  
		<div class="form-group">
			@if(count($errors)>0)
				@foreach($errors->all() as $error)
					<div class="alert alert-warning" >{{ $error }}</div>
				@endforeach
			@endif  
		</div>
		<div id="emailLogin">  
		<form action="{{ url('/').'/validate' }}" method="post" id="login">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">  
			<div class="form-group has-feedback">
				<input type="text" name="username"  class="form-control" placeholder="Username">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control"  placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-12">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8">  
				<a href="#" id="forgetPassword">Forgot Password ?</a> 
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
				<a href="{{ url('/').'/register' }}" id="register">Register</a>
				</div>
				<!-- /.col -->
			</div>
		</form> 
		<form action="{{ url('/').'/forgetPassword' }}" method="post" id="forgetPass">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">  
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" required placeholder="Enter your registered Email Id">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div> 
			<div class="row">
				<div class="col-xs-8">  
				<a href="#" id="loginForm">Login</a> 
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Send OTP</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
		</div>		
		<!--<div id="mobileLogin">
		
			<form action="{{ url('/').'/forgetPassword' }}" method="post" id="mobileLogin">
				<input type="hidden" name="_method" value="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">  
				<div class="form-group has-feedback">
					<input type="number" name="mobile" class="form-control" required placeholder="Enter your Mobile No.">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div> 
				<div class="row">
					
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Send OTP</button>
					</div>
					
				</div>
			</form>
		
		</div>-->
		
		<!-- /.social-auth-links --> 
	  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('/design/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> 

</body>
</html>
<script type="text/javascript">  
    $("#forgetPassword").click(function(){
         $("#login").css('display','none');
         $("#errorMsg").css('display','none');
         $("#forgetPass").css('display','block'); 
    });
    $("#loginForm").click(function(){
         $("#forgetPass").css('display','none');
         $("#login").css('display','block'); 
         
    });
    $("#forgetPass").css('display','none'); 
	
	
	function switchVisible() {
                    document.getElementById('emailLogin').style.display = 'block';
                    document.getElementById('mobileLogin').style.display = 'none';
			
	}
	function switchVisible2() {
		document.getElementById('emailLogin').style.display = 'none';
		document.getElementById('mobileLogin').style.display = 'block';
			
	}
</script>