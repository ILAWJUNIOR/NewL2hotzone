@extends('layouts.layout')
@section('content')
    

<div class="maincontain container">
    <div class="space container" >
        <div class="all_server">
           
    <div class="middle-content">

    <div class="latest">
        <div class="box-1">
            <h4>{{ $serverDetails->server_name }}</h4>
            <div class="box-1-button-right">
                <a href="#" class="btn">{{ $serverDetails->chronicle }}</a>
                <a href="{{ url('/vote/id/'.$serverDetails->id) }}"><i class="fas fa-thumbs-up" style="background: none;"></i>
                {{ $serverDetails->total? $serverDetails->total : 'Like us!' }}</a>
            </div>

        </div>

        <div class="box-2">
            <div class="content py-3">
                <div class="row">
                    <div class="col-md-6">
                        <p class="content_1 py-3 mr-5"><i class="fas fa-plus-square pr-1"></i><b>Date Added:</b> {{ $serverDetails->created_at }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="content_4 py-3"><i class="fas fa-language pr-1"></i><b> Language :</b> {{ $serverDetails->lang }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="content_3 py-3 mr-5"><i class="fas fa-tv pr-1"></i><b>Website:</b> <a style="cursor: pointer;" target="_blank"  href="{{ $serverDetails->website }}">{{ $serverDetails->website }}</a></p>
                    </div>
                   <div class="col-md-6">
                        <p class="content_6 py-3"><i class="fas fa-globe-asia pr-1"></i><b>Geolocation :</b> {{ $serverDetails->country_name }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="content_5 py-3 mr-5"><i class="fas fa-sync-alt pr-1"></i><b>Server Status :</b> 
                            @php 
                             $color_code = $serverDetails->active_status ? 'green-class' : 'red-class';
                            @endphp
                            <span class="online {{$color_code}}">{{ $serverDetails->active_status? 'Online' : 'Offline' }} </span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="content_6 py-3"><i class="fa fa-fw fa-lg fa-server pr-1"></i><b>Platform / Type: </b> 
                        @if($serverDetails->serverplatform == 'L2j')
                           <button class="btn-cus small l2off">
                           {{ $serverDetails->serverplatform}}
                           </button>
                           @else
                           <button class="btn-cus small l2on">
                           {{ $serverDetails->serverplatform}}
                           </button>
                        @endif
                        <button class="btn-cus small platform-type-serverdetails">
                            {{ $serverDetails->type }}
                        </button>
                                      </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-3">
            <h6>Server Rates</h6>
            <div class="box-3-row-one">
                <ul>
                    <li>Xp Rate: {{ $serverDetails->xpRate }} </li>
                    <li>SP: {{ $serverDetails->spRate }} </li>
                    <li>DROP : {{ $serverDetails->dropRate }} </li>
                </ul>
            </div>
            <div class="box-3-row-two"> 
                <ul>
                    <li>Max Rate: {{ $serverDetails->maxRate }} </li>
                    <li>Safe Rate: {{ $serverDetails->safeRate }} </li>
                    <li>Adena Rate : {{ $serverDetails->adenaRate }} </li>
                </ul>
            </div>
        </div>

        <div class="box-4">
            <h6>Good to know</h6>
            <div class="box-4-row-one">
                <ul>
                    <li>SP rate:   <i class="fas {{ $metas['SPrate']==1 ?  'fa-check' : 'fa-times' }} px-1"></i></li>
                    <li>NPC buffer:<i class="fas {{ $metas['NPCbuffer']==1 ? 'fa-check' : 'fa-times' }} px-1"></i></li>
                    <li>Global GK : <i class="fas {{ $metas['GlobalGK']==1 ? 'fa-check' : 'fa-times' }} px-1"></i></li>
                </ul>
            </div>
            <div class="box-4-row-two">
                <ul>
                    <li>Custom zone:<i class="fas {{ $metas['Customzone']==1 ? 'fa-check' : 'fa-times' }} px-1"></i></li>
                    <li>Custom weapon:<i class="fas {{ $metas['Customweapon']==1 ? 'fa-check' : 'fa-times' }} px-1"></i></li>
                    <li>Custom armor :<i class="fas {{ $metas['Customarmor']==1 ? 'fa-check' : 'fa-times' }} px-1"></i></li>
                </ul>
            </div>
            <div class="box-4-row-three">
                <ul>
                    <li>Offline shop:<i class="fas {{ $metas['Offlineshop']==1 ? 'fa-check' : 'fa-times' }} px-1"></i></li>
                </ul>
            </div>
        </div>

        <div class="box-5">
            <h6>Social share</h6>
            <div class="box-5-row-one">
                <ul>
                    <li> 
                        <div class="fb">
                        <div class="fb-share-button" 
                            data-href="{{url()->current()}}" 
                            data-layout="button">
                        </div>
                        </div>
                    </li>
                    <li>
                        <!-- <div class="twitter">
                                <i class="fab fa-twitter px-2">Tweet</i>
                        </div> -->
                    </li>
                </ul>
            </div>
        </div>

        <!-- advertisement -->
        <div class="add my-4">

        </div>

        <!-- bottom -->
        <div class="bottom-one">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#description" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>
                    <!-- <a class="nav-item nav-link" id="description-tab" data-toggle="tab" href="#uptime-history" role="tab" aria-controls="description" aria-selected="false">Uptime History</a>
                    <a class="nav-item nav-link" id="vote-history-tab" data-toggle="tab" href="#vote-history" role="tab" aria-controls="vote-history" aria-selected="false">Vote History</a> -->
                    <a class="nav-item nav-link" id="uptimehistory-tab" data-toggle="tab" href="#uptime-history" role="tab" aria-controls="uptimehistory-tab" aria-selected="false">Uptime history</a>
                    <a class="nav-item nav-link" id="vote-history-tab" data-toggle="tab" href="#vote-history" role="tab" aria-controls="uptimehistory-tab" aria-selected="false">Vote history</a>


                    <a class="nav-item nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="false">News</a>

                    <a class="nav-item nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="uptimehistory-tab" aria-selected="false">Reviews</a>
                    <!-- <a class="nav-item nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a> -->
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p style="overflow-wrap: break-word;"> {{ $serverDetails->desc }} </p>
                
                </div>
                <div class="fade" id="uptime-history" role="tabpanel" aria-labelledby="-tab">
                    
                    <!-- BAR CHART -->
                    <div id="graph" style="max-height: 300px;max-width: 800px;margin: 20px auto 0 auto;"></div>
                   
                    <!-- /.box -->
                </div>
                <div class="fade" id="vote-history" role="tabpanel" aria-labelledby="-tab">
                    <div id="vote_graph" style="max-height: 300px;max-width: 800px;margin: 20px auto 0 auto;"></div>
                </div>

                <!-- news -->
                <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="-tab">
                    @forelse($newsserver as $newsserve)
                    <ul>
                        <li>
                            <div class="news-list-one">
                                News <span>{{ $newsserve->created_at }}</span> 
                            </div>
                        </li>
                        <li>
                            <div class="news-list-two">
                                <p class="pl-2">{{ $newsserve->news }}</p>
                            </div>
                        </li>
                    </ul>
                    @empty
                    <ul>
                        <li>
                            no any news!
                        </li>
                    </ul>
                    @endforelse
                </div>
                <!-- reviews -->
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="-tab">
                    <h5>Reviews</h5>
                    @if(Auth::guest())
                    <p>Please signin to Add Reviews. <a href="{{url('/forum/index.php?action=login&page=dashboard')}}">Sign in</a></p>
                    @else
                    <div class="add-review">
                        <a href="#" class="btn" data-toggle="modal" data-target="#myModal">Add Review</a>
                    </div>
                    @endif 
                    <div class="alert alert-success mt-3" style="display: none; " id="review_success_message" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Success!</strong> Review Added Succesfully.
                    </div>
                    <div class="col-xs-5">
                        
                    </div>
                    <br>
                    @php 
                    $main_parent_id = 0;
                    @endphp
                    @foreach($server_reviews as $key => $value)
                        @foreach($value as $key1 => $value1)
                            @if($value1->parent_id == 0)
                            @php 
                            $main_parent_id = $value1->id;
                            @endphp
                            <div class="media">
                                <div class="media-left">
                                    <img class="comment-avatar" src="http://l2hotzone.com/images/No-image-available.png" width="65" height="65" alt="...">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <!-- <a href="http://l2topzone.com/forum/profile/u=308890" target="_blank"> --><b> {{$value1->member_name}} </b><!-- </a> -->
                                        {{$value1->created_at}}
                                                      <button class="btn btn-primary btn-xs open-AddReplyDialog" id="addReplayButton" style="float: right;font-size: 9px;" data-toggle="modal" data-target="#myModal" data-reviewid="{{$main_parent_id}}">Reply</button>
                                    </div>
                                    <hr>
                                    <p style="word-break: break-all;">{{$value1->review}}
                                    </p>
                                </div>
                            </div>
                            <br>
                            @else
                            <div class="media" style="margin-left: 78px;">
                                <div class="media-left">
                                    <img class="comment-avatar" src="http://l2hotzone.com/images/No-image-available.png" width="65" height="65" alt="...">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <!-- <a href="http://l2topzone.com/forum/profile/u=308890" target="_blank"> --><b> {{$value1->member_name}} </b><!-- </a> -->
                                        {{$value1->created_at}}
                                                      <button class="btn btn-primary btn-xs open-AddReplyDialog" id="addReplayButton" style="float: right;;font-size: 9px;" data-toggle="modal" data-target="#myModal" data-reviewid="{{$main_parent_id}}">Reply</button>
                                    </div>
                                    <hr>
                                    <p style="word-break: break-all;">{{$value1->review}}
                                    </p>
                                </div>
                            </div>
                            <br>
                            @endif
                        @endforeach
                     @endforeach



                    
                </div>
                <!-- Popup window starts here -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add review</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                        </div>
                        <div class="modal-body">
                           
                                <div class="form-group">
                                <textarea class="form-control" id="addReviewText" name="reviewText" rows="6" placeholder="Add your review here.">
                                </textarea>
                                <input type="hidden" name="server_id" id="server_id" value="<?php echo $serverDetails->id; ?>">
                                <input type="hidden" name="review_id" id="review_id">
                                
                                <p id="review_error" style="color: red"></p>
                                @if($errors->has('review'))
                                <div class="errors"> {{ $errors->first('review') }} </div>
                                @endif
                                
                            
                            <div class="form-group"> 
                                <br> The review area is an area for players to freely (within the rules) express their opinion on the server. <br> 
                                <span class="text-danger">&nbsp;Add review rules :</span><br> - No bad words cursing or swearing, No insults, No spamming ;<br> - No advertising for your server / website on other servers Review area .<br> <br><br> Thank You !<br> 
                            </div>
                           <!--  <div class="form-group"> 
                                <div class="col-xs-5 col-xs-offset-3"><button onclick="addreview();" class="btn btn-primary">Add review</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> </div> 
                            </div> -->
                        </div>
                        <div class="modal-footer">
                          <button onclick="addreview();" class="btn btn-primary">Add review</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                      
                    </div>
              </div>
                <!-- Popup window ends here -->
            </div>
        </div>

    </div>
    </div>


     
    </div>
    </div>
</div>
</div>


{!! Form::close() !!}
    <style>
    .errors {
        color: red !important;
    }
    .latest{font-size: 1rem;}

    .media:first-child {
            margin-top: 0;
        }
    .media, .media-body {
    zoom: 1;
    overflow: hidden;
    }
    .media-body, .media-left, .media-right {
    display: table-cell;
    vertical-align: top;
    }
    .media-left, .media>.pull-left {
    padding-right: 10px;
    }
    .comment-avatar {
    width: 65px;
    height: 65px;
    position: relative;
    float: left;
    border: 3px solid #FFF;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    overflow: hidden;
    }
    .media-body {
    background: #fff;
    border: 1px solid #ddd;
    }
    .media-body, .tab-content {
    padding: 10px 15px;
    }
    .media-body {
    width: 10000px;
    }
    .media-heading {
    margin-top: 0;
    margin-bottom: 5px;
}



</style>
@endsection

@section('pagefooterscript')
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="{{ url('js/morris.js') }}"></script>
  <link rel="stylesheet" href="{{ url('css/morris.css') }}">
  



<script>
    $(document).on("click", ".open-AddReplyDialog", function () {
     var reviewvalue = $(this).data('reviewid');
     $(".modal-body #review_id").val( reviewvalue );
     
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
    });
    $(document).on("click", "#uptimehistory-tab", function () {
     $("#uptime-history").removeClass('tab-pane');
     $("#vote-history").addClass("tab-pane");
    });
    $(document).on("click", "#vote-history-tab", function () {
     $("#vote-history").removeClass('tab-pane');
     $("#uptime-history").addClass("tab-pane");
    });
    $('#nav-home-tab,#news-tab,#reviews-tab').click(function () {
        $("#uptime-history").addClass("tab-pane");
        $("#vote-history").addClass("tab-pane");
    });
    

     
    
    
    $(document).ready(function(){
        
        Morris.Bar({
          element: 'graph',
          data: [
            {x: 'Monday', y: {{isset($uptime_graph_data['Monday']) ? $uptime_graph_data['Monday'] : 0 }} },
            {x: 'Tuesday', y: {{isset($uptime_graph_data['Tuesday']) ? $uptime_graph_data['Tuesday'] : 0 }} },
            {x: 'Wednsday', y: {{isset($uptime_graph_data['Wednesday']) ? $uptime_graph_data['Wednesday'] : 0 }} },
            {x: 'Thursday', y: {{isset($uptime_graph_data['Thursday']) ? $uptime_graph_data['Thursday'] : 0 }} },
            {x: 'Friday', y: {{isset($uptime_graph_data['Friday']) ? $uptime_graph_data['Friday'] : 0 }} },
            {x: 'Saturday', y: {{isset($uptime_graph_data['Saturday']) ? $uptime_graph_data['Saturday'] : 0 }} },
            {x: 'Sunday ', y: {{isset($uptime_graph_data['Sunday']) ? $uptime_graph_data['Sunday'] : 0 }} }
          ],
          xkey: 'x',
          ykeys: ['y'],
          ymax: 100,
          xmax:20,
          resize:true,
          labels: ['Y'],
          barColors: function (row, series, type) {
            if (type === 'bar') {
              var red = Math.ceil(255 * row.y / this.ymax);
              return 'rgb(' + red + ',0,0)';
            }
            else {
              return '#000';
            }
          }
        });
        var JSONString = "{{$voterlist_history_array}}";

        Morris.Area({
          element: 'vote_graph',
          data: JSON.parse(JSONString.replace(/&quot;/g,'"')),
          xkey: 'x',
          ymax: 12,
          ykeys: ['y'],
          labels: ['Y']
        }).on('click', function(i, row){
          console.log(i, row);
        });
        $('input[name="servertype_1"]').on("change", function(){
            $('input[name="servertype_1"]:checked').is("#servertype3") ? $('#datepicker').parent('.gj-datepicker').hide() : $('#datepicker').parent('.gj-datepicker').show(); 
        })
       $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            minDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate())
        });
        $('input[name="servertype_1"]:checked').is("#servertype3") ? $('#datepicker').parent('.gj-datepicker').hide() : $('#datepicker').parent('.gj-datepicker').show();
    });
    function addreview()
    {
        var user = "{{Auth::user()}}";
        console.log(user);
         if(user=='')
         {
            
            alert("Please login first.");
            return false;
         }
        
        site_url = "https://l2hotzone.com/"
        var review = $("#addReviewText").val();
        var server_id = $("#server_id").val();
        var review_id = $("#review_id").val();
        $.ajax({
            url: site_url+"addreview",
            type: 'POST',
            data:{
                review:review,
                server_id:server_id,
                review_id:review_id,
                "_token": "{!! csrf_token() !!}"
            },
            success : function(data)
            {
                $("#myModal").modal('hide');
                $("#review_success_message").show();
               setTimeout(function() { $("#review_success_message").hide(); }, 5000);
                        
            },
            error : function (data)
            {
                if(data.status == 422)
                {
                    document.getElementById("review_error").innerHTML = data.responseJSON.errors.review ? data.responseJSON.errors.review[0] : "";

                }
            }


         })
        
    }
  

</script>


 <!-- Load Facebook SDK for JavaScript -->
 <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

</script>

@endsection


@section('headsection')
  <meta property="og:url"           content="http://l2hotzone.com/" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="L2hotzone" />
  <meta property="og:description"   content="top gaming server" />
  <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
@endsection
@section('leftside')

<a  href="{{ $imageBanner->where('id','=', 1)->first()->livebanner ? $imageBanner->where('id','=', 1)->first()->livebanner->website : '#' }}">
    <img src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 1)->first()->livebanner? $imageBanner->where('id','=', 1)->first()->livebanner->liveimages : 'no-image.png' }}" />
</a>
@endsection

@section('rightside')
<a  href="{{ $imageBanner->where('id','=', 3)->first()->livebanner ? $imageBanner->where('id','=', 3)->first()->livebanner->website : '#' }}">
<img src="{{ url('/images') }}/imagesAdd/{{ !empty($imageBanner->where('id','=', 3)->first()->livebanner) ? $imageBanner->where('id','=', 3)->first()->livebanner->liveimages : 'no-image.png' }}" />
</a>
@endsection