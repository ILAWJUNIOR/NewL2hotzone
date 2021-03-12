@extends('backend.common.main')
@section('title', 'Text Advertisement Manage ')
@section('content')
<style type="text/css">
  .emsg
  {
    color: red;
  }
</style>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stream Advertisement
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stream</li>
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
          <h3 class="box-title">Edit Stream </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             
            
            <form method="post" enctype=multipart/form-data action="{!! url('costa/stream_update/'.$stream_update[0]->id) !!}">
              {{ csrf_field() }}
            <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Title</label>
                 
                  {!! Form::text('twitch_title',$stream_update[0]->title,array('placeholder'=>"Twitch Title",'class'=>'form-control my-3','id'=>'twitch_title')) !!}

                 <p class="emsg">{{ $errors->first('twitch_title') }}</p>
                  
                </div>
              </div>
          </div>

          <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Url</label>
                 
                 {!! Form::url('twitch_url',$stream_update[0]->url,array('placeholder'=>"https://player.twitch.tv",'class'=>'form-control my-3','id'=>'twitch_url')) !!}
                
                 <p class="emsg">{{ $errors->first('twitch_url') }}</p>
                  
                </div>
              </div>
          </div>

           <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Select Cost</label>
                 <!-- <select class="form-control" id="exampleFormControlSelect1" id="streamprice"  name="streamprice">
                <option selected value="">Select Twitch Cost</option>
                <option value="5">5 Coins for 10 Days</option>
                <option value="10">10 Coins for 25 Days</option>
            </select> -->
            {!! Form::select('streamprice',array('5' => '5 Coins for 10 Days', '10' => '10 Coins for 25 Days'),$stream_update[0]->cost ,['class' => 'form-control'] )!!}
            <p class="emsg">{{ $errors->first('streamprice') }}</p>
                  
                </div>
              </div>
          </div>
           <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Select Location</label>
                  <select class="form-control" id="exampleFormControlSelect1" id="streamlocation" name="streamlocation">
                    @foreach($position as $key=>$value)

                 @if($key == $stream_update[0]->location)
                <option selected value="{{ $key }}">{{ $value }}</option>

                @endif
                @endforeach
                <option value="1">First</option>
                <option value="2">Second</option>
                <option value="3">Third</option>
                <option value="4">Fourth</option>
                <option value="5">Fifth</option>
                <option value="6">Sixth</option>
            </select>
             <!--  {!! Form::select('streamlocation',array(
              '1' => 'First', 
              '2' => 'Second',
              '3' => 'Third', 
              '4' => 'Fourth',
              '5' => 'Fifth', 
              '6' => 'Sixth'
              )
              ,$stream_update[0]->location,['class' => 'form-control'] )!!} -->



            <p class="emsg">{{ $errors->first('streamlocation') }}</p>
                  
                </div>
              </div>
          </div>
           <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Background Color</label>
                <input type="color" style="width: 70px;" class="form-control my-3"  id="bgcolor"  value="{{ old('bgcolor' , $stream_update[0]->bgcolor) }}" name="bgcolor"><p class="emsg">{{ $errors->first('bgcolor') }}</p>
                  
                </div>
              </div>
          </div>
           <div class="row">
              <div class="form-group">
                <div class="col-md-12">
                  <label>Text Color</label>
                <input type="color" style="width: 70px;" class="form-control my-3"  id="textcolor"value="{{ old('textcolor' , $stream_update[0]->textcolor) }}"name="textcolor"><p class="emsg">{{ $errors->first('textcolor') }}</p>
                  
                </div>
              </div>
          </div>
        
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Update</button>
                  
              </div>
            </div>
          </div>
          
              @if(isset($msg['error']))
            <div class="alert alert-danger fsize">
                <strong>Sorry! </strong>{{ $msg['error'] }}
            </div>
           @endif
         
        
      
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

