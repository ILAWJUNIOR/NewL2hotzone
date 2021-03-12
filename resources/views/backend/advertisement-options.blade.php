@extends('backend.common.main')

@section('title', 'Text Advertisement ')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ trans('lang.text_ad') }} {{ trans('lang.advertisement') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> {{ trans('lang.text_ad') }} {{ trans('lang.advertisement') }}</a></li>
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
              <h3 class="box-title">{{ trans('lang.text_ad') }} {{ trans('lang.advertising') }} {{ trans('lang.options') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.name') }}</th>
                  <th>{{ trans('lang.category') }}</th>
                  <th>{{ trans('lang.ctype') }}</th>
                  <th>{{ trans('lang.cost') }}</th>
                  <th>{{ trans('lang.action') }}</th>
                  
                </tr>
                </thead>
                <tbody>
                  {{ csrf_field() }}
                  @if(!empty($allads))
                  @foreach($allads as $key=>$value)
                    <tr>
                    <td>{{ $value['Name'] }}</td>
                    <td>{{ ucfirst($value['category']) }}
                    </td>
                    <td>{{ $value['cType'] }}</td>
                    <td>{{ $value['cost'] }}</td>
                    <td>  <a href="{{ url('costa/textoptions/edit',$value['id'])}}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a> <a onclick="$(this).parent().parent().remove();deleteItem({{$value['id']}});" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('lang.delete') }}</a>
                    @if($value['status'])
                    <a href="{{ url('costa/textoptions/inactive',$value['id'])}}" class="btn btn-success"></i>{{ trans('lang.active') }}</a>
                    @else
                    <a href="{{ url('costa/textoptions/active',$value['id'])}}" class="btn btn-danger"></i>{{ trans('lang.inactive') }}</a>
                    @endif
                     
                    </td>
                    </tr>
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>{{ trans('lang.name') }}</th>
                  <th>{{ trans('lang.category') }}</th>
                  <th>{{ trans('lang.ctype') }}</th>
                  <th>{{ trans('lang.cost') }}</th>
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
    function deleteItem(textoption_id = '') 
    {

      if (confirm("{{ trans('lang.are_you_sure') }}")) 
      {
            $.ajax({
            type:'post',
                url:"{{ url('costa/textoptions/delete')}}",// put your real file name 
                data:{textoption_id: textoption_id, _token : $("input[name=_token]").val()},
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
