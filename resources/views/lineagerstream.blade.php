@extends('layouts.layout')

@section('headsection')
<title>My Stream</title>
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,700,900,400italic,700italic,900italic);

*,
:before,
:after {
    box-sizing: border-box;
}




#container {
    display: flex;
    flex-direction: column;
    float: left;
    justify-content: center;
    min-height: 100vh;
    padding: 1em;
    width: 100%;
}

h1 {
    animation: text-shadow 1.5s ease-in-out infinite;
    font-size: 5em;
    font-weight: 900;
    line-height: 1;
}

h1:hover {
    animation-play-state: paused;
}

@keyframes text-shadow {
    0% {  
        transform: translateY(0);
        text-shadow: 
            0 0 0 #0c2ffb, 
            0 0 0 #2cfcfd, 
            0 0 0 #fb203b, 
            0 0 0 #fefc4b;
    }

    20% {  
        transform: translateY(-1em);
        text-shadow: 
            0 0.125em 0 #0c2ffb, 
            0 0.25em 0 #2cfcfd, 
            0 -0.125em 0 #fb203b, 
            0 -0.25em 0 #fefc4b;
    }

    40% {  
        transform: translateY(0.5em);
        text-shadow: 
            0 -0.0625em 0 #0c2ffb, 
            0 -0.125em 0 #2cfcfd, 
            0 0.0625em 0 #fb203b, 
            0 0.125em 0 #fefc4b;
    }
    
   60% {
        transform: translateY(-0.25em);
        text-shadow: 
            0 0.03125em 0 #0c2ffb, 
            0 0.0625em 0 #2cfcfd, 
            0 -0.03125em 0 #fb203b, 
            0 -0.0625em 0 #fefc4b;
    }

    80% {  
        transform: translateY(0);
        text-shadow: 
            0 0 0 #0c2ffb, 
            0 0 0 #2cfcfd, 
            0 0 0 #fb203b, 
            0 0 0 #fefc4b;
    }
}

@media (prefers-reduced-motion: reduce) {
    * {
      animation: none !important;
      transition: none !important;
    }
}
.mytitle{
    height: 40px;
    color: #fff;
    background-color:  #23D5AB;
    background-size: 400% 400%;
   
}

</style>
@endsection
       
@section('content')
<div class="maincontain container">
	<div class="space container">
		
 
       <div style="margin-top: 40px;"><center> <h1>{{ trans('lang.welcome_lintage_2_streaming') }}</h1></center></div>



        <div class="row" style="margin-top: 40px;">
                  <div class="col-md-6">
                  	@if(isset($a['1']))
                        <div style="background-color: {{ $a['1']->bgcolor }}" class="mytitle">
                              <h2 style="text-align: center; color:{{ $a['1']->textcolor  }} ">{{ $a['1']->title }}</h2>
                        </div>
                        <div class="">
                            <iframe width="100%" height="300" src="{{ $a['1']->url }}&autoplay=false&muted=true"   frameborder="0"  allowfullscreen></iframe>
                        </div>
                        @else
                        	<a href="{{ url('stream') }}"><img  width="100%;" src="{{ url('images/imagesAdd/screen0.jpg') }}"></a>
                        @endif
                  </div>
                  <div class="col-md-6">
                  	@if(isset($a['2']))
                        <div style="background-color: {{ $a['2']->bgcolor }}" class="mytitle">
                              <h2 style="text-align: center; color:{{ $a['2']->textcolor  }}">{{ $a['2']->title }}</h2>
                        </div>
                        <div class="">
                            <iframe width="100%" height="300" src="{{ $a['2']->url }}&autoplay=false&muted=true"  frameborder="0" allow="accelerometer; autoplay=0; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                         @else
                        	<a href="{{ url('stream') }}"><img  width="100%;" src="{{ url('images/imagesAdd/screen1.jpg') }}"></a>
                        @endif
                  </div>
         </div>  
         <div class="row" style="margin-top: 40px;">
                  <div class="col-md-6">
                  	@if(isset($a['3']))
                        <div style="background-color: {{ $a['3']->bgcolor }}" class="mytitle">
                              <h2 style="text-align: center;color:{{ $a['3']->textcolor  }}">{{ $a['3']->title }}</h2>
                        </div>
                        <div class="">
                            <iframe width="100%" height="300" src="{{ $a['3']->url }}&autoplay=false&muted=true" mute="yes" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @else
                        	<a href="{{ url('stream') }}"><img  width="100%;" src="{{ url('images/imagesAdd/screen2.jpg') }}"></a>
                        @endif
                  </div>
                 <div class="col-md-6">
                  	@if(isset($a['4']))
                        <div style="background-color: {{ $a['4']->bgcolor }}" class="mytitle">
                              <h2 style="text-align: center;color:{{ $a['4']->textcolor  }}">{{ $a['4']->title }}</h2>
                        </div>
                        <div class="">
                            <iframe width="100%" height="300" src="{{ $a['4']->url }}&autoplay=false&muted=true" mute="yes" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @else
                        	<a href="{{ url('stream') }}"><img  width="100%;" src="{{ url('images/imagesAdd/screen3.jpg') }}"></a>
                        @endif
                  </div>
         </div>
         <div class="row" style="margin-top: 40px;">
                  <div class="col-md-6">
                  	@if(isset($a['5']))
                        <div style="background-color: {{ $a['5']->bgcolor }}" class="mytitle">
                              <h2 style="text-align: center;color:{{ $a['5']->textcolor  }}">{{ $a['5']->title }}</h2>
                        </div>
                        <div class="">
                            <iframe width="100%" height="300" src="{{ $a['5']->url }}&autoplay=false&muted=true" mute="yes" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @else
                        	<a href="{{ url('stream') }}"><img  width="100%;" src="{{ url('images/imagesAdd/screen4.jpg') }}"></a>
                        @endif
                  </div>
                  <div class="col-md-6">
                  	@if(isset($a['6']))
                        <div style="background-color: {{ $a['6']->bgcolor }}" class="mytitle">
                              <h2 style="text-align: center; color:{{ $a['6']->textcolor  }}">{{ $a['6']->title }}</h2>
                        </div>
                        <div class="">
                            <iframe width="100%" height="300" src="{{ $a['6']->url }}&autoplay=false&muted=true"   mute="yes" frameborder="0" allow="accelerometer;encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @else
                        	<a href="{{ url('stream') }}"><img  width="100%;" src="{{ url('images/imagesAdd/screen5.jpg') }}"></a>
                        @endif
                  </div>
         </div>
         
    
	</div>
</div>
@endsection

