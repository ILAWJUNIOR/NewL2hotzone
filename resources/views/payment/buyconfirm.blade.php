@extends('layouts.layout')

@section('headsection')
<title>Low amount</title>
@endsection
       
@section('content')

<div class="maincontain container">
    <div class="space container" style="min-height: 600px;">
    <table>
    <tr>
        <td>{{ trans('lang.coins') }}</td>
        <td>{{ $token->coins }}</td>
    </tr>
    <tr>
        <td>{{ trans('lang.amount') }}</td>
        <td>{{ $token->amount }}</td>
    </tr>
    </table>


 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="F5KD9DBY2UP9W" />
        <input type="hidden" name="notify_url" value="{{ url('/paypal_notification') }}" />
        <input type="hidden" name="return" value="{{ url('/advertising') }}" />
        <input type="hidden" name="item_name" value="coins " />
        <input type="hidden" name="item_number" value="{{ $token->token }}" />
        <input type="hidden" name="amount" value="{{ $token->amount }}"  />
        <input type="hidden" name="quantity" id="quantity" value="1" />
        <input type="hidden" name="lc" value="US" />
        <input type="hidden" name="button_subtype" value="services" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="currency_code" value="USD" />
        <input
            type="hidden"
            name="bn"
            value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted"
        />

        <input
            type="image"
            src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif"
            border="0"
            name="submit"
            alt="PayPal - The safer, easier way to pay online!"
            class="btn"
        >
        <img
            alt=""
            border="0"
            src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
            width="1"
            height="1"
        />
    </form>
            
            <style>
                   table{
                   font-size: 14px;
                   
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