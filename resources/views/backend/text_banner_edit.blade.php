@extends('backend.common.main')
@section('title', 'Text Advertisement Manage ')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Advertisement
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Advertisement</a></li>
        <li class="active">Text</li>
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
          <h3 class="box-title">Edit Text Advertisement</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             
            
            <form method="post" enctype=multipart/form-data action="{{ url('costa/banner_advertisement_update')}}">
              {{ csrf_field() }}
            <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Advertisement</label>
                <input type="hidden" name="id" value="{{ $ad_details->id }}">
                 <select class="form-control my-3">
                    <option>Text Advertising available on i2topzone.com</option>
                </select> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Add Location</label>
                   <select id="addselection" class="form-control" name="addlocation">
                    <option  disabled>Select Add Location</option>
                     @php
                        $date = \Carbon\Carbon::today();
                      
                     @endphp
                    @foreach($addlist as $list)
                    <?php //echo '<pre>';print_r($list[0]['id']);die; ?>
                     @if($date->greaterThan($list[0]['till_date']))
                          <option {{ ($ad_details->textad_id ==  $list[0]['id']) ? 'selected' : ''}}  value="{{ $list[0]['id'] }}" data-cost="{{ $list[0]['cost'] }}" data-disabled=true class="alread_selected" data-tilldate="{{ $list[0]['till_date'] }} GMT" data-image="{{ $list[0]['image'] }}">{{ $list[0]['Name'] }}</option>
                      @else
                     
                          <option {{ ($ad_details->textad_id ==  $list[0]['id']) ? 'selected' : ''}} value="{{ $list[0]['id'] }}" data-cost="{{ $list[0]['cost'] }}" data-image="{{ $list[0]['image'] }}">{{ $list[0]['Name'] }}</option>
                      @endif
                    @endforeach
                </select>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Select Period</label>
                <select class="form-control" id="exampleFormControlSelect1" name="days">
                  @for ($i=10;$i<=50;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
            </select>
              </div>
            </div>
          </div>
         <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <label>Select Server</label>
              <select class="form-control my-3" name="server_id">
                <option  disabled>Select server</option>
                @foreach($servers as $server_id=>$value)
                    
                    <option {{ ($ad_details->server_id ==  $server_id) ? 'selected' : ''}} value="{{ $server_id }}" >{{ $value }}</option>

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

