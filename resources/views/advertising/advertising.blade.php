@extends('layouts.layout')

@section('headsection')
<title>Add server</title>
@endsection

@section('content')
    @if(Auth::guest())  
        @includeIf('userLog')
    @else
      

<div class="maincontain container">
    <center>
            <div class="row headertop centered">
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 12)->first()->livebanner ? $imageBanner->where('id','=', 12)->first()->livebanner->website : '#' }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 12)->first()->livebanner? $imageBanner[3]['livebanner']['liveimages'] : 'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 13)->first()->livebanner ? $imageBanner->where('id','=', 13)->first()->livebanner->website : '#' }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 13)->first()->livebanner? $imageBanner[4]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"> <a  href="{{ $imageBanner->where('id','=', 14)->first()->livebanner ? $imageBanner->where('id','=', 14)->first()->livebanner->website : '#' }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 14)->first()->livebanner? $imageBanner[5]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 15)->first()->livebanner ? $imageBanner->where('id','=', 15)->first()->livebanner->website : '#' }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 15)->first()->livebanner? $imageBanner[6]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png'  }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 29)->first()->livebanner ? $imageBanner->where('id','=', 29)->first()->livebanner->website : '#' }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 29)->first()->livebanner? $imageBanner[7]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png'  }}" />
                     </a>
                  </div>

            </div>
         </center>
    <div class="space container">
            <div class="page-ten">
        <div class="boxes row">
           <div class="col-md-12">
            <a href="{{ route('buycoins') }}">
                <div class="redbox py-1">
                    <p class="redbox_left"><i class="far fa-money-bill-alt"></i></p>
                    <p class="redbox_right">{{ $userAmount }} <br> {{ trans('lang.coins') }}</p>
                </div>
            </a></div> 
            <div class="col-md-12">           
            <a href="{{ url('ads') }}">
                <div class="greenbox py-1">
                    <p class="redbox_left"><i class="fas fa-bullhorn"></i></p>
                    <p class="redbox_right">{{ trans('lang.banner') }} {{ trans('lang.advertising') }} <br>{{ trans('lang.free') }} {{ $banner_count}}</p>
                </div>
            </a></div>
            <div class="col-md-12">
            <a href="{{ url('text') }}">
                <div class="bluebox py-1">
                    <p class="redbox_left"><i class="fas fa-bars"></i></p>
                    <p class="redbox_right">{{ trans('lang.text') }} {{ trans('lang.advertising') }} <br>{{ $text_free_counter }}</p>
                </div>
            </a>
        </div>
            <div class="col-md-12">
            <a href="{{ route('buypremium') }}">
                <div class="yellowbox py-1">
                    <p class="redbox_left"><i class="fas fa-user"></i></p>
                    @php
                    $data = \Carbon\Carbon::today();

                    $premium1 = Auth::User()->hasOne('App\model\Premiumserver','server_id');
        $premium2 = $premium1->where('till_date', '>=', $data)->count();

                    @endphp   
                    <p class="redbox_right">{{ trans('lang.premium') }} {{ trans('lang.server') }} {{ trans('lang.advertising') }} <br>∞</p>
                    <!-- <p class="redbox_right">Premium server advertising<br>{{ $premium2 }} </p> -->
                </div>
            </a></div>
            <div class="col-md-12">
            <a href="{{ url('stream') }}">
                <div class="redbox py-1" style="background-color: purple ">
                    <p class="redbox_left"><i class="fas fa-video"></i></p>
                    <p class="redbox_right">{{ trans('lang.place_your_stream') }}<br>{{ trans('lang.free') }}  {{ $c }} </p>
                </div>
            </a>
        </div>
        </div>
        <!-- <div class="video my-4 col-md-12">
            <iframe width="100%" height="345px" src="https://www.youtube.com/embed/tgbNymZ7vqY">
            </iframe>
        </div> -->
    </div>

    </div>
</div>

    @endif
<style type="text/css">
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
    object-fit: fill;
    width: 178px !important;
    height: 78px !important;
}
</style>   

@endsection

@section('leftside')
<?php
//echo '<pre>';print_r($imageBanner->toArray());die;
?>
<a  href="{{ $imageBanner->where('id','=', 1)->first()->livebanner ? $imageBanner->where('id','=', 1)->first()->livebanner->website : '#' }}">
    <img src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 1)->first()->livebanner? $imageBanner->where('id','=', 1)->first()->livebanner->liveimages : 'no-image.png' }}" />
</a>
@endsection

@section('rightside')
<a  href="{{ $imageBanner->where('id','=', 3)->first()->livebanner ? $imageBanner->where('id','=', 3)->first()->livebanner->website : '#' }}">
<img src="{{ url('/images') }}/imagesAdd/{{ !empty($imageBanner->where('id','=', 3)->first()->livebanner) ? $imageBanner->where('id','=', 3)->first()->livebanner->liveimages : 'no-image.png' }}" />
</a>
@endsection