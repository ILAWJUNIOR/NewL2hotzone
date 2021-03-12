@extends('layouts.layout')

@section('headsection')
<title>Home Page</title>
@endsection

@section('content')


       
    <div class="maincontain container">
         <center>
            <div class="row headertop centered">
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 12)->first()->livebanner ? $imageBanner->where('id','=', 12)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 12)->first()->livebanner? $imageBanner[3]['livebanner']['liveimages'] : 'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" 
                       title="{{ $imageBanner->where('id','=', 12)->first()->livebanner? 
    $imageBanner->where('id','=', 12)->first()->livebanner->till_date.' remains from expire' : '' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 13)->first()->livebanner ? $imageBanner->where('id','=', 13)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 13)->first()->livebanner? $imageBanner[4]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" 
                       title="{{ $imageBanner->where('id','=', 13)->first()->livebanner? 
    $imageBanner->where('id','=', 13)->first()->livebanner->till_date.' remains from expire' : '' }}" />
                     </a>
                  </div>
                  <div class="headerimage"> <a  href="{{ $imageBanner->where('id','=', 14)->first()->livebanner ? $imageBanner->where('id','=', 14)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 14)->first()->livebanner? $imageBanner[5]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" 
                       title="{{ $imageBanner->where('id','=', 14)->first()->livebanner? 
    $imageBanner->where('id','=', 14)->first()->livebanner->till_date.' remains from expire' : '' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 15)->first()->livebanner ? $imageBanner->where('id','=', 15)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 15)->first()->livebanner? $imageBanner[6]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" 
                       title="{{ $imageBanner->where('id','=', 15)->first()->livebanner? 
    $imageBanner->where('id','=', 15)->first()->livebanner->till_date.' remains from expire' : '' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 29)->first()->livebanner ? $imageBanner->where('id','=', 29)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 29)->first()->livebanner? $imageBanner[7]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" 
                       title="{{ $imageBanner->where('id','=', 29)->first()->livebanner? 
    $imageBanner->where('id','=', 29)->first()->livebanner->till_date.' remains from expire' : '' }}" />
                     </a>
                  </div>

            </div>
         </center>
         <div class="space container">
            <div class="row">
               <div class="col-md-6 col-sm-6">

                  <div class="middle-content-inner mb-4">
                     <div class="middle-content-inner-sides">
                        <div class="wrap">
                           <div class="heading myheading">
                              <p class="myp">{{ trans('lang.newest_server_lintage_2') }}</p>
                           </div>
                           <div class="">
                           <table class="table">
                              <tbody>
                                 <?php 
                                    $current_date = date('Y-m-d:h:i:s');
                                    
                                    $pserver= DB::table("premiumservers")->select("server_id")->where("active_status","1")->where("till_date",">=",$current_date)->get();
                                    $pserver_id = [];
                                    foreach ($pserver as $key => $value) 
                                    {
                                       $pserver_id[] = $value->server_id;
                                    }
                                    
                                    // echo "<pre>";
                                    // print_r($pserver_id);
                                    // die;
                                 ?>
                                 {{-- newest  servers start from here --}}
                                  @php ($j=0)
                                  @php ($i=0)
                                 @foreach($newyourtextServer as $newserver)
                                 @php ($class ='')
                                 @php ($bold_design ='')
                                 @php ($image_class ='in arrow')
                                  @if($j == 0)
                                 @php($class = 'green' )
                                 @php ($image_class ='in')
                                 @php ($bold_design ='bold_design')
                                 @elseif($j == 1)
                                 @php($class = 'blue' )
                                 @php ($image_class ='in')
                                 @php ($bold_design ='bold_design')
                                 @elseif($j == 2)
                                 @php($class = 'red' )
                                 @php ($image_class ='in')
                                 @php ($bold_design ='bold_design')
                                 @endif
                                 @php ($j++)
                                 <tr class="{{$class}}">
                                    <td class="title">
                                       <div class="{{$image_class}}">
                                          <a href='<?php if($newserver->server_name == "Your Server Here" ) echo url("text"); elseif(in_array( $newserver->id , $pserver_id)
                                          )  echo $newserver->website; else echo route("serverdetail", [$newserver->id,  $newserver->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}"  ><?php echo $newserver->server_name;  ?></span>
                                          @php ($i++)
                                          </a>
                                       </div>
                                    </td>
                                    <td class="small">
                                       @if($newserver->serverplatform == 'L2j')
                                       <button class="btn-cus small l2off ">
                                       {{ $newserver->serverplatform}}
                                       </button>
                                       @else
                                       <button class="btn-cus small">
                                       {{ $newserver->serverplatform}}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="big">
                                       @if($newserver->chronicle == 'highfive')
                                       <button class="btn-cus big highfive">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @elseif($newserver->chronicle == 'interlude')
                                       <button class="btn-cus big interlude">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @elseif($newserver->chronicle == 'kamael')
                                       <button class="btn-cus big kamael">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @else
                                       <button class="btn-cus big garclaFinal">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="medium">
                                       @if($newserver->xpRate > 1000)
                                       <button class="btn-cus medium">X1000</button>
                                       @else
                                        <button class="btn-cus medium">X{{ $newserver->xpRate }}</button>
                                       @endif
                                    </td>
                                 </tr>
                               
                                 @endforeach

                               @foreach($newservers as $newyourtext)

                                  <?php
                                     if($newyourtext->haspremium)
                                     {
                                          $bold_design ='bold_design';
                                     } 
                                     else{
                                       $bold_design ='';
                                     } 
                                  ?>  

                              <tr class="" >
                                 <td class="title">
                                    <div class="in arrow" >
                                        <a href='<?php  echo route("serverdetail", [$newyourtext->id,  $newyourtext->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}" ><?php echo $newyourtext->server_name;  ?></span>
                                          
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($newyourtext->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $newyourtext->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $newyourtext->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($newyourtext->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $newyourtext->chronicle }}
                                    </button>
                                    @elseif($newyourtext->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $newyourtext->chronicle }}
                                    </button>
                                    @elseif($newyourtext->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $newyourtext->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $newyourtext->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                     @if($newyourtext->xpRate > 1000)
                                      <button class="btn-cus medium">X1000</button>
                                     @else
                                      <button class="btn-cus medium">X{{ $newyourtext->xpRate }}</button>
                                     @endif
                                   
                                 </td>
                              </tr>
                              @endforeach

                              </tbody>
                           </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="middle-content-inner-sides">
                     <div class="wrap">
                        <div class="heading">
                           <p>{{ trans('lang.newest_server_premium_10') }}</p>
                        </div>
                        <div class="">
                        <table class="table">
                           <tbody>
                             
                              {{-- premium regual servers start from here --}}
                              @php($j = 0)
                              @foreach($premiumservers as $premiumserver)
                              @php ($class ='')
                              @php ($bold_design ='')
                              @php ($image_class ='in arrow')
                               @if($j == 0)
                              @php($class = 'green' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @elseif($j == 1)
                              @php($class = 'blue' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @elseif($j == 2)
                              @php($class = 'red' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @endif
                              @php ($j++)
                              <tr class="{{$class }}">
                                 <td class="title">
                                    <div class="{{ $image_class }}">
                                        <a href='<?php if($premiumserver->server_name == "Your Server Here" ) echo url("text"); elseif(in_array( $premiumserver->id , $pserver_id)
                                          )  echo $premiumserver->website; else echo route("serverdetail", [$premiumserver->id,  $premiumserver->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}" ><?php echo $premiumserver->server_name;  ?></span>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($premiumserver->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $premiumserver->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $premiumserver->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($premiumserver->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @elseif($premiumserver->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @elseif($premiumserver->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                     @if($premiumserver->xpRate > 1000)
                                    <button class="btn-cus medium">X1000</button>
                                    @else
                                     <button class="btn-cus medium">X{{ $premiumserver->xpRate }}</button>
                                    @endif
                                 </td>
                              </tr>
                              @endforeach
                               @foreach($premiummainservers as $premiumserver)
                                 
                                 <tr >
                                 <td class="title">
                                    <div class="in arrow" >
                                        <a href='<?php  echo route("serverdetail", [$premiumserver->id,  $premiumserver->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}" ><?php echo $premiumserver->server_name;  ?></span>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($premiumserver->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $premiumserver->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $premiumserver->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($premiumserver->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @elseif($premiumserver->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @elseif($premiumserver->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                     @if($premiumserver->xpRate > 1000)
                                    <button class="btn-cus medium">X1000</button>
                                    @else
                                    <button class="btn-cus medium">X{{ $premiumserver->xpRate }}</button>
                                    @endif
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="middle-content-inner-sides" style="margin-right: 19px;">
                     <div class="wrap">
                        <div class="heading">
                           <p>{{ trans('lang.top_10_lintage_server') }}</p>
                        </div>
                        <div class="">
                        <table class="table">
                           <tbody>
                               
                              {{-- top server start from here --}}
                              @php($j = 0)
                              @foreach($toptext as $topserver)
                               @php ($class ='')
                               @php ($bold_design ='')
                              @php ($image_class ='in arrow')
                               @if($j == 0)
                              @php($class = 'green' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @elseif($j == 1)
                              @php($class = 'blue' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @elseif($j == 2)
                              @php($class = 'red' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @endif
                              @php ($j++)
                              <tr class="{{$class}}">
                                 <td class="title">
                                    <div class="{{$image_class}}">
                                      

                                         <a href='<?php if($topserver->server_name == "Your Server Here" ) echo url("text"); elseif(in_array( $topserver->id , $pserver_id)
                                          )  echo $topserver->website; else echo route("serverdetail", [$topserver->id,  $topserver->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}" ><?php echo $topserver->server_name;  ?></span>

                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($topserver->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $topserver->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $topserver->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($topserver->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @elseif($topserver->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @elseif($topserver->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                       @if($topserver->xpRate > 1000)
                                    <button class="btn-cus medium">X1000</button>
                                    @else
                                     <button class="btn-cus medium">X{{ $topserver->xpRate }}</button>
                                    @endif
                                 </td>
                              </tr>
                              @endforeach

                             
                              @foreach($topservers as $toptex)
                                
                                <?php
                                     if($toptex->haspremium)
                                     {
                                          $bold_design ='bold_design';
                                     } 
                                     else{
                                       $bold_design ='';
                                     } 
                                  ?>
                              
                              <tr class="" >
                                 <td class="title">
                                    <div class="in arrow">
                                        <a href='<?php  echo route("serverdetail", [$toptex->id,  $toptex->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}"><?php echo $toptex->server_name;  ?></span>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($toptex->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $toptex->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $toptex->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($toptex->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @elseif($toptex->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @elseif($toptex->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                     @if($toptex->xpRate > 1000)
                                    <button class="btn-cus medium">X1000</button>
                                    @else
                                    <button class="btn-cus medium">X{{ $toptex->xpRate }}</button>
                                    @endif
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="middle-content-inner-sides">
                     <div class="wrap">
                        <div class="heading">
                           <p>{{ trans('lang.comming_soon_server_10')}}</p>
                        </div>
                        <div class="">
                       <table class="table">
                              <tbody>
                              
                              {{-- upcoming  servers start from here --}}
                                 
                                 {{-- newest regualr servers start from here --}}
                                 @php($j = 0)
                                 @foreach($upcomingtext as $newserver)
                               @php ($class ='')
                               @php ($bold_design ='')
                              @php ($image_class ='in arrow')
                               @if($j == 0)
                              @php($class = 'green' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @elseif($j == 1)
                              @php($class = 'blue' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @elseif($j == 2)     
                              @php($class = 'red' )
                              @php ($image_class ='in')
                              @php ($bold_design ='bold_design')
                              @endif
                              @php ($j++)
                                 <tr class="{{$class}}">
                                    <td class="title">
                                       <div class="{{$image_class}}">
                                       
                                           <a href='<?php if($newserver->server_name == "Your Server Here" ) echo url("text"); elseif(in_array( $newserver->id , $pserver_id)
                                          )  echo $newserver->website; else echo route("serverdetail", [$newserver->id,  $topserver->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}" ><?php echo $newserver->server_name; ?></span>

                                       </div>
                                    </td>
                                    <td class="small">
                                       @if($newserver->serverplatform == 'L2j')
                                       <button class="btn-cus small l2off ">
                                       {{ $newserver->serverplatform}}
                                       </button>
                                       @else
                                       <button class="btn-cus small">
                                       {{ $newserver->serverplatform}}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="big">
                                       @if($newserver->chronicle == 'highfive')
                                       <button class="btn-cus big highfive">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @elseif($newserver->chronicle == 'interlude')
                                       <button class="btn-cus big interlude">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @elseif($newserver->chronicle == 'kamael')
                                       <button class="btn-cus big kamael">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @else
                                       <button class="btn-cus big garclaFinal">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="medium">
                                       @if( $newserver->xpRate > 1000)
                                       <button class="btn-cus medium">X1000</button>
                                       @else
                                       <button class="btn-cus medium">X{{ $newserver->xpRate }}</button>
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach


                                 @foreach($upcomingServers as $toptex)

                                 <?php
                                     if($toptex->haspremium)
                                     {
                                          $bold_design ='bold_design';
                                     } 
                                     else{
                                       $bold_design = '';
                                     } 
                                 ?>   

                                
                              <tr  >
                                 <td class="title">
                                    <div class="in arrow">
                                        <a href='<?php  echo route("serverdetail", [$toptex->id,  $toptex->server_name] );  ?>  '>
                                          <span class="{{$bold_design}}" ><?php echo $toptex->server_name;  ?></span>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($toptex->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $toptex->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $toptex->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($toptex->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @elseif($toptex->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @elseif($toptex->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $toptex->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                    @if($toptex->xpRate > 1000)
                                    <button class="btn-cus medium">X1000</button>
                                    @else
                                     <button class="btn-cus medium">X{{ $toptex->xpRate }}</button>
                                    @endif
                                 </td>
                              </tr>
                              @endforeach
                              </tbody>
                           </table>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 hide_mobile_content" style="margin-top: 30px;">
                  <div class="middle-content-inner-sides" style="margin-right: 19px;">
                     <div class="wrap">
                        <a  href="{{ $imageBanner->where('id','=', 4)->first()->livebanner ? $imageBanner->where('id','=', 4)->first()->livebanner->website : url('/ads') }}">
                        <img  class="main-bottom-left-image containimage" style="position: static;" src="{{ $imageBanner->where('id','=', 4)->first()->livebanner? $imageBanner[2]['livebanner']['liveimages'] : 'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6"  style="margin-top: 30px;">
                  <div class="middle-content-inner-sides" >
                     <div class="wrap" style="margin: 0 26px 0px;">
                        <div class="">
                          <iframe src="https://discord.com/widget?id=810594597872336958&theme=dark" width="350" height="270" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts">    
                          </iframe>
                        </div>
                        <div class="news-wrap">
                           @forelse($latestNes as $latestNe=>$value)
                           <div class="news-wrap-content pt-3">
                              <!--  <h5><strong>{{ $value->subject }}</strong> {{ $value->subject }}</h5> -->
                              <p><strong><a href="{{url('forum/index.php?topic='.$value->id_msg)}}">{{$value->subject}}</a></strong></p>
                           </div>
                           @empty
                           <p>{{ trans('lang.no_news') }}</p>
                           @endforelse
                        </div>
                     </div>
                  </div>
               </div>
            </div>
           <!--  <div class="row">
                  <div class="col-md-6">
                        <div style="background-color: blue">
                              <h2>Title</h2>
                        </div>
                  </div>

            </div> -->

         </div>
      </div>
      <style type="text/css">
         .bold_design { font-weight:900}

         .middle-content-inner-sides .wrap .table .btn-cus.big {
    margin-left: 0px;
    width: 120px;
    background-size: 120px 20px !important; 
    padding-right: 20px;
}
.headerimage {
    padding: 15px;
}

.headerimage a {
    width: 200px;
    height: 200px;
}
.headertop img {
    width: 100%;
    padding: 0;
    /* top: 28%; */
    /* left: 0%; */
    height: 100%;
    width: 178px !important;
    height: 78px !important;
    object-fit: fill;
}


@media (max-width: 480px)
{
   .hide_mobile_content
   {
      display: none;
   }
   .headertop {
    display: inline-flex;
}
.headerimage {
    padding: 5px;
}
}



      </style>
@endsection


