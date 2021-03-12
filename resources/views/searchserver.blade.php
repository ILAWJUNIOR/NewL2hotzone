@extends('layouts.layout')

@section('headsection')
<title>Home Page</title>
@endsection

@section('content')

<div class="maincontain container">
    <center>
            <div class="row headertop centered">
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 12)->first()->livebanner ? $imageBanner->where('id','=', 12)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 12)->first()->livebanner? $imageBanner[3]['livebanner']['liveimages'] : 'no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 13)->first()->livebanner ? $imageBanner->where('id','=', 13)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 13)->first()->livebanner? $imageBanner[4]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"> <a  href="{{ $imageBanner->where('id','=', 14)->first()->livebanner ? $imageBanner->where('id','=', 14)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 14)->first()->livebanner? $imageBanner[5]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 15)->first()->livebanner ? $imageBanner->where('id','=', 15)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 15)->first()->livebanner? $imageBanner[6]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 29)->first()->livebanner ? $imageBanner->where('id','=', 29)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 29)->first()->livebanner? $imageBanner[7]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>

            </div>
         </center>
    <div class="space container">
        <div class="search_server"  style="min-height: calc(700px - 100px);">
    <p>{{ trans('lang.search') }}</p>

    <form method="Get" action="/searchservers">
        <div id="search">
            <input class="form-control" type="search"  aria-label="Search" name="server_name">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
        <div class="row mt-4">
            <div class="col-md-6">
                <!-- Good to know -->
                <div class="good">
                    <div class="card">
                        <h6 class="card-header">{{ trans('lang.good_to_know') }}</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="gm" name="offlineshop">
                                        <label class="form-check-label" for="Offlineshop">{{ trans('lang.offline_show') }}</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="npc" name="npc">
                                        <label class="form-check-label" for="npc">{{ trans('lang.npc_buffer') }}</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="globalgK" name="globalgK">
                                        <label class="form-check-label" for="globalgK">{{ trans('lang.global_gk') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="customzone" name="customzone">
                                        <label class="form-check-label" for="customzone">{{ trans('lang.custome_zone') }}</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="customweapon" name="customweapon">
                                        <label class="form-check-label" for="customweapon">{{ trans('lang.custom_weapon') }}</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">{{ trans('lang.chronicle') }}</h6>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('lang.chronicle') }}</label>
                                {{ Form::select('chronicle', [
                                    'chronicle-1' => 'Chronicle 1', 
                                    'chronicle-2' => 'Chronicle 2',
                                    'chronicle-3' => 'Chronicle 3',
                                    'chronicle-4' => 'Chronicle 4',
                                    'chronicle-5' => 'Chronicle 5',
                                    'interlude' =>  'Interlude',
                                    'kamael'    =>  'Kamael',
                                    'hellbound' =>  'Hellbound',
                                    'gracia1'   =>  'Gracia 1',
                                    'gracia2'   =>  'Gracia 2',
                                    'gracia-final'  =>  'Gracia Final',
                                    'gracia-epilogue'   =>  'Gracia Epilogue',
                                    'freya' =>  'Freya',
                                    'highfive'  =>  'High Five',
                                    'goddess-of-destruction-awakening'  =>  'Goddess of Destruction Awakening',
                                    'goddess-of-destruction-harmony'    =>  'Goddess of Destruction Harmony',
                                    'goddess-of-destruction-tauti'  =>  'Goddess of Destruction Tauti',
                                    'goddess-of-destruction-glory-days' =>  'Goddess of Destruction Glory Days',
                                    'goddess-of-destruction-lindvior'   =>  'Goddess of Destruction Lindvior',
                                    'epic-tale-of-aden-ertheia' =>      'Epic Tale of Aden Ertheia'    ,
                                    'infinite-odyssey'  =>      'Infinite Odyssey',
                                    'classic10' =>  'Classic 1.0',
                                    'classic15' =>  'Classic 1.5',
                                    'classic20' =>  'Classic 2.0',
                                    'classic25' =>  'Classic 2.5',
                                    'helios'    =>  'Helios',
                                    'grand-crusade' =>  'Grand Crusade'
                                    ],old('chronicle'), ['placeholder' => 'Select chronicle', 'class' => 'form-control selectpicker '.$errors->has('chronicle','is-invalid'), 'id' => 's-chronicle']) }}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">{{ trans('lang.search') }}</button>
    </form>


            <!-- Servers -->
        @if($noresult != true)
            @if($searchlist->count())
                @php( $premiumlists = $searchlist)                         

                @include('serverSection')
                <style type="text/css">
                    .headersearch{
                        display: none;
                    }
                </style>
            @else
               {{ trans('lang.no_search_found') }}
            @endif
        @endif
       
        
</div>
    </div>
</div>
<style>
.row.normal {
    background: #fff;
    margin-bottom: 10px;
    box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.09);
    padding: 5px 20px;
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
    object-fit: fill;
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