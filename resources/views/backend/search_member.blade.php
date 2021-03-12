 <table id="members_list" class="table table-bordered table-hover">
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
                {!! $members->appends($_GET)->render() !!}