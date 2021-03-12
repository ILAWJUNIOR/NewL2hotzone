@extends('layouts.layout')

@section('headsection')
<title>Add server</title>
@endsection

@section('content')
    @if(Auth::guest())  
    <br/>
        <center>@includeIf('userLog')</center>
        <div class="container">
            <div style="height: 800px;">
                
            </div>
        </div>
    @else
      

<div class="maincontain container">
    <div class="space container">
        <div class="page-twelve">
                     <div class="row">
                       <div class="col-md-6">
                            <div class="deal-1">
                                <div class="card" style="width: 90%;">
                                    <div class="card-top">
                                        <i class="fas fa-align-justify"></i>
                                        <p>{{ trans('lang.free') }}</p>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">0 {{ trans('lang.coin_per_month') }}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ trans('lang.3_day_approval') }}</li>
                                            <li class="list-group-item"> {{ trans('lang.blue') }} {{ trans('lang.border') }}</li>
                                            <li class="list-group-item">{{ trans('lang.blue') }} {{ trans('lang.background') }}</li>
                                            <li class="list-group-item">{{ trans('lang.bold') }} {{ trans('lang.name') }}</li>
                                            <li class="list-group-item">{{ trans('lang.banner_ad') }} 120x90 pixel</li>
                                            <li class="list-group-item">{{ trans('lang.short_des') }}</li>
                                            <li class="list-group-item">{{ trans('lang.listed_on_premium_server') }}</li>
                                          </ul>
                                          <a class="btn" href="{{ url('createServer/free') }}">{{ trans('lang.add_now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="deal-2">
                                <div class="card" style="width: 90%;">
                                    <div class="card-top">
                                        <i class="fas fa-align-justify"></i>
                                        <p>{{ trans('lang.premium') }}</p>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">15 {{ trans('lang.coin_per_month') }}</p>
                                        <ul class="list-group">
                                            <li class="list-group-item">{{ trans('lang.instant_approval') }}</li>
                                            <li class="list-group-item">{{ trans('lang.blue') }} {{ trans('lang.border') }}r</li>
                                            <li class="list-group-item">{{ trans('lang.blue') }} {{ trans('lang.background') }}</li>
                                            <li class="list-group-item">{{ trans('lang.bold') }} {{ trans('lang.name') }}</li>
                                            <li class="list-group-item">{{ trans('lang.banner_ad') }} 120x90 pixel</li>
                                            <li class="list-group-item">{{ trans('lang.short_des') }}</li>
                                            <li class="list-group-item">{{ trans('lang.listed_on_premium_server') }}</li>
                                        </ul>
                                        <a class="btn" href="{{ url('createServer/premium/buy') }}">{{ trans('lang.add_now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
    </div>
    </div>
</div>
    

    @endif
    <style>
    #general{
       font-size:initial;
    }
    #general .wrapper .middle-content {
    position: relative;
    display: inline-block;
    width: 913px;
    margin: 0 0 0 12px;
}
    </style>

@endsection
