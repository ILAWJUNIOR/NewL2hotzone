@extends('layouts.layout')

@section('headsection')
<title>Buy Premium server</title>
@endsection

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="maincontain container">
    <div class="space container" style="min-height: 600px;">
        <div class="page-one">
                            <div class="top-row row">
                                <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-shopping-cart"></i> Buy Premium</a></div>
                                <div class="col-md-4"><a href="{{ route('premiumdashboard') }}" class="btn" > <i class="fas fa-user"></i> My Premium</a></div>
                                <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> Get more advertising</a></div>
                            </div>

                            <div class="redbox py-1">
                                <p class="redbox_left"><i class="far fa-money-bill-alt"></i></p>
                                <p class="redbox_right">{{ $userAmount }} Coins</p>
                            </div>


                            @if($userAmount < (int) $data['premuim']->min('value') )
                            <div class="list">
                                <p class="list_p my-2">You have low balance</p>
                                <p class="list_p my-2"><a href="{{ route('buycoins') }}">Bye more coins</a></p>
                                <p> you need at least {{ (int) $data['premuim']->min('value') }}</p>
                            </div>
                            @else
                            {{ Form::open(array('route'=>'purchaseserver')) }}
                            <div class="selection pb-2">
                                <select class="form-control my-3" name="server">
                                    <option selected disabled>Select non Premium server</option>
                                    @foreach($data['server_list'] as $server)
                                       
                                        <option value="{{ $server->id }}" >{{ $server->server_name }}</option>

                                    @endforeach
                                </select>




                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="months">
                                        <option selected disabled>Please select Premium period</option>
                                        @foreach($data['premuim'] as $single)
                                        <option value="{{ $single->id }}" data-price="{{ $single->value }}" data-datys="{{ $single->days }}">{{ $single->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="confim">
                                    <label class="form-check-label" for="gridCheck1">
                                        Confirm your Premium order.
                                    </label>

                                </div>
                                <br>
                                <br>
                                 <div class="g-recaptcha" data-sitekey="6LfPZ7gUAAAAALWZkamxbOGwK6z3jb1KOXRXyxxK"></div>
                                 @if($errors->has('g-recaptcha-response'))
                                    <p style="color:red">Robot verification failed, please try again.</p>
                                 @endif
                                 <br>
                                <div class="select_btn my-3">
                                    @if(!$data['premuim']->count())
                                    <p>  you do not any server. Please <a href="{{ route('newserver') }}" /> Create Server </a> first  </p>
                                    @else
                                    <button type="submit" class="btn submit " id="addserver_submit"  disabled>Add Premium</button>
                                    @endif
                                </div>
                            </div>
                            {{ Form::close() }}
                            <div class="lesstz" style="display:none;background:Red;color:#fff; font-size:14px;"></div>
                           
                            <div class="list payandamound">



                                <!-- <ul class="dashed">
                                    <li class="benifit_list">Cras justo odio</li>
                                    <li class="benifit_list">Dapibus ac facilisis in</li>
                                    <li class="benifit_list">Morbi leo risus</li>
                                    <li class="benifit_list">Porta ac consectetur ac</li>
                                    <li class="benifit_list">Vestibulum at eros</li>
                                </ul> -->
                            </div>
                            @endif
                </div>
    </div>
</div>

<div class="modal hide fade" id="confirm"  >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terms & Condition</h5>
      
      </div>
      <div class="modal-body">
        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

        Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
      </div>
      <div class="modal-footer">
         <button type="button" data-dismiss="modal" class="btn btn-success" id="delete">Accept</button>
         <button type="button" data-dismiss="modal"  class="btn btn_cancle btn-danger">Decine</button>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
    .modal-body
    {
        font-size: 18px !important;
    }
</style>

@endsection

@section('pagefooterscript')
<script>
$(document).ready(function(){

    var userhas = {{$userAmount}},
    userchanges = {
        server:false,
        months:false,
        check:false
    };
    $(document).on('change','[name="server"]',function(){
        userchanges.server = true;
        userchanges.months == true && userchanges.check == true? $('.submit').prop('disabled',false) : $('.submit').prop('disabled',true);
    }).on('change','[name="months"]',function(e){
       
        e.preventDefault();
        var price = $(this).find(":selected").attr("data-price"), days = $(this).find(":selected").attr("data-datys");

        if(userhas < price){
            $('.lesstz').show().text("you need "+(price - userhas)+" more coint to purchase.");
            userchanges.months = false;
        }else{
            $('.lesstz').hide();
            $('.runtime').remove();
            $('.payandamound')
             .append('<p class="runtime">'+price+'Coins will be deducted from your wallet. </p>')
             .append('<p class="runtime">'+days+' days permium server will show after that it will just normal server.</p>');
            userchanges.months = true;
        }
        if(userchanges.server && userchanges.check && userchanges.months){
            
            $('.submit').prop('disabled',false);

        }else{
            
            $('.submit').prop('disabled',true);

        }

    }).on('change','#gridCheck1',function(){
        $(this).is(":checked")? userchanges.check = true : userchanges.check = false;
        userchanges.server ==true && userchanges.months ==true? $('.submit').prop('disabled',false) : $('.submit').prop('disabled',true);
    }).on('submit','form', function(e){
        
        if(!(userchanges.server && userchanges.months && $("[name='confim']").is(":checked"))){

            e.preventDefault();
            alert("Please fill all fields!");
        }
        
    });


});

 $('#addserver_submit').click(function(e){
         var $form = $(this).closest('form');
         e.preventDefault();
         $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        }).on('click', '#delete', function(e) {
            $form.trigger('submit');
        }).on('click', '.btn_cancle', function(e) {
           window.location.href=window.location.origin;
        });

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
