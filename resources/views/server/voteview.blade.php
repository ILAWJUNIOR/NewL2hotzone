    @extends('layouts.layout')
@section('content')
<div class="maincontain container">
    <div class="space container" style="min-height: 600px;">
        <div class="col-md-12">
             @if(isset($_SESSION['vote']) && $_SESSION['vote']!='')
                    <div class="alert alert-info">
                       <h4>{{ $_SESSION['vote'] }}</h4>
                     </div>
                     @php
                     $_SESSION['vote'] = '';
                     @endphp
            @endif
        </div>
        <div class="col-md-12">
            <div align="center">
                @if(isset($time) && !empty($time))
                <div class="alert alert-success"><h4>You can vote every 12 hours.</h4> </div>
                @endif
                @if(!Auth::id())
                <div class="alert alert-danger"> <h4>In order to vote for this server you must be logged in ! <br> <a href="#" data-toggle="modal" data-target="#loginModal">Sign In / Register</a> </h4> </div>
                @else
                
                <h2>Hello <b>{{ Auth::user()->member_name }}</b>,</h2> 
                @if(isset($time) && !empty($time))
                <div class="alert alert-danger"><h4>You have {{ $time['hours'] }} hours, {{ $time['minutes'] }} minutes &amp; {{ $time['seconds'] }} seconds until next vote!</h4>
                </div>
                @else
                <h5>Just click the vote button and you are done!</h5>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 col-lg-12">
                        <form action="{{ $url}}" method="post">
                             {{ csrf_field() }}
                            <input type="submit" class="btn btn-lg btn-primary" name="" value="Vote for {{ $server_name}}">    
                            }
                        </form>
                        
                        
                    </div>
                </div>
                @endif
                @endif
                
            </div> 
        </div>

</div>
</div>
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