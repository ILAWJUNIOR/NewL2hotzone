@extends('layouts.layout')

@section('headsection')
<title>Coming Server</title>
@endsection

@section('content')
       
    <div class="maincontain container">
         <center>
            <div class="row headertop centered">
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 12)->first()->livebanner ? $imageBanner->where('id','=', 12)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 12)->first()->livebanner? $imageBanner->where('id','=', 12)->first()->livebanner->liveimages : 'no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 13)->first()->livebanner ? $imageBanner->where('id','=', 13)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 13)->first()->livebanner? $imageBanner->where('id','=', 13)->first()->livebanner->liveimages : 'no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"> <a  href="{{ $imageBanner->where('id','=', 14)->first()->livebanner ? $imageBanner->where('id','=', 14)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 14)->first()->livebanner? $imageBanner->where('id','=', 14)->first()->livebanner->liveimages : 'no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 15)->first()->livebanner ? $imageBanner->where('id','=', 15)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 15)->first()->livebanner? $imageBanner->where('id','=', 15)->first()->livebanner->liveimages : 'no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 29)->first()->livebanner ? $imageBanner->where('id','=', 29)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 29)->first()->livebanner? $imageBanner->where('id','=', 29)->first()->livebanner->liveimages : 'no-image.png' }}" />
                     </a>
                  </div>

            </div>
            <div class="space container" > 
           <center>
            <br/>
              <h3 style="color: gray">{{ trans('lang.comming_soon_server') }}</h3>
           </center>
         </div>
         </center>
         
      </div>
@endsection


