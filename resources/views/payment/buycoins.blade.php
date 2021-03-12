@extends('layouts.layout')

@section('headsection')
<title>Low amount</title>
@endsection
       
@section('content')
<div class="maincontain container">
    <div class="space container" style="min-height: 1000px !important">
        <div class="middle-content">
           <div class="page-thirteen centered">
              <div class="top-row">
                 <a href="https://l2hotzone.com/buycoins" class="btn active" > <i class="fas fa-shopping-cart"></i> {{ trans('lang.buy') }} {{ trans('lang.coins') }}</a>
                 <a href="https://l2hotzone.com/advertising" class="btn"> <i class="fas fa-user"></i>{{ trans('lang.get_more') }} {{ trans('lang.advertising') }}</a>
              </div>
              <div class="buy" id="arrows_disable">
                 <select class="form-control mt-3" disabled>
                    <option>{{ trans('lang.buy') }} HotZone {{ trans('lang.coins') }}</option>
                 </select>
                 <div class="buy-table">
                    <table class="table">
                       <thead>
                          <tr>
                             <th scope="col">{{ trans('lang.coins') }}</th>
                             <th scope="col">{{ trans('lang.discount') }}</th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td>100</td>
                             <td>5%</td>
                          </tr>
                          <tr>
                             <td>200</td>
                             <td>10%</td>
                          </tr>
                          <tr>
                             <td>300</td>
                             <td>15%</td>
                          </tr>
                          <tr>
                             <td>500</td>
                             <td>20%</td>
                          </tr>
                          <tr>
                             <td>800</td>
                             <td>25%</td>
                          </tr>
                       </tbody>
                    </table>
                 </div>
              </div>
              <div class="background">
                 <span class="soon py-2">{{ trans('lang.unverified_paypal_msg') }}</span>
                 <p>1 {{ trans('lang.month')}} {{ trans('lang.premium')}} 15 {{ trans('lang.coins')}}</p>
                 {!! Form::open(['url' => route('payconfirm')]) !!}
                 <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ trans('lang.coins')}} {{ trans('lang.amount')}}</label>
                    <div class="col-sm-10">
                       <input type="number" class="form-control cEvent" name="totalcoins" value="10" min="10" id="coinsAmount" placeholder="10">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ trans('lang.total') }} {{ trans('lang.price') }} </label>
                    <div class="col-sm-10">
                       <div class="input-group">
                          <input type="hidden" class="form-control" name="totalprice" >
                          <input type="text" class="form-control"  id="totalTZ" placeholder="10" aria-describedby="inputGroupPrepend2" disabled>
                          <div class="input-group-prepend">
                             <span class="input-group-text" id="inputGroupPrepend2">$</span>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">{{ trans('lang.payment') }}</label>
                    <div class="col-sm-10">
                       <select class="form-control">
                          <option>Paypal</option>
                          <option disabled>Payment</option>
                          <option disabled>BHIM</option>
                          <option disabled>Google Pay</option>
                       </select>
                    </div>
                 </div>
                 <div class="pay text-center py-3">
                    <button type="image" 
                       name="submit"
                       class="btn"
                       >
                    {{ trans('lang.buy') }} HotZone {{ trans('lang.coins') }}
                    </button>    
                 </div>
                 </form>
                <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non adipisci voluptate consectetur sequi perferendis voluptatum dolor itaque quia nobis, <a href="">corrupti repellat quae? Deleniti </a> hic, eaque est porro harum dignissimos laboriosam!  </p> -->
              </div>
           </div>
        </div>
   </div>
</div>
<style>
    .middle-content{
        font-size:14px !important;
    }
</style>
@endsection

@section('pagefooterscript')
  <script>
    $(document).ready(function()
    {
      
        $('#coinsAmount').on('change', function(e)
            {
                var v, p;
                v = Math.abs(parseInt(e.target.value));

                if (v >= 100) {
                    p = v - Math.floor(v * 5 / 100);
                }

                if (v >= 200) {
                    p = v - Math.floor(v * 10 / 100);
                }

                if (v >= 400) {
                    p = v - Math.floor(v * 15 / 100);
                }

                if (v >= 800) {
                    p = v - Math.floor(v * 20 / 100);
                }

                if (v >= 1600) {
                    p = v - Math.floor(v * 25 / 100);
                }

                if (v >= 4000) {
                    p = v - Math.floor(v * 30 / 100);
                }

                if (v < 100) {
                    p = v;
                }

                if (v < 10) {
                    p = 10;
                    v = 10;
                }
                $('input[name="totalprice"],#totalTZ').val(p);
            }
        );

    });
  </script>
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