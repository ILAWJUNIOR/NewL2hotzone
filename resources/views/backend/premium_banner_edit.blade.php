@extends('backend.common.main')
@section('title', 'Text Advertisement Manage ')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Premium Advertisement
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Advertisement</a></li>
        <li class="active">Premium</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if(Session::has('flash_success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('flash_success') }}
        </div>
      @endif
      @if(Session::has('flash_error'))
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_error') }}
          </div>
      @endif
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Premium Advertisement</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             
            
            <form method="post" enctype=multipart/form-data action="{{ url('costa/premium-advertisement_update')}}">
              {{ csrf_field() }}
            <div class="row">
              <input type="hidden" name="id" value="{{ $data['ad_details']->main_id}}">
            <div class="form-group">
              <div class="col-md-12">
                <label>Servers</label>
               
                 <select class="form-control my-3" name="server_id">
                    <option  disabled>Select non Premium server</option>

                    @foreach($data['server_list'] as $server1=>$value)
                    
                        <option {{ ($data['ad_details']->server_id == $server1) ? 'selected' : '' }} value="{{ $server1 }}" >{{ $value }}</option>

                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Premium period</label>
                   <select class="form-control" id="exampleFormControlSelect1" name="months">
                    <option selected disabled>Please select Premium period</option>
                    @foreach($data['premuim'] as $single)
                    <option value="{{ $single->id }}" data-price="{{ $single->value }}" data-datys="{{ $single->days }}">{{ $single->name }}</option>
                    @endforeach

                  </select>
              </div>
            </div>
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <button class="btn btn-primary" id="addserver_submit" type="submit">Update</button>
                  
              </div>
            </div>
          </div>
        
      
          </form>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

     
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@section('scripts')
<style>
option.alread_selected {
    color: #fd0101;
}</style>
<script>
    



  
</script>
@endsection

