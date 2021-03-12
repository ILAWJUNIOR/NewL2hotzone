@extends('layouts.layout')

@section('headsection')
<title>Low amount</title>
@endsection
       
@section('content')


<div class="maincontain container">
    <div class="space container" style="min-height: 700PX;">
        <div class="page-three">
    <div class="top-row row">
        <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-shopping-cart"></i> {{ trans('lang.buy') }} {{ trans('lang.text') }} {{ trans('lang.premium') }}</a></div>
        <div class="col-md-4"><a href="{{ route('mytextads') }}" class="btn" > <i class="fas fa-user"></i> {{ trans('lang.my') }} {{ trans('lang.text') }} {{ trans('lang.premium') }}</a></div>
        <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> {{ trans('lang.get_more') }} {{ trans('lang.advertising') }}</a></div>
    </div>

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
    {{ Form::open(array('route'=>'ptext')) }}
    <div class="selection" ng-app="textadd" ng-controller="textaddform">
        
        <select class="form-control my-3">
            <option>{{ trans('lang.text') }} {{ trans('lang.advertising') }} {{ trans('lang.available_on') }} l2hotzone.com</option>
        </select> 
        <div class="form-group">
         
          <select id="addselection" class="form-control" name="addlocation">
                <option selected disabled>{{ trans('lang.select') }} {{ trans('lang.add') }} {{ trans('lang.location') }}</option>
                @foreach($addlist as $key=>$list)
                @if((is_array($list['liveadds'])))
                    <option  class="alread_selected" value="{{ $list['id'] }}" data-cost="{{ $list['cost'] }}" data-disabled=true  data-tilldate="{{ $list['liveadds']['till_date'] }} GMT" data-image="{{ url($list['image']) }}">{{ $list['Name'] }}</option>
                @else
                    <option value="{{ $list['id'] }}" data-cost="{{ $list['cost'] }}" data-image="{{ url($list['image']) }}">{{ $list['Name'] }}</option>
                @endif
                @endforeach
            </select>
        </div>  
        <div class="col-md-12">
            <div class="row">
                      <div class="col-md-6">
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
       
                <select class="form-control my-3" name="server" id="server_values">
                    <option selected disabled> {{ trans('lang.select') }}  {{ trans('lang.server') }}</option>
                    @foreach($servers as $server)
                        
                        <option value="{{ $server->id }}" >{{ $server->server_name }}</option>

                    @endforeach
                </select> 
                <div class="select_btn my-3">
                    <button type="submit" disabled class="btn submitbtn">{{ trans('lang.buy_this_text_add') }}</button>
                </div>
        </div> 
        <div class="col-md-6" id="view_dispay" style="display: none;">
            
            <h4 class=""><span id="detailsPrice">66</span> {{ trans('lang.coins') }} for <span id="detailsPeriod">6</span> {{ trans('lang.days') }}</h4> 
            <h5 id="expire"><span id="validity"></span></h5> 
            <div class="clean"></div> 
            <a id="linkImage" href="https://l2topzone.com/shop/shop_serverlist_2.png" data-lity=""> 

                <img id="text_image" class="img-responsive"  alt="Location of custom"> 
            </a>
            
        </div>
            </div>
        </div>
        
        
        </div>
        
   <!--  </div> -->
    {{ Form::close() }}

    @endif
</div>
    </div>
</div>

@endsection

@section('pagefooterscript')
<style>
option.alread_selected {
    color: #fd0101;
}</style>
<script>


    $(document).ready(function(){
    var userhas = {{$userAmount}};
    var error = {
        server:false,
        amount:true
    };

    $(document).on('change','#addselection', function(){
       
        var selecte = $(this).find(":selected");
        $('#view_dispay').show();

        //console.log('hello');
        
        if(selecte.hasClass("alread_selected")){
             //$(this).css('color','red');
             var date = new Date(selecte.attr('data-tilldate'));
             $('.whenalread').show().text(date.toLocaleString());
             $('.submitbtn').prop("disabled",true);
             error.server = false;
        
        }else{
                 $('.whenalread').hide();
                 $(this).css('color','initial');
                var cost = parseInt(selecte.attr('data-cost'));  
                 
            if(userhas < (cost * parseInt($('#exampleFormControlSelect1').val()))){

                alert('you do not have enough balance!');
                $('.submitbtn').prop("disabled",true);
                error.server = false;

             }else{
                
                $('.submitbtn').prop("disabled",false);
                error.server = true;


             }
         }

         var cost = parseInt(selecte.attr('data-cost')); 
         var till_date = selecte.attr("data-tilldate");

         
         var details_price = cost * parseInt($('#exampleFormControlSelect1').val());
         $('#validity').removeClass('text-danger');
         $('#validity').removeClass('text-success');
         if(till_date !== undefined )
         {
            $('#validity').addClass('text-danger');
            $('#validity').text('Expire: '+till_date);
            $('#exampleFormControlSelect1').prop("disabled", true);
            $('#server_values').prop("disabled", true);
         }
         else
         {
             $('#validity').addClass('text-success');
             $('#validity').text('Available to buy now');
             $('#exampleFormControlSelect1').prop("disabled", false);
            $('#server_values').prop("disabled", false);
         }
         
        
         


         $('#detailsPrice').text(details_price);
         $('#detailsPeriod').text($('#exampleFormControlSelect1').val());

         

         

        $('#text_image').show().attr('src',selecte.attr("data-image"));

     

    }).on('change','#exampleFormControlSelect1',function(e){
        
        // if()/
        if($('#addselection :selected').is(':first-child')){
            
            $(this).find(':first-child').prop('selected',true);
            alert('select server first!');
            
        }else{
            var cost = parseInt($('#addselection option:selected').attr('data-cost'));  
            if(userhas < (cost * parseInt($('#exampleFormControlSelect1').val()))){

                alert('you do not have enough balance!');
                $('.submitbtn').prop("disabled",true);
                error.amount = false;

                }
                else
                {

                    $('.submitbtn').prop("disabled",false);
                    error.amount = true;


                    var cost = $('#addselection option:selected').attr('data-cost');
 
                    var details_price = cost * parseInt($('#exampleFormControlSelect1').val());
                    $('#detailsPrice').text(details_price);
                    $('#detailsPeriod').text($('#exampleFormControlSelect1').val());



                }

        }

    })
    .on('submit','form', function(e){
    
      
        if(!(error.server && error.amount &&  $('select[name="server"]').val() != null ))
        {
            console.log(error);
             e.preventDefault();
              alert("fill complete form!");
         }
    });



    })
</script>
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
