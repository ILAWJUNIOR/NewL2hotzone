@extends('backend.common.main')
@section('title', 'Text Advertisement')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Advertisement
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Text Advertisement</a></li>
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
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Text Advertisement Option</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             
            
            <form method="post" enctype=multipart/form-data action="{{ url('costa/textoptions_update')}}">
              {{ csrf_field() }}
            <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Name</label>
                <input type="text" name="name" value="{{ $textoptions['Name'] }}"  class="form-control my-3" required>
                 <input type="hidden" name="id" value="{{ $textoptions['id'] }}">
                 
                 
              </div>
            </div>
          </div>
           <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>cType</label>
                  <input type="text" name="ctype" value="{{ $textoptions['cType'] }}" class="form-control my-3" required>
              </div>
            </div>
          </div>
           <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Category</label>
                   {{ Form::select('category', [
                        'newest' => 'Newest', 
                        'premium' => 'Premium',
                        'top' => 'Top',
                        'upcoming' => 'Upcoming'
                        ],$textoptions['category'], ['placeholder' => 'Select Category', 'class' => 'form-control selectpicker '.$errors->has('category','is-invalid'), 'id' => 'category',"required"]) }}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <label>Cost</label>
                <input type="text" value="{{ $textoptions['cost'] }}" class="form-control my-3" required name="cost" placeholder="Please enter the cost">
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
                
                <img src="{{ url('/') }}/{{ ($textoptions['image']!='') ? $textoptions['image'] : 'no-image.png' }}" alt="" id="addshow" style="width: 20%;height: 200px;">
              </div>
            </div>
          </div>
          
         
         
          <div class="row">
            <div class="form-group">
              <div class="col-md-12">
                <button class="btn btn-primary" id="textoption_submit" type="submit">Update</button>
                  
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

