@extends('backend.common.main')

@section('title', 'Text Advertisement List')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Text Advertisement List
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Advertisement</a></li>
        <li class="active">Text</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Text Advertisement List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Server Name</th>
                  <th>Expire Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                        $date = \Carbon\Carbon::today();
                      
                  @endphp

                  {{ csrf_field() }}
                  @if(!empty($addlist))
                  @foreach($addlist as $key1=>$value1)
                  <?php
                  //echo '<pre>';print_r($value1->Name) ;die;
                  ?>
                    <tr>
                    <td>{{ $value1->Name }}</td>
                    <td>{{ date('d-m-Y',strtotime($value1->till_date)) }}</td>
                    
                    <td>  <a href="{{ url('costa/banner-advertisement/edit',$value1->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a> <a onclick="$(this).parent().parent().remove();deleteText({{$value1->id}});" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    
                    @if($date->greaterThan($value1->till_date))
                      <a href="{{ url('costa/advertisement/banner-advertisement-add-active',$value1->id)}}" class="btn btn-danger">Deactivated</a>
                    
                    @elseif($value1->active_status != '1')
                    <a href="{{ url('costa/banner-advertisement/active',$value1->id)}}" class="btn btn-danger"></i>Inactive</a>
                    @else
                    <a href="{{ url('costa/banner-advertisement/inactive',$value1->id) }}" class="btn btn-success"></i>Active</a>
                    
                    @endif


                    </td>
                  
                    </tr>
                 
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Server Name</th>
                  <th>Expire Date</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('scripts')
  <script type="text/javascript">
    function deleteText(text_id = '') 
    {

      if (confirm("Are you sure?")) 
      {
            $.ajax({
            type:'post',
                url:"{{ url('costa/banner-advertisement/delete')}}",// put your real file name 
                data:{text_id: text_id, _token : $("input[name=_token]").val()},
                success:function(msg)
                {

                   alert("Suceessfully deleted");
                }
         });
      }
      return false;
    }
  </script>
  @endsection
