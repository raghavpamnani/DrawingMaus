@extends('layouts.app')

@section('content')

<div class="container-fluid">
	
    <div class="row">
		
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				@if(session()->has('message'))
					<div class="alert alert-danger" id="errorMsg" style="margin:10px">{{ session()->get('message') }}</div>
				@endif
                <div class="panel-heading"  style="background-color:#20caa9">

					<!--<div id="app">
						<v-app>
							<participateform></participateform>
						</v-app>
					</div>-->

					<button type="button" class="btn btn-default a-btn-slide-text" style ="border-color: white; box-shadow: none;" onclick="showDiv()">
						<span style="font-size: 30px;" class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
					</button>

					Resigter to Participate in Drawing Competition
				</div>
				

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
						@if(count($errors)>0)
							@foreach($errors->all() as $error)
								<div class="alert alert-warning" >{{ $error }}</div>
							@endforeach
						@endif  
					</div>
					
					<div id="formDiv">
						<form class="form-horizontal" role="form" method="post" action="{{ url('/').'/validateregister' }}"  enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">  
							<div class="form-group row" >
								 <div class="col-md-12">
								 <input id="user_id"  type="hidden" class="form-control" name="user_id" placeholder="{{$userid}}" value="{{$userid}}">
								</div>
							</div>
							<div class="form-group">

								<div class="col-md-4">
									<input id="firstname" type="text" class="form-control" name="firstname" placeholder="* First Name" >
								</div>
								 <div class="col-md-4">
									<input id="middlename" type="text" class="form-control" name="middlename" placeholder="Middle Name" autofocus>
								</div>
								 <div class="col-md-4">
									<input id="lastname" type="text" class="form-control" name="lastname" placeholder="* Last Name"  >
								</div>
							</div>
						
							 <div class="form-group row">
								<div class="col-md-6">
									<select class="form-control" id="gender" name="gender" placeholder="Gender" >
										<option value="">Select Gender</option>
										<option value="Female">Female</option>
										<option value="Male">Male</option>
									</select>   
								</div>
								 <div class="col-md-6">
									<input id="dob" type="date" class="form-control" name="dob" placeholder="Date of birth" >
								</div>
								
							</div>
							<div class="form-group row" >
								<div class="col-md-12">
									<select class="form-control" id="relation" name="relation" placeholder="Select relation">
										<option value="">Select Relation</option>
										<option value="Sister">Sister</option>
										<option value="Brother">Brother</option>
										<option value="Daughter">Daughter</option>
										<option value="Son">Son</option>
										<option value="Cousin">Cousin</option>
										<option value="Other">Other</option>
									</select>   
								</div>
							</div>
						
							<div class="form-group row" >
								 <div class="col-md-12">
									<input  name="avatar" type="file" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12" style="text-align:center;">
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
	<div class="row">	
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">			
                <div class="panel-heading" style="background-color:#20caa9">
					<button type="button" class="btn btn-default a-btn-slide-text"  style ="border-color: white; box-shadow: none;">
					<a href="{{url('/index')}}"><span style="font-size: 30px;" class="glyphicon glyphicon-download-alt"  aria-hidden="true"></span></a>
					</button>
					To Download PDF file
				</div>
			</div>
	</div>
</div>
@endsection

<script type="text/javascript">  
	function showDiv() {
	   document.getElementById('formDiv').style.display = "block";
	}
</script>
