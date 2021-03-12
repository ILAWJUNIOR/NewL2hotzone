@extends('backend.common.main')

@section('title', 'Server ')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ trans('lang.server') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li><a href="#"> {{ trans('lang.server') }}</a></li>
        <li class="active"> {{ trans('lang.list') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ trans('lang.server') }} {{ trans('lang.list') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.server_name') }} </th>
                  <th>{{ trans('lang.user') }}</th>
                  <th>{{ trans('lang.server_platform') }}</th>
                  <th>{{ trans('lang.type') }}</th>
                 
                  <th>{{ trans('lang.action') }}</th>
                </tr>
                </thead>
                <tbody>
                  {{ csrf_field() }}
                  @if(!empty($servers))
                  @foreach($servers as $key=>$value)
                    <tr>
                    <td>{{ $value['server_name'] }}</td>
                    <td>{{ ucfirst($value['member_name']) }}
                    </td>
                    <td>{{ $value['serverplatform'] }}</td>
                    <td>{{ $value['type'] }}</td>
                   
                    <td>  <a href="{{ url('costa/server/edit',$value['id'])}}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a> <a onclick="$(this).parent().parent().remove();deleteItem({{$value['id']}});" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('lang.delete') }}</a>
                    @if($value['status'])
                    <a href="{{ url('costa/server/inactive',$value['id'])}}" class="btn btn-success"></i>{{ trans('lang.approve') }}</a>
                    @else
                    <a href="{{ url('costa/server/active',$value['id'])}}" class="btn btn-danger"></i>{{ trans('lang.pending') }}</a>
                    @endif
                     
                    </td>
                    </tr>
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                   <th>{{ trans('lang.server_name') }} </th>
                  <th>{{ trans('lang.user') }}</th>
                  <th>{{ trans('lang.server_platform') }}</th>
                  <th>{{ trans('lang.type') }}</th>
                 
                  <th>{{ trans('lang.action') }}</th>
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
