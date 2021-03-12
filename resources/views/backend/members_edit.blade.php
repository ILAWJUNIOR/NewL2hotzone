@extends('backend.common.main')

@section('title', 'Members')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Member Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Member</a></li>
        <li class="active">Details</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Edit Member Details</h3>
	            </div>
            <!-- /.box-header -->
	            <div class="box-body">
                @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{  Session::get('success') }}
                  </div>
                @endif
                 @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> {{  Session::get('error') }}
                  </div>
                @endif

                <form action="{{ url('/costa/members/edit') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="member_name">Username</label>
                    <input type="text" value="{{ $member_details->member_name }}" class="form-control" id="member_name" placeholder="Enter Username" name="member_name">
                    @if($errors->has('member_name'))<p style="color:red">{{ $errors->first('member_name') }}</p>@endif
                  </div>
                  <div class="form-group">
                    <label for="email_address">Email</label>
                    <input type="email" class="form-control" value="{{ $member_details->email_address }}" id="email_address" placeholder="Enter Email" name="email_address">
                     @if($errors->has('email_address'))<p style="color:red">{{ $errors->first('email_address') }}</p>@endif
                    <input type="hidden" name='member_id' value="{{ $member_details->id_member }}" />

                  </div>
                  <div class="form-group">
                    <label for="member_name">Password</label>
                    <input type="password"  class="form-control" id="password" name="password">
                    @if($errors->has('password'))<p style="color:red">{{ $errors->first('password') }}</p>@endif
                  </div>
                   <div class="form-group">
                      <label for="member_name">Confirm Password</label>
                      <input type="password"  class="form-control" id="password_confirmation" name="password_confirmation">
                      @if($errors->has('password_confirmation'))<p style="color:red">{{ $errors->first('password_confirmation') }}</p>@endif
                      <br>
                      <p><b style="color:red">(Only if you want to change password then enter new password or keep it null. )</b></p>
                  </div>
                  
                  <button type="submit" class="btn btn-success">Submit</button>
               </form>
              </div>
          </div>
        </div>
      </div>
    </section>
</div> 
@endsection   
@section('scripts')
<script type="text/javascript">
</script>
@endsection      
