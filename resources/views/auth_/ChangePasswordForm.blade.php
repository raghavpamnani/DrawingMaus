@include('template.header')
@include('template.head')
@include('template.sidebar',array('p3'=>'active'))
<div class="content-wrapper">
	 <section class="content-header">
      <!-- <h1>
        Dashboard
         
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>	
		<!-- input-forms -->
	<section class="content">
		<div class="form-group">
			@if(count($errors)>0)
				@foreach($errors->all() as $error)
					<div class="alert alert-warning" >{{ $error }}</div>
				@endforeach
			@endif  
		</div>
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            
            <form class="form-horizontal" action="{{ url('/') }}/UpdatePassword" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="HEAD">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input  type="password" class="form-control" required name="password"  class="form-control" id="pass"  placeholder="New Password ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confirm New Password</label>

                  <div class="col-sm-10">
                    <input  type="password" class="form-control" required name="confirm_password"  class="form-control1" id="cpass"  placeholder="Confirm new Password ">
                    <div class="alert alert-warning" id="error" style="display:none;margin-top: 10px" ></div>
                  </div> 
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="col-sm-2"></div>
              	<button type="submit" id="updatePassword"  name="update" class="btn btn-info">Update</button>
                <a href="{{ url('/') }}" class="btn btn-default  pull-right">Cancel</a>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
	</section>
@include('template.footer')
<script type="text/javascript">
	 
	$("#updatePassword").click(function(){
		if($("#pass").val() !== $("#cpass").val()){
			$("#error").text('Password and Confirm password should be matched!');
			$("#error").css('display','block');
			return false;
		} 
	});
</script>		 