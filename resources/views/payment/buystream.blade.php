@extends('layouts.layout')

@section('headsection')
<title>Low amount</title>
@endsection
       
@section('content')

<div class="maincontain container">
    <div class="space container" style="min-height: 600px">
        <center>
            <div class="row">
   <div class="offset-md-1 col-md-10" style="border: 1px solid lightgray;margin-top: 100px;">
     <table class="table " >
    <tr>
        <td>{{ trans('lang.coins') }}</td>
        <td>{{ $confirmdata['price'] }}</td>
    </tr>
    <tr>
        <td>{{ trans('lang.amount') }}</td>
        <td>{{ $confirmdata['price'] }}</td>
    </tr>
    </table>


 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="F5KD9DBY2UP9W" />
        <input type="hidden" name="notify_url" value="{{ url('/paypal_notification') }}" />
        <input type="hidden" name="return" value="{{ url('/advertising') }}" />
        <input type="hidden" name="item_name" value="coins " />
        <input type="hidden" name="item_number" value="{{ $confirmdata['token'] }}" />
        <input type="hidden" name="amount" value="{{ $confirmdata['price'] }}"  />
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
        /></center>
    </form>
            
            <style>
                   table{
                   font-size: 15px;
                   
                   } 
                       
            </style>
   </div>
</div>
    </div>
</div>
    @endsection
