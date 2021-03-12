@extends('backend.common.main')

@section('title', 'Premium Advertisement List')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ trans('lang.premium') }} {{ trans('lang.advertisement') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li><a href="#">{{ trans('lang.advertisement') }}</a></li>
        <li class="active">{{ trans('lang.premium') }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> {{ trans('lang.premium') }} {{ trans('lang.advertisement') }} {{ trans('lang.list') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.server_name') }}</th>
                  <th>{{ trans('lang.username') }}</th>
                  <th>{{ trans('lang.expire_date') }}</th>
                  <!-- <th>Status</th> -->
                  <th>{{ trans('lang.action') }}</th>
                </tr>
                </thead>
                <tbody>
                  @php
                        $date = \Carbon\Carbon::today();
                      
                  @endphp

                  {{ csrf_field() }}
                  @if(!empty($mypre))
                  @foreach($mypre as $key1=>$value1)
                  <?php
                  //echo '<pre>';print_r($value1->Name) ;die;
                  ?>
                    <tr>
                    <td>{{ $value1->server_name }}</td>
                    <td>{{ $value1->member_name }}</td>
                    <td>{{ date('d-m-Y',strtotime($value1->till_date)) }}</td>
                    <!-- <td>@if($date->greaterThan($value1->till_date))
                      <a class="btn btn-danger">Deactivated</a>
                    
                    @else
                    <a class="btn btn-success">Activated</a>
                    
                    @endif</td>-->
                    <td>   <a href="{{ url('costa/premium-advertisement/edit',$value1->main_id)}}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a> <a onclick="$(this).parent().parent().remove();deletePremium({{$value1->main_id}});" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('lang.delete') }}</a>

                    @if($date->greaterThan($value1->till_date))
                      <a href="{{ url('costa/premium-advertisement/premium-advertisement-add-active',$value1->main_id)}}" class="btn btn-danger">{{ trans('lang.deactivated') }}</a>
                    
                    @elseif($value1->active_status != '1')
                    <a href="{{ url('costa/premium-advertisement/active',$value1->main_id)}}" class="btn btn-danger"></i>{{ trans('lang.deactivated') }}</a>
                    @else
                    <a href="{{ url('costa/premium-advertisement/inactive',$value1->main_id) }}" class="btn btn-success"></i>{{ trans('lang.active') }}</a>
                    
                    @endif
                    </td>
                  
                    </tr>
                 
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>{{ trans('lang.server_name') }}</th>
                  <th>{{ trans('lang.username') }}</th>
                  <th>{{ trans('lang.expire_date') }}</th>
                  <!-- <th>Status</th> -->
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
