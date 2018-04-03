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
    a.btn:hover {
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
    .userImage{
        max-height: 70px;
    }
</style>

<style type="text/css">
  #msform fieldset:not(:first-of-type) {
    display: none;
  }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

@extends('layouts.app')
 
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"  style="background-color:#20caa9">Profile Setting</div>
     
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
                        <form class="form-horizontal" method="POST" action="{{ url('/').'/editProfile' }}"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
     
                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">First Name</label>
     
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" value="{{$data->firstname}}" name="firstname" required>
     
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
                                        <input id="middlename" type="text" class="form-control" value="{{$data->middlename}}" name="middlename">
            
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
                                    <input id="lastname" type="text" class="form-control" value="{{$data->lastname}}" name="lastname" required>
        
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
     
                            <div class="form-group">
                                <label for="landline" class="col-md-4 control-label">Landline No.</label>
     
                                <div class="col-md-6">
                                    <input id="landline" type="number" class="form-control" name="landline" value="{{$data->landline}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="landline" class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender" value="{{$data->gender}}" >
                                        <option value="Female" {{ $data->gender === "Female"? 'selected' : '' }}>Female</option>
                                        <option value="Male" {{ $data->gender === "Male"? 'selected' : '' }}>Male</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="dob" class="col-md-4 control-label">Date of Birth</label>
                                    <div class="col-md-6">
                                            <input id="dob" type="date" class="form-control" value="{{$data->dob}}" name="dob">
                                            @if ($errors->has('dob'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="address" class="col-md-4 control-label">Address</label>
                                    <div class="col-md-6">
                                            <textarea class="form-control" rows="5" name="address">{{$data->address}}</textarea>
                
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="col-md-4 control-label">Photo</label>
                                <div class="col-md-6">
                                    <div class="col-md-3">
                                        <div class="userImg">
                                            <input type="hidden" name="oldImage" value="{{$data->avatar}}">
                                            <img src="{{ url('/').$data->avatar}}" class="userImage thumbnail">
                                        </div>
                                     </div> 
                                    <div class="col-md-9">
                                        <input  name="image" type="file" class="form-control" value="{{$data->avatar}}">
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary a-btn-slide-text">
                                        Save
                                    </button>
                                    {{-- <button href="{{ route('login') }}" type="button" class="btn btn-primary a-btn-slide-text">
                                        Cancel
                                    </button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
