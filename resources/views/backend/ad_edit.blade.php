@extends('backend.common.main')
@section('title', 'Server Manage ')
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
        <li class="active">Edit</li>
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
    @if ($message = Session::get('success1'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    @endif
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Advertisement</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             
            
            <form method="post" enctype=multipart/form-data action="{{ url('costa/advertisement_update')}}">
              {{ csrf_field() }}
            <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Banner Location</label>
                <input type="hidden" name="user_id" value="{{ $ad['user_id'] }}">
                 <input type="hidden" name="id" value="{{ $ad['id'] }}">
                 <select name="add_location" class="form-control" required >
                  <option disabled>Select Banner Location</option>
                      @foreach($banner_list as $banner)
                         
                          @if($banner->server_id != null)
                              <option  @if($banner->idc == $ad['bannerad_id']) {{ "selected"}} @endif  value="{{ $banner->idc }}" data-cost="{{ $banner->cost}}" data-image="{{ $banner->image }} " data-height="{{ $banner->bannerheight }} " data-widht="{{ $banner->bannerwidth }} "> {{ $banner->name }} </option>
                          @else
                              <option  @if($banner->idc == $ad['bannerad_id']) {{ "selected"}} @endif value="{{ $banner->idc }}" data-cost="{{ $banner->cost}}" data-image="{{ $banner->image }} " data-height="{{ $banner->bannerheight }} " data-widht="{{ $banner->bannerwidth }} "> {{ $banner->name }} </option>
                          @endif
                      @endforeach
                  </select>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Server</label>
                   <select class="form-control" name="server_id" required >
                  <option  disabled>Select server</option>
                  @foreach($server as $userserver)
                  <option @if($userserver->id == $ad['server_id']) {{ "selected"}} @endif  value="{{ $userserver->id }}">{{ $userserver->server_name }} </option>
                  @endforeach
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Website</label>
                <input type="url" value="{{ $ad['website'] }}" class="form-control my-3" required name="website" placeholder="http://yourdomain.com">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Image</label>
                 <input type="file" style="height: auto;" name="banner"  onchange="readURL(this)" accept="image/x-png,image/gif,image/jpeg"  class="form-control" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                
                <!-- <img src="{{ url('/images') }}/imagesAdd/{{ ($ad['liveimages']!='') ? $ad['liveimages'] : 'no-image.png' }}" alt="" id="addshow" style="width: 20%;height: 200px;"> -->
                <img src="{{ ($ad['liveimages']!='') ? $ad['liveimages'] : 'no-image.png' }}" id="addshow" style="width: 20%;height: 200px;"/>
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
          <!-- <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>From Date</label>
                <input type="text" class="form-control" name="From Date" value="{{ $ad['from_date']}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>To Date</label>
                <input type="text" class="form-control" name="To Date" value="{{ $ad['till_date']}}">
              </div>
            </div>
          </div> -->
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
<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#addshow').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection

