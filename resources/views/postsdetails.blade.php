@extends('layouts.layout')
@section('content')
<div class="all_server">        
   <div class="col-md-12">
      <div class="well">
          <div class="media">
            <!-- s -->
            <div class="media-body">
                <h4 class="media-heading">{{ $posts_details->subject }}</h4>
              <p class="text-right">{{ trans('lang.by') }} {{ $posts_details->poster_email}}</p>
              <p>{{ str_ireplace( array("<br />","<br>","<br/>"), "\r\n",$posts_details->body) }}</p>
                  <ul class="list-inline list-unstyled" style="font-size: 14px;">
                    <li><span><i class="glyphicon glyphicon-calendar"></i> {{ date("F d, Y h:i:s",$posts_details->poster_time)}} </span></li>
                    <!--<li>|</li>
                     <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                    <li>|</li>
                    <li>
                       <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                    </li>
                    <li>|</li>
                    <li>
                   
                      <span><i class="fa fa-facebook-square"></i></span>
                      <span><i class="fa fa-twitter-square"></i></span>
                      <span><i class="fa fa-google-plus-square"></i></span>
                    </li> -->
                    </ul>
               </div>
            </div>
      </div>
      
    </div> 


      
  </div>
   
@endsection
@section('leftside')

    <img src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 3)->first()->livebanner? $imageBanner->where('id','=', 3)->first()->livebanner->liveimages : $imageBanner->where('id','=', 3)->first()->name }}" />
@endsection

@section('rightside')
<img src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 1)->first()->livebanner? $imageBanner->where('id','=', 3)->first()->livebanner->liveimages : $imageBanner->where('id','=', 3)->first()->name }}" />
@endsection

