@extends('backend.common.main')

@section('title', 'Members')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ trans('lang.member') }} {{ trans('lang.list') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> {{ trans('lang.home') }}</a></li>
        <li><a href="#">{{ trans('lang.member') }}</a></li>
        <li class="active">{{ trans('lang.list') }}</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title"> {{ trans('lang.member') }} {{ trans('lang.list') }}</h3>
                <input id="search_members" type="text" name="search_members" style="float: right;" placeholder="Search">
	            </div>
            <!-- /.box-header -->
	            <div class="box-body" id="members_list">
                
                
	                <table class="table table-bordered table-hover">
		                <thead>
			                <tr>
			                  <th>{{ trans('lang.name') }}</th>
			                  <th>{{ trans('lang.email') }}</th>
			                  <th>{{ trans('lang.no_of_server') }}</th>
			                  <th>{{ trans('lang.action') }}</th>
                        <th>{{ trans('lang.coins') }}</th>
			                </tr>
		                </thead>
		                <tbody>
		                	  {{ csrf_field() }}
		                	@foreach($members as $member)
			                  <tr id="delete_{{$member->id_member}}">	
			                  	<td>{{ $member->member_name }}</td>
			                  	<td>{{ $member->email_address }}</td>
                          <?php $count=0 ?>

                          @if(!empty($server_counter))
                          @foreach($server_counter as $server)
                          @if($server->user_id==$member->id_member) <?php $count=$server->counter; ?>  @endif

                          @endforeach
                          @endif
			                  	<td>{{ $count }}</td>
			                  	 <td> <a href="{{ url('/costa/members/edit/'.$member->id_member) }}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a> 
                                      <a id="banned_{{$member->id_member}}" onclick="banmember({{$member->id_member}})" class="btn" style="background-color: #fb4405;color:white"> <i class="fa fa-ban "></i> @if($member->is_banned==1) {{ trans('lang.banned') }} @else {{ trans('lang.ban') }} @endif</a> 
                                      <?php $money=0; ?>
                                      @if(!empty($usermoney))
                                        @foreach($usermoney as $umoney)
                                          @if($umoney->user_id==$member->id_member)
                                            @php $money=$umoney->amount; @endphp
                                          @endif
                                        @endforeach
                                      @endif
                                      <a  onclick="deletemember({{$member->id_member}})"  class="btn btn-danger"><i class="fa fa-trash "></i>  {{ trans('lang.delete') }}</a>
                                  </td>
                                  <td> <p data-toggle="modal" data-target="#myModal"  onclick='getuserdetails("<?php echo $member->id_member; ?>","<?php echo $money; ?>","<?php echo $member->member_name; ?>")' class='btn btn-success' id="user_money_{{$member->id_member}}" style="color: white"> $ {{$money}} </p></td>
			                  </tr>
			                  @endforeach
		                </tbody>
		                <tfoot>
		                	 <tr>
			                 <th>{{ trans('lang.name') }}</th>
                        <th>{{ trans('lang.email') }}</th>
                        <th>{{ trans('lang.no_of_server') }}</th>
                        <th>{{ trans('lang.action') }}</th>
                        <th>{{ trans('lang.coins') }}</th>
			                </tr>
		                </tfoot>
		            </table> 
                {!! $members->render() !!}
		        </div>
        	</div>
        </div>
     </div>  
    </section>
</div> 

<!-- -------------------------------  Update Money --------------------------------      --> 

<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"> {{ trans('lang.user_coin_details') }} </h3>
      </div>
      <div class="modal-body">
        <div class="status_message"></div>
        <form id="updateUserCoin">
           <div class="form-group">
            <label for="exampleInputEmail1"> {{ trans('lang.username') }} </label>
            <input readonly type="text" class="form-control" id="modal_user_name" name="username">
              <input  type="hidden" class="form-control" id="modal_user_id" name="user_id">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> {{ trans('lang.total_coin') }}</label>
            <input type="number" min=0 class="form-control" name="usercoin" id="modal_user_coin" placeholder="usercoin">
          </div>
            <button type="button" class="btn btn-success" onclick='updateUserCoin();'> {{ trans('lang.update_coin') }}</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> {{ trans('lang.close') }}</button>
      </div>
    </div>

  </div>
</div>

<style type="text/css">
  .modal-content {
    box-shadow: 1px 2px 13px 2px black;
}
</style>

<!-- -------------------------------  Update Money --------------------------------      --> 

@endsection
  @section('scripts')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">

    function getuserdetails(user_id="",user_money="",user_name="")
    {
          $('#modal_user_id').val(user_id);
          $('#modal_user_name').val(user_name);
          $('#modal_user_coin').val(user_money);
    }

    function updateUserCoin()
    {

      $('.status_message').html('');

//        0: {name: "username", value: "AbelFloren"}
//        1: {name: "user_id", value: "485"}
//        2: {name: "usercoin", value: "4"}
//        length: 3

      var formdata= $('form#updateUserCoin').serializeArray();
      var count=0;
      var  dataObj = {};
     $.each(formdata, function(i, field){
        dataObj[field.name] = field.value;
     });


       if(confirm('Are you sure ?'))
       {
              $.ajax({
                type:'post',
                  url:"{{ url('costa/members/updatecoin')}}",// put your real file name 
                  data:{userdata: dataObj, _token : $("input[name=_token]").val()},
                  success:function(msg)
                  {
                        if(msg)
                        {
                            $('#user_money_'+dataObj['user_id']).html('$ '+dataObj['usercoin']);
                            $('.status_message').html('<p style="color:green">'+"{{ trans('lang.success_payment_update_msg') }}"+'</p>');
                        }
                        else
                        {
                           $('.status_message').html('<p style="color:red">'+"{{ trans('lang.database_error') }}"+'</p>');
                        }
                  },
                });
       }

    }

  	function banmember(id='')
  	{
  		if(id!='')
  		{
  			if(confirm("{{ trans('lang.are_you_sure') }}"))
  			{
  				$.ajax({
	            	type:'post',
	                url:"{{ url('costa/members/ban')}}",// put your real file name 
	                data:{id: id, _token : $("input[name=_token]").val()},
	                success:function(msg)
	                {

                    console.log(msg);
                    console.log(JSON.parse(msg));


	                   if(JSON.parse(msg)=='0')
                     {
                        $('#banned_'+id).html('');
                        $('#banned_'+id).html('<i class="fa fa-ban"> </i> '+"{{trans('lang.banned')}}");
                     }
                     if(JSON.parse(msg)=='1')
                     {
                        $('#banned_'+id).html('');
                        $('#banned_'+id).html('<i class="fa fa-ban"></i>'+"{{trans('lang.ban')}}");

                     }
	                }
         		});
  			}
  			else
  			{
  				
  			}
  		}
  	}

  	function deletemember(id)
  	{
  		if(id!='')
  		{
  			if(confirm("{{ trans('lang.remove_user') }}"))
  			{
  				$.ajax({
	            	type:'post',
	                url:"{{ url('costa/members/delete') }}",// put your real file name 
	                data:{id: id, _token : $("input[name=_token]").val()},
	                success:function(msg)
	                {
                    console.log(msg);
	                   alert("{{ trans('lang.suceessfully_deleted') }}");
                     $('#delete_'+id).remove();
	                }
         		});
  			}
  			else
  			{
  				//alert(0);
  			}
  		}
  	}


      $('#search_members').keyup(function(){
      var query = $(this).val();
      // alert(query);
      fetch_member_data(query);
    });

    function fetch_member_data(query){
      $.ajax({
        url:"{{ url('costa/member_search') }}",
        method: 'GET',
        data:{query:query},
        // dataType:'json',
        success:function(data)
        {
          // console.log(data);
          $('#members_list').html(data);
        }
      })
    }
  </script>
  @endsection