<style type="text/css">
    .userImg {
        display: inline-block;
        padding: 0 25px;
        height: 50px;
        font-size: 16px;
        line-height: 50px;
        border-radius: 25px;
      
    }
    
    .userImg img {
        float: left;
        margin: 0 10px 0 -25px;
        height: 80px;
        width: 80px;
        border-radius: 50%;
    }
    .userImage{
        max-height: 70px;
    }
    a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
    }
    .btn:hover {
        -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);  
    }
    a.btn {
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }
    btn {
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }
    </style>
@extends('layouts.app')
 
<script>

    $.ajax({
  
    dataType: 'html', //Optional: type of data returned from server
    success: function(data) {
        $('div.flash-message').html(data);
    },
   
});
</script>


@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#20caa9"><h4>Edit Profile</h4></div>
                    
                    <div class="panel-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        <form class="form-horizontal" method="post" action="{{action('ParticipantController@updateCanditate', $participant->id)}}"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
     
                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">First Name</label>
     
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" value="{{$participant->firstname}}" name="firstname" required>
     
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
     
                            <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                                    <label for="middlename" class="col-md-4 control-label">Middle Name</label>
         
                                    <div class="col-md-6">
                                        <input id="middlename" type="text" class="form-control" value="{{$participant->middlename}}" name="middlename">
            
                                        @if ($errors->has('middlename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div> 
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label for="lastname" class="col-md-4 control-label">Last Name</label>
        
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" value="{{$participant->lastname}}" name="lastname" required>
        
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
     
                          
                            <div class="form-group">
                                <label for="landline" class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender"  value="{{$participant->gender}}">
									
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="dob" class="col-md-4 control-label">Date of Birth</label>
                                    <div class="col-md-6">
                                            <input id="dob" type="date" class="form-control" value="{{$participant->dob}}" name="dob">
                
                                            @if ($errors->has('dob'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                             <div class="form-group">
                                <label for="landline" class="col-md-4 control-label">Relation</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="relation" name="relation" value="{{$participant->relation}}"> 
										<option value="Sister">Sister</option>
										<option value="Brother">Brother</option>
										<option value="Daughter">Daughter</option>
										<option value="Son">Son</option>
										<option value="Cousin">Cousin</option>
										<option value="Other">Other</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="col-md-4 control-label">Photo</label>
                                <div class="col-md-6">
                                    <div class="col-md-3">
                                        <div class="userImg">
                                            <input type="hidden" name="oldImage" value="{{$participant->avatar}}">
                                            <img src="{{ url('/').$participant->avatar}}" class="userImage thumbnail">
                                        </div>
                                     </div> 
                                    <div class="col-md-9">
                                        <input  name="image" type="file" class="form-control"  value="{{$participant->avatar}}">                                       
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
									
                                    <button type="submit" style="border: none;background-color: white; ">
                                       <a class="btn btn-primary mr-1">Save</a> 
                                    </button>
									<a href="{{ url('/index') }}" class="btn btn-danger mr-1">
										<i class="icon-cross2"></i> Cancel
									</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
