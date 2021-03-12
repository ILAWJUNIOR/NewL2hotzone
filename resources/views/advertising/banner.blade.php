@extends('layouts.layout')

@section('headsection')
<title>Low amount</title>
@endsection
       
@section('content')

<div class="maincontain container">
  <div class="space container"  style="min-height: calc(800px - 100px);">
        <div class="page-one">
    <div class="top-row row">
        <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-shopping-cart"></i> {{ trans('lang.buy') }} {{ trans('lang.banner') }}</a></div>
        <div class="col-md-4"><a href="{{ route('myBanneradd') }}" class="btn" > <i class="fas fa-user"></i> {{ trans('lang.my') }} {{ trans('lang.banner') }}</a></div>
        <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> {{ trans('lang.get_more') }} {{ trans('lang.advertising') }}</a></div>
    </div>
<div class="mt-3"></div>
@if ($message = Session::get('success'))
<div class="alert alert-danger alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

    <div class="redbox py-1">
        <p class="redbox_left"><i class="far fa-money-bill-alt"></i></p>
        <p class="redbox_right">{{ Auth::user()->hasMoneyB->amount }} {{ trans('lang.coins') }}</p>
    </div>
    @if(Auth::user()->hasMoneyB->amount <= config('app.ttzc') )
        <div class="list">
            <p class="list_p my-2">{{ trans('lang.low_balance_message') }}</p>
            <p class="list_p my-2"><a href="{{ route('buycoins') }}">{{ trans('lang.buy_more') }} {{ trans('lang.coins') }}</a></p>
        </div>
    @else

    {{ Form::open(array('route'=>'confirm', 'enctype'=> 'multipart/form-data', 'name'=>'banner_add', 'novalidate'=>'')) }}
    <div class="selection" ng-app="textadd" ng-controller="textaddform">
      <?php
      //echo '<pre>';print_r($bannerads);die; 
      ?>
        <select name="add_location" class="form-control my-3" required >
            <option selected disabled>{{ trans('lang.select') }} {{ trans('lang.banner') }} {{ trans('lang.location') }}</option>

                @foreach($bannerads as $key=>$banner)
                    @if((is_array($banner['livebanner'])))
                        <option disabled value="{{$banner['id'] }}" data-cost="{{ $banner['cost']}}" data-image="{{ $banner['image'] }} " data-height="{{ $banner['bannerheight'] }} " data-widht="{{ $banner['bannerwidth'] }} "> {{ $banner['name'] }} </option>
                    @else
                        <option value="{{ $banner['id'] }}" data-cost="{{ $banner['cost']}}" data-image="{{ $banner['image'] }} " data-height="{{ $banner['bannerheight'] }} " data-widht="{{ $banner['bannerwidth'] }} "> {{ $banner['name'] }} </option>
                    @endif
                @endforeach
            </select>
            
            <select class="form-control my-3" name="server" required >
                <option selected disabled>{{ trans('lang.select') }} {{ trans('lang.server') }}</option>
                @foreach($server as $userserver)
                <option value="{{ $userserver->id }}">{{ $userserver->server_name }} </option>
                @endforeach
            </select>
            <input type="url" class="form-control my-3" required name="website" placeholder="http://yourdomain.com">
       
        <input type="file" style="height: auto;" name="banner"  onchange="readURL(this)" accept="image/x-png,image/gif,image/jpeg" required class="form-control my-3" />
 
        <div class="form-group" id="select_period">
            <label for="exampleFormControlSelect1">{{ trans('lang.select') }} {{ trans('lang.period') }}</label>
            <select class="form-control" id="exampleFormControlSelect1" name="days">
                <option selected value="10">10</option>
                <option value="11">11</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
            </select>
        </div>  
       
        </div>
        <div class="select_btn my-3">
            <button type="submit"  class="btn submitbtn">{{ trans('lang.buy_this_text_add') }}</button>
        </div>
    </div>
    {{ Form::close() }}

    @endif
    <img src="" alt="" id="addshow">
    
    @if ($errors->any())
        <ul class="showerrors">
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

  </div>
</div>


@endsection

@section('pagefooterscript')
<style>
option.alread_selected {
    color: #fd0101;
}
.showerrors{
    font-size:14px !important;
}
.alert.alert-danger.alert-block strong
{
  font-size: 15px !important;
}

</style>
<script>

$(document).ready(function(){
    var userhas = {{ $userAmount }};
      $('form[name="banner_add"]').on('submit', function(e){
          
          var $this = $(this);
          var flag = 0;
         
          $this.find('input, select').each(function(i, j){
  
             if(j.hasAttribute("required")){
                 
              if($(j).val() == '' || $(j).val() == null){
                  flag++;
              }
  
             }
          });
  
          if( flag != 0){
              e.preventDefault();
              alert("{{ trans('lang.fill_all_field') }}");
          } 
  
      });
  });
  
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#addshow').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

   
</script>
@endsection
