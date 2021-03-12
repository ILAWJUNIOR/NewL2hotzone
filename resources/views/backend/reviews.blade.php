@extends('backend.common.main')

@section('title', 'Reviews ')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ trans('lang.reviews') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li><a href="#">{{ trans('lang.reviews') }}</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ trans('lang.reviews') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('lang.reviews') }}</th>
                  <th>{{ trans('lang.created_date') }}</th>
                  <th>{{ trans('lang.action') }}</th>
                </tr>
                </thead>
                <tbody>
                  {{ csrf_field() }}
                  @if(!empty($reviews))
                  @foreach($reviews as $key=>$value)
                    <tr>
                    <td>{{ $value['review'] }}</td>
                    <td>{{ $value['created_at'] }}
                    </td>
                    <td>   <a onclick="$(this).parent().parent().remove();deleteItem({{$value['id']}});" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('lang.delete') }}</a>
                    @if($value['status'])
                    <a href="{{ url('costa/reviews/inactive',$value['id'])}}" class="btn btn-success"></i>{{ trans('lang.active') }}</a>
                    @else
                    <a href="{{ url('costa/reviews/active',$value['id'])}}" class="btn btn-danger"></i>{{ trans('lang.inactive') }}</a>
                    @endif
                     
                    </td>
                    </tr>
                  @endforeach
                  @endif
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>{{ trans('lang.reviews') }}</th>
                  <th>{{ trans('lang.created_date') }}</th>
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
    function deleteItem(review_id = '') 
    {

      if (confirm("{{ trans('lang.are_you_sure') }}")) 
      {
            $.ajax({
            type:'post',
                url:"{{ url('costa/reviews/delete')}}",// put your real file name 
                data:{review_id: review_id, _token : $("input[name=_token]").val()},
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
