@extends('layouts.layout')


@section('content')


<div class="maincontain container">
    <div class="space container"  style="min-height: calc(800px - 100px);">

            <main role="main" class="container">

    
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-light  rounded shadow-sm">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/addserver')}}" tabindex="-1" aria-disabled="true">Creat New Server</a>
            </li>
        </ul>
    </div>
    

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Your Server </h6>


        @if(empty($data) || empty($servers))
         
               <p>  you do not have any server. </p>
          
        @endif

        @forelse ($servers as $server)
            <a href="{{url('/server/'.$server['id'].'/edit')}}" class="{{ $server['serverType']? 'paidserver': 'freeserver'}}"> 
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                         <strong class="d-inline-block text-gray-dark">{{$server['server_name']}}</strong>
                         @if($server['status'] == "1")
                         <strong class="d-inline-block float-right" style="color: green">Active</strong>  
                         @else
                         <strong class="d-inline-block float-right" style="color: red;">Deactive</strong>  
                         @endif
                    </p>
                   
                </div>
            </a>
            <!-- <div>
            <p> Vote code</p>
                    <p>
                    <code>{{ $server['token'] }}</code>
                    
                    </p>
            </div> -->
        @empty
            <div class="media text-muted pt-3">
                you do not have any server.
            </div> 
        @endforelse
    </div>
  </main>
 <style>
 p{
     font-size:14px !important;
     word-break: break-word;
 }
 </style>

    </div>
</div>    

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

