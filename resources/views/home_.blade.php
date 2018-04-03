<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sahastrabahu</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
    <div id="app">
       <example-component></example-component>  
		<div class="col-xs-12" style="text-align: center;">
			<button type="button"><a href="{{ url('/').'/login' }}" id="login">Sign In</a></button>
			<button type="button"><a href="{{ url('/').'/signup' }}" id="login">Sign Up</a></button>
		</div>	   
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>