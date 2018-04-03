<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
<style type="text/css">
	.table > thead > tr > th
	{
		font-size: 16px;
	}
    .userImage{
        width:80%;
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

</style>

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
				@if(session()->has('message'))
					<div class="alert alert-danger" id="errorMsg" style="margin:10px">{{ session()->get('message') }}</div>
				@endif
                    <div class="panel-heading"  style="background-color:#20caa9"><h4>LIST OF PARTICIPATES</h4></div>

                <div class="panel-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!--  <div class="form-group">
						@if(count($errors)>0)
							@foreach($errors->all() as $error)
								<div class="alert alert-warning" >{{ $error }}</div>
							@endforeach
						@endif  
                    </div>-->
                    
                    <table class="table table-hover">
                        <thead class="thead-dark" >
                            <th  scope="row">#</th>
                            <th scope="row">Image</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Relation</th>
                            <th>Date Of Registration</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($participants as $key=> $participant)
                           
                            <tr>
                                <td>{{ ++$key }}.</td>
                                <td style="width:10%"><img src="{{ URL::to('/') }}{{$participant->avatar}}" class="userImage thumbnail"></td>
                                <td>{{$participant->firstname}} {{$participant->lastname}}</td>
                                <td>{{$participant->gender}}</td>
                                <td>{{$participant->dob}}</td>
                                <td>{{Carbon\Carbon::parse($participant->dob)->diff(Carbon\Carbon::now())->format('%d days,%m months,%y years')}}</td>
                                <td>{{$participant->relation}}</td>                                
                                <td>{{Carbon\Carbon::parse($participant->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{action('ParticipantController@downloadPDF', $participant->id)}}" class="btn btn-success a-btn-slide-text"><span  class="glyphicon glyphicon-download-alt"  aria-hidden="true"></span><span><strong> PDF</strong></span></a>

                                    <a href="{{action('ParticipantController@edit', $participant->id)}}" class="btn btn-primary a-btn-slide-text"><span  class="glyphicon glyphicon-edit"  aria-hidden="true"></span> <span><strong>Edit</strong></span></a>

                                  
                                   

                                   <a data-toggle="modal" data-target="#yourModal{{$participant->id}}" class="btn btn-danger a-btn-slide-text"><span  class="glyphicon glyphicon-cross"  aria-hidden="true"></span> <span><strong>Upload</strong></span></a>
                                </td>
                            </tr>
                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">	
            <div class="col-md-12">
                <a href="{{url('/dashboard')}}" style="float: right;" class="btn btn-primary a-btn-slide-text"><strong> REGISTER MORE</strong></a>
            </div>
    </div>
    @foreach($participants as $key=> $participant)
        <!-- Pop Up Modal section -->
        <div class="modal fade" id="yourModal{{$participant->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload Your Drawing</h4>
                </div>
                <form class="form-horizontal" method="post" action="{{action('ParticipantController@upload', $participant->id)}}"  enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <label for="drawing_sheet" class="col-md control-label">Uplaod Drawing</label>
                        <input class="form-control" type="file" name="drawing_sheet" id="drawing_sheet"/> 
                          
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary a-btn-slide-text"><strong>Save</strong></a>
                        <a class="btn btn-default" data-dismiss="modal"><strong>Close</strong></a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    @endforeach
  
</div>
 @endsection
    