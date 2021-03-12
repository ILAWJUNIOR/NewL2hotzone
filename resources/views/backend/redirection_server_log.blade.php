@extends('backend.common.main')

@section('title', 'Server ')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ trans('lang.servers') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li><a href="#">{{ trans('lang.server') }}</a></li>
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
              <h3 class="box-title">{{ trans('lang.server') }} {{ trans('lang.list') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.server_name') }} </th>
                  <th>{{ trans('lang.no_of_user_access_server') }}</th>
                </tr>
                </thead>
                <tbody>
                  {{ csrf_field() }}
                  @if(!empty($servers))
                  @foreach($servers as $key=>$value)
                    <tr>
                    <td>{{ $value['server_name'] }}</td>
                    @php $counter=0; @endphp
                    @foreach($redirection_counter as $counters)
                      @if($counters->server_id==$value['id'])
                          @php  $counter=$counters->counter;   @endphp
                      @endif

                    @endforeach
                    <td>{{ $counter  }}</td>
                    </tr>
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                 
                  <th>{{ trans('lang.server_name') }} </th>
                  <th>{{ trans('lang.no_of_user_access_server') }}</th>
               
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
  
  </script>
  @endsection
