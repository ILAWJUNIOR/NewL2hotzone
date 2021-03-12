@extends('backend.common.main')

@section('title', 'Stream Advertisement List')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ trans('lang.stream') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li class="active">{{ trans('lang.stream') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ trans('lang.stream') }} {{ trans('lang.advertisement') }} {{ trans('lang.list') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.title') }} {{ trans('lang.name') }}</th>
                  <th>{{ trans('lang.stream_url') }}</th>
                  <th>{{ trans('lang.expire_date') }}</th>
                  <th>{{ trans('lang.payment_status') }}</th>
                  <th>{{ trans('lang.status') }}</th>
                  <th>{{ trans('lang.action') }}</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($stream_list as $list)
                  @php
                        $date = \Carbon\Carbon::today();

                      
                  @endphp
                  @if($list->delete_flag == "0")
                  <tr>
                    <td>{{ $list->title }}</td>
                    <td>{{ $list->url }}</td>
                    <td>{{ $list->expired_date }}</td>
                    
                      @if($list->verify == "1")
                    <td><a class="btn btn-success" style="width: 80px;"></i>{{ trans('lang.success') }}</a></td>
                    @else
                    <td><a class="btn btn-danger" style="width: 80px;"></i>{{ trans('lang.failed') }}</a></td>
                    @endif
                    <td>
                      @if($list->expired_date < $date)
                        <a href="{{ url('costa/stream/reactive',$list->id)}}" class="btn btn-danger" style="width: 100px;"></i>Deactivated</a>
                       @elseif( $list->status == "0")
                    <a href="{{ url('costa/stream/active',$list->id)}}" class="btn btn-danger" style="width: 80px;"></i>{{ trans('lang.inactive') }}</a>
                     @elseif($list->status == "1")
                    <a href="{{ url('costa/stream/inactive',$list->id)}}" style="width: 80px;"  class="btn btn-success"></i>{{ trans('lang.active') }}</a>
                    @endif
                  </td>
                  <td>
                     <a href="{{ url('costa/stream/edit',$list->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a>
                    <a href="{{ url('costa/stream/delete',$list->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('lang.delete') }}</a></td>

                  </tr>
                  @endif

                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>{{ trans('lang.title') }} {{ trans('lang.name') }}</th>
                  <th>{{ trans('lang.stream_url') }}</th>
                  <th>{{ trans('lang.expire_date') }}</th>
                  <th>{{ trans('lang.payment_status') }}</th>
                  <th>{{ trans('lang.status') }}</th>
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
    function deletePremium(text_id = '') 
    {

      if (confirm("{{ trans('lang.are_you_sure') }}")) 
      {
            $.ajax({
            type:'post',
                url:"{{ url('costa/premium-advertisement/delete')}}",// put your real file name 
                data:{text_id: text_id, _token : $("input[name=_token]").val()},
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
