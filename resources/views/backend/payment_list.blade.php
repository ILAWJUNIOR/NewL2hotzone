@extends('backend.common.main')

@section('title', 'Payment ')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ trans('lang.payment') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">{{ trans('lang.payment') }}</a></li>
        <li class="active">{{ trans('lang.list') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ trans('lang.payment') }} {{ trans('lang.list') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.username') }}</th>
                  <th>{{ trans('lang.token') }}</th>
                  <th>{{ trans('lang.payment') }} {{ trans('lang.date') }}</th>
                  <th>{{ trans('lang.amount') }}</th>
                  <th>{{ trans('lang.status') }}</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  {{ csrf_field() }}
                  @if(!empty($payment))

                  @foreach($payment as $key=>$value)
                   
                    <tr>
                    <td>{{ $value->member_name }}</td>
                    <td>{{ $value->token }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->amount }}</td>
                    <td>@if($value->verify == null ) <a class="btn btn-warning">{{ trans('lang.failed') }}</a> @else <a class="btn btn-success">{{ trans('lang.completed') }}</a> @endif</td>
                   <!--  <td>  <a onclick="deleteItem({{$value->id}});" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    
                    </td> -->
                    </tr>
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>{{ trans('lang.username') }}</th>
                  <th>{{ trans('lang.token') }}</th>
                  <th>{{ trans('lang.payment') }} {{ trans('lang.date') }}</th>
                  <th>{{ trans('lang.amount') }}</th>
                  <th>{{ trans('lang.status') }}</th>
                  <!-- <th>Action</th> -->
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
    /*$('#example2').dataTable( {
    "order": [[ 2, 'asc' ]]
} );*/
    function deleteItem(server_id = '') 
    {

      if (confirm("{{ trans('lang.are_you_sure') }}")) 
      {
            $.ajax({
            type:'post',
                url:"{{ url('costa/server/delete')}}",// put your real file name 
                data:{server_id: server_id, _token : $("input[name=_token]").val()},
                success:function(msg)
                {

                   alert("{{ trans('lang.suceessfully_deleted') }}");
                }
         });
      }
      return false;
    }
  </script>
  @endsection
