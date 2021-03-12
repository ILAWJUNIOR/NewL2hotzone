@extends('layouts.new_deisgn_layout')

@section('headsection')
<title>Home Page</title>
@endsection

@section('content')
       
            <div class="middle-content-inner mb-4">

                <div class="middle-content-inner-sides" style="margin-right: 19px;">

                    <div class="wrap">
                        <div class="heading">
                            <p>{{ trans('lang.newest_server_lintage_2') }}</p>
                        </div>
                        <table class="table">
                            <tbody>

                            {{-- newest text servers start from here --}}

                             @if(array_key_exists('newest', $textAdds))
                                @foreach($textAdds['newest'] as $keyn => $textAdd)
                                    @if($keyn == 'newest_1')
                                        @php($class = 'green' )
                                    @elseif($keyn == 'newest_2')
                                        @php($class = 'blue' )
                                    @else
                                        @php($class = 'red' )
                                    @endif
                                    
                                    @foreach($textAdd as $textAd)

                                    <tr class="{{ $class }}"> 
                                        <td class="title">
                                            <div class="in">
                                            <a href=' {{ route("serverdetail", [$textAd->id,  $textAd->server_name] ) }}'>
                                            
                                                <span>{{ $textAd->server_name }}</span>
                                            </a>
                                            </div>
                                        </td>
                                        <td class="small">
                                        @if($textAd->serverplatform == 'L2j')
                                            <button class="btn-cus small l2off ">
                                            {{ $textAd->serverplatform}}
                                            </button>
                                        @else
                                            <button class="btn-cus small">
                                            {{ $textAd->serverplatform}}
                                            </button>
                                        @endif

                                        </td>
                                        
                                        <td class="big">
                                            @if($textAd->chronicle == 'highfive')
                                            <button class="btn-cus big highfive">
                                                {{ $textAd->chronicle }}
                                            </button>
                                            @elseif($textAd->chronicle == 'interlude')
                                            <button class="btn-cus big interlude">
                                                {{ $textAd->chronicle }}
                                            </button>
                                            @elseif($textAd->chronicle == 'kamael')
                                            <button class="btn-cus big kamael">
                                                {{ $textAd->chronicle }}
                                            </button>
                                            @else
                                            <button class="btn-cus big garclaFinal">
                                                {{ $textAd->chronicle }}
                                            </button>
                                            @endif
                                        </td>
                                        <td class="medium">
                                            <button class="btn-cus medium">{{ $textAd->xpRate }}</button>
                                        </td>                                       
                                    </tr>
                                    
                                    @endforeach
                                    
                                @endforeach

                             @endif
                             
                             {{-- newest regualr servers start from here --}}

                                @foreach($newservers as $newserver)
                                    <tr>                                        
                                        <td class="title">
                                            <div class="in arrow">
                                            <a href=' {{ route("serverdetail", [$newserver->id,  $newserver->server_name] ) }}'>
                                                <span>{{ $newserver->server_name }}</span>
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
                                            <button class="btn-cus medium">{{ $newserver->xpRate }}</button>
                                        </td>
                                    </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="middle-content-inner-sides">

                    <div class="wrap">
                        <div class="heading">
                            <p>{{ trans('lang.newest_server_premium_10') }}</p>
                        </div>
                        <table class="table">

                            <tbody>
                            @if(array_key_exists('premium', $textAdds))
                                @foreach($textAdds['premium'] as $keyp => $textAddPr)
                                    @if($keyp == 'premium_1')
                                        @php($class = 'green' )
                                    @elseif($keyp == 'premium_2')
                                        @php($class = 'blue' )
                                    @else
                                        @php($class = 'red' )
                                    @endif
                                    
                                    @foreach($textAddPr as $textAddP)

                                    <tr class="{{ $class }}"> 
                                        <td class="title">
                                            <div class="in">
                                            <a href=' {{ route("serverdetail", [$textAddP->id,  $textAddP->server_name] ) }}'>
                                            
                                                <span>{{ $textAddP->server_name }}</span>
                                            </a>
                                            </div>
                                        </td>
                                        <td class="small">
                                        @if($textAddP->serverplatform == 'L2j')
                                            <button class="btn-cus small l2off ">
                                            {{ $textAddP->serverplatform}}
                                            </button>
                                        @else
                                            <button class="btn-cus small">
                                            {{ $textAddP->serverplatform}}
                                            </button>
                                        @endif

                                        </td>
                                        
                                        <td class="big">
                                            @if($textAddP->chronicle == 'highfive')
                                            <button class="btn-cus big highfive">
                                                {{ $textAddP->chronicle }}
                                            </button>
                                            @elseif($textAddP->chronicle == 'interlude')
                                            <button class="btn-cus big interlude">
                                                {{ $textAddP->chronicle }}
                                            </button>
                                            @elseif($textAddP->chronicle == 'kamael')
                                            <button class="btn-cus big kamael">
                                                {{ $textAddP->chronicle }}
                                            </button>
                                            @else
                                            <button class="btn-cus big garclaFinal">
                                                {{ $textAddP->chronicle }}
                                            </button>
                                            @endif
                                        </td>
                                        <td class="medium">
                                            <button class="btn-cus medium">{{ $textAddP->xpRate }}</button>
                                        </td>                                       
                                    </tr>
                                    
                                    @endforeach
                                    
                                @endforeach

                             @endif

                             {{-- premium regual servers start from here --}}
                                
                                @foreach($premiumservers as $premiumserver)
                               
                                <tr>                                        
                                    <td class="title">
                                        <div class="in arrow">
                                        <a href=' {{ route("serverdetail", [$premiumserver->id,  $premiumserver->server_name] ) }}'>
                                        
                                            <span>{{ $premiumserver->server_name }}</span>
                                        </a>
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
                                        <button class="btn-cus medium">{{ $premiumserver->xpRate }}</button>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>   

            </div>

            <div class="middle-content-inner mb-4">

                <div class="middle-content-inner-sides" style="margin-right: 19px;">

                    <div class="wrap">
                        <div class="heading">
                            <p>{{ trans('lang.top_10_lintage_server') }}</p>
                        </div>
                        <table class="table">
                            <tbody>
                            @if(array_key_exists('top', $textAdds))
                                @foreach($textAdds['top'] as $keyt => $textAddtop)
                                    @if($keyt == 'top_1')
                                        @php($class = 'green' )
                                    @elseif($keyt == 'top_2')
                                        @php($class = 'blue' )
                                    @else
                                        @php($class = 'red' )
                                    @endif
                                    
                                    @foreach($textAddtop as $textAddto)

                                    <tr class="{{ $class }}"> 
                                        <td class="title">
                                            <div class="in">
                                            <a href=' {{ route("serverdetail", [$textAddto->id,  $textAddto->server_name] ) }}'>
                                            
                                                <span>{{ $textAddto->server_name }}</span>
                                            </a>
                                            </div>
                                        </td>
                                        <td class="small">
                                        @if($textAddto->serverplatform == 'L2j')
                                            <button class="btn-cus small l2off ">
                                            {{ $textAddto->serverplatform}}
                                            </button>
                                        @else
                                            <button class="btn-cus small">
                                            {{ $textAddto->serverplatform}}
                                            </button>
                                        @endif

                                        </td>
                                        
                                        <td class="big">
                                            @if($textAddto->chronicle == 'highfive')
                                            <button class="btn-cus big highfive">
                                                {{ $textAddto->chronicle }}
                                            </button>
                                            @elseif($textAddto->chronicle == 'interlude')
                                            <button class="btn-cus big interlude">
                                                {{ $textAddto->chronicle }}
                                            </button>
                                            @elseif($textAddto->chronicle == 'kamael')
                                            <button class="btn-cus big kamael">
                                                {{ $textAddto->chronicle }}
                                            </button>
                                            @else
                                            <button class="btn-cus big garclaFinal">
                                                {{ $textAddto->chronicle }}
                                            </button>
                                            @endif
                                        </td>
                                        <td class="medium">
                                            <button class="btn-cus medium">{{ $textAddto->xpRate }}</button>
                                        </td>                                       
                                    </tr>
                                    
                                    @endforeach
                                    
                                @endforeach

                             @endif
                             {{-- top server start from here --}}

                                @foreach($topservers as $topserver)
                               
                                <tr>                                        
                                    <td class="title">
                                        <div class="in arrow">
                                        <a href=' {{ route("serverdetail", [$topserver->id,  $topserver->server_name] ) }}'>
                                        
                                            <span>{{ $topserver->server_name }}</span>
                                        </a>
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
                                        <button class="btn-cus medium">{{ $topserver->xpRate }}</button>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                
                <div class="middle-content-inner-sides">

                    <div class="wrap">
                        <div class="heading">
                            <p>{{ trans('lang.comming_soon_server_10') }}</p>
                        </div>
                        <table class="table">
                            <tbody>
                            @if(array_key_exists('upcoming', $textAdds))
                                @foreach($textAdds['upcoming'] as $keyup => $textAddupcomings)
                                    @if($keyup == 'upcoming_1')
                                        @php($class = 'green' )
                                    @elseif($keyup == 'upcoming_2')
                                        @php($class = 'blue' )
                                    @else
                                        @php($class = 'red' )
                                    @endif
                                    
                                    @foreach($textAddupcomings as $textAddupcoming)

                                    <tr class="{{ $class }}"> 
                                        <td class="title">
                                            <div class="in">
                                            <a href=' {{ route("serverdetail", [$textAddupcoming->id,  $textAddupcoming->server_name] ) }}'>
                                            
                                                <span>{{ $textAddupcoming->server_name }}</span>
                                            </a>
                                            </div>
                                        </td>
                                        <td class="small">
                                        @if($textAddupcoming->serverplatform == 'L2j')
                                            <button class="btn-cus small l2off ">
                                            {{ $textAddupcoming->serverplatform}}
                                            </button>
                                        @else
                                            <button class="btn-cus small">
                                            {{ $textAddupcoming->serverplatform}}
                                            </button>
                                        @endif

                                        </td>
                                        
                                        <td class="big">
                                            @if($textAddupcoming->chronicle == 'highfive')
                                            <button class="btn-cus big highfive">
                                                {{ $textAddupcoming->chronicle }}
                                            </button>
                                            @elseif($textAddupcoming->chronicle == 'interlude')
                                            <button class="btn-cus big interlude">
                                                {{ $textAddupcoming->chronicle }}
                                            </button>
                                            @elseif($textAddupcoming->chronicle == 'kamael')
                                            <button class="btn-cus big kamael">
                                                {{ $textAddupcoming->chronicle }}
                                            </button>
                                            @else
                                            <button class="btn-cus big garclaFinal">
                                                {{ $textAddupcoming->chronicle }}
                                            </button>
                                            @endif
                                        </td>
                                        <td class="medium">
                                            <button class="btn-cus medium">{{ $textAddupcoming->xpRate }}</button>
                                        </td>                                       
                                    </tr>
                                    
                                    @endforeach
                                    
                                @endforeach

                             @endif
                             {{-- top server start from here --}}
                                
                                @foreach($upcomingServers as $upcomingServer)
                               
                               <tr>                                        
                                   <td class="title">
                                       <div class="in arrow">
                                       <a href=' {{ route("serverdetail", [$upcomingServer->id,  $upcomingServer->server_name] ) }}'>
                                       
                                           <span>{{ $upcomingServer->server_name }}</span>
                                       </a>
                                       </div>
                                   </td>
                                   <td class="small">
                                   @if($upcomingServer->serverplatform == 'L2j')
                                       <button class="btn-cus small l2off ">
                                       {{ $upcomingServer->serverplatform}}
                                       </button>
                                   @else
                                       <button class="btn-cus small">
                                       {{ $upcomingServer->serverplatform}}
                                       </button>
                                   @endif

                                   </td>
                                  
                                  <td class="big">
                                       @if($upcomingServer->chronicle == 'highfive')
                                       <button class="btn-cus big highfive">
                                           {{ $upcomingServer->chronicle }}
                                       </button>
                                       @elseif($upcomingServer->chronicle == 'interlude')
                                       <button class="btn-cus big interlude">
                                           {{ $upcomingServer->chronicle }}
                                       </button>
                                       @elseif($upcomingServer->chronicle == 'kamael')
                                       <button class="btn-cus big kamael">
                                           {{ $upcomingServer->chronicle }}
                                       </button>
                                       @else
                                       <button class="btn-cus big garclaFinal">
                                           {{ $upcomingServer->chronicle }}
                                       </button>
                                       @endif
                                   </td>
                                   <td class="medium">
                                       <button class="btn-cus medium">{{ $upcomingServer->xpRate }}</button>
                                   </td>
                               </tr>
                              @endforeach
                               
                            </tbody>
                        </table>
                    </div>

                </div>     
                
            </div>

            <!-- <div class="middle-content-inner mt-3">

                <div class="middle-content-inner-sides var">

                    <div class="wrap">
                        <div class="heading var">
                            <p>Server Reviews</p>
                        </div>
                        <table class="table var">
                            <tbody>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                                <tr>                                        
                                    <td class="review">
                                        <p>Jennifer Nodwell reviewed L2 Fire and Ice Really like this server a lot. Its balanced and t ... </p>
                                    </td>
                                    <td class="timeStamp">
                                        <p>2 days ago</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>

            </div> -->
            <div class="row">
                <div class="middle-content-inner my-4">
                    <div class="col-md-6">
                        <div class="middle-content-inner-sides" style="margin-right: 19px;">

                            <div class="wrap">
                                <a  href="{{ $imageBanner->where('id','=', 4)->first()->livebanner ? $imageBanner->where('id','=', 4)->first()->livebanner->website : '#' }}">
                                    <img class="main-bottom-left-image" style="position: static;" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 4)->first()->livebanner? $imageBanner->where('id','=', 4)->first()->livebanner->liveimages : 'no-image.png' }}" />
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="middle-content-inner-sides" style="height: 209px;background-color: white;padding-right: 35px;width: 100%">

                            <div class="wrap" style="margin: 0 26px 0px;">

                                <div class="heading news">
                                    <p class="hcolor">{{ trans('lang.latest_user_news') }}</p>
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
            </div>

@endsection

@section('leftside')

</style>
<?php
//echo '<pre>';print_r($imageBanner->toArray());die;
?>

    <img src="{{ url('/images') }}/imagesAdd/left.gif" />

@endsection

@section('rightside')

<img src="{{ url('/images') }}/imagesAdd/right.gif" />
@endsection