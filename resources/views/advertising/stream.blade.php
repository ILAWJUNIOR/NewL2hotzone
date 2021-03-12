@extends('layouts.layout')

@section('headsection')
<title>My Stream</title>
@endsection
       
@section('content')
<style type="text/css">
    .emsg{
    color: red;
    font-size: 14px;
    }
    .fsize{
        font-size: 15px;
    }
</style>
<div class="maincontain container">
	<div class="space container">
        <div class="page-one">
            <div class="top-row row">
                <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-shopping-cart"></i> {{ trans('lang.buy') }} {{ trans('lang.stream') }}</a></div>
                <div class="col-md-4"><a href="{{ url('mystream') }}" class="btn" > <i class="fas fa-user"></i> {{ trans('lang.my') }} {{ trans('lang.stream') }}</a></div>
                <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> {{ trans('lang.get_more') }} {{ trans('lang.advertising') }}</a></div>
            </div>
               </div>
		{{ Form::open() }}

		<input type="text" class="form-control my-3"  name="twitch_title" id="twitch_title" placeholder="Twitch Title"  value="{{ old('twitch_title' )}}"><p class="emsg">{{ $errors->first('twitch_title') }}</p>
		<input type="url" class="form-control my-3"  name="twitch_url"  id="twitch_url" value="{{ old('twitch_url' )}}"  placeholder="https://player.twitch.tv"><p class="emsg">{{ $errors->first('twitch_url') }}</p>
		<div class="form-group" id="cost">
            <select class="form-control" id="exampleFormControlSelect1" value="{{ old('streamprice' )}}" id="streamprice"  name="streamprice">
                <option selected value="">Select Twitch Cost</option>
                <option value="5">5 Coins for 10 Days</option>
                <option value="10">10 Coins for 25 Days</option>
            </select><p class="emsg">{{ $errors->first('streamprice') }}</p>
        </div>  
        <div class="form-group" id="cost">
            <select class="form-control" id="exampleFormControlSelect1" id="streamlocation" value="{{ old('streamlocation' )}}" name="streamlocation">
                <option selected value="">{{ trans('lang.select') }} {{ trans('lang.location') }}</option>
               @foreach($position as $key=>$value)

                    @if(isset($a[$key]))
                        <option disabled value="{{ $key }}">{{ $value }}</option>
                     @else   
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endif  

               @endforeach 
            </select>

          <p class="emsg">{{ $errors->first('streamlocation') }}</p>
        </div>  
        <label style="color: black;font-size: 14px;">{{ trans('lang.background') }} {{ trans('lang.color') }}</label>
        <input type="color" style="width: 70px;" class="form-control my-3"    id="bgcolor" value="{{ old('bgcolor','#EE7752' )}}"  name="bgcolor"><p class="emsg">{{ $errors->first('bgcolor') }}</p>
        <label style="color: black;font-size: 14px;">{{ trans('lang.text_ad') }} {{ trans('lang.color') }}</label>
        <input type="color" style="width: 70px;" class="form-control my-3" value="{{ old('textcolor','#FFFFFF' )}}" id="textcolor"name="textcolor"><p class="emsg">{{ $errors->first('textcolor') }}</p>
         <div class="select_btn my-3">
            <button type="submit"  name="stream_data"  class="btn btn-danger form-control">{{ trans('lang.buy_this_stream') }}</button>

    </div>
		{{ Form::close() }}
         @if(isset($msg['success']))
            <div class="alert alert-success fsize">
                <strong>Success! </strong>{{ $msg['success'] }}
            </div>
        @elseif(isset($msg['error']))
            <div class="alert alert-success fsize">
                <strong>Danger! </strong>{{ $msg['error'] }}
            </div>
        @endif
   
	</div>
</div>
@endsection



<!-- <script type="text/javascript">
        function cvalidation()
        {
            var cname=document.getElementById("cname").value;
            if(cname=="")
            {
                
              alert();  
            }
            
        }
    </script> -->