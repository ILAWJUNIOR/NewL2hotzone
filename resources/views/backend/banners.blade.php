@extends('backend.common.main')

@section('title', 'Advertisement ')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{ trans('lang.banner') }}  {{ trans('lang.advertisement') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li><a href="#">{{ trans('lang.advertisement') }}</a></li>
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
              <h3 class="box-title">{{ trans('lang.advertisement') }} {{ trans('lang.list') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.server_name') }}</th>
                  <th>{{ trans('lang.from_date') }}</th>
                  <th>{{ trans('lang.till_date') }}</th>
                  <th>{{ trans('lang.website') }}</th>
                  <th>{{ trans('lang.action') }}</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  // echo "<pre>";
                  // print_r($banners);
                  // die;
                  ?>
                  @php
                        $date = \Carbon\Carbon::today();
                      
                  @endphp
                  {{ csrf_field() }}
                  @if(!empty($banners))
                  @foreach($banners as $key=>$value)
                    <tr>
                      <?php

                        $server_name = DB::table('servers')->where("id","=",$value['server_id'])->get();
                        
                      ?>

                    <td>{{ $server_name[0]->server_name }}</td>
                    <td>{{ $value['from_date'] }}
                    </td>
                    <td>{{ $value['till_date'] }}</td>
                    <td>{{ $value['website'] ? $value['website'] :  trans('lang.not_available') }}</td>
                    <td> <a href="{{ url('costa/advertisement/edit',$value['id'])}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a> <a onclick="$(this).closest('tr').remove();deleteAd({{$value['id']}});" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('lang.delete') }}</a>
                    @if($date->greaterThan($value['till_date']))
                    <a href="{{ url('costa/advertisement/ad-active',$value['id'])}}" class="btn btn-danger">{{ trans('lang.deactivate') }}</a>
                    @elseif($value['active_status'])
                    <a href="{{ url('costa/advertisement/inactive',$value['id'])}}" class="btn btn-success"></i>{{ trans('lang.active') }}</a>
                    @else
                    <a href="{{ url('costa/advertisement/active',$value['id'])}}" class="btn btn-danger"></i>{{ trans('lang.inactive') }}</a>
                    @endif
                     
                    </td>
                    </tr>
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>{{ trans('lang.server_name') }}</th>
                  <th>{{ trans('lang.from_date') }}</th>
                  <th>{{ trans('lang.till_date') }}</th>
                  <th>{{ trans('lang.website') }}</th>
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
    function deleteAd(ad_id = '') 
    {

      if (confirm("{{ trans('lang.are_you_sure') }}")) 
      {
            $.ajax({
            type:'post',
                url:"{{ url('costa/advertisement/delete')}}",// put your real file name 
                data:{ad_id: ad_id, _token : $("input[name=_token]").val()},
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