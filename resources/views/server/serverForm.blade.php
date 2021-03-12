<?php
$a = 1;
?>
@extends('layouts.layout')
@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <div class="maincontain container">
       <div class="space container">
             <div class="all_server">
                   
        @if(isset($updateData))
            <?php $data = '/server/'.$form_id.'/edit';?>
            {!! Form::model($updateData,['url' => '/server/'.$form_id.'/edit']) !!}
        
        @else
        
            {!! Form::open(['url' => 'createServer/free']) !!}
        
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif

        @if(Session::has('errordate'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('errordate') }}
        </div>
        @endif

        <div class="server-name">
            <div class="card">
                <h6 class="card-header">Server Name</h6>

                <div class="card-body">
                    {{ Form::label("server_name", "Server name cannot be edited after having been inserted into the database, so please add it correctly. Don't add rates/chronicles in server name.", array("class" => "card-text")) }}
                    {{ Form::text("server_name", null, ["class" => "form-control ". $errors->first("server_name", "is-invalid"),"placeholder" => "Server Name"] ) }}
                    @if($errors->has('server_name'))
                        <div class="errors"> {{ $errors->first('server_name') }} </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="server-status my-4">
            <div class="card">
                <h6 class="card-header">Server status/Platform/Type</h6>
               <div class="row">
                   <div class="col">
                        <div class="card-body">
                                @if($errors->has('servertype_1'))
                                    <div class="errors"> {{ $errors->first('servertype_1') }} </div>
                                @endif
                            <div class="form-check">
                                {{ Form::radio('servertype_1', '1', (old('servertype_1') == '1') ? true : '', ["id" => "servertype1", "class" => "form-check-input"]) }}
                                {{ Form::label("servertype1", "Coming soon", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-check">
                                {{ Form::radio('servertype_1', '2', (old('servertype_1') == '2') ? true : '', ["id" => "servertype2", "class" => "form-check-input"]) }}
                                {{ Form::label("servertype2", "Be until", array("class" => "form-check-label")) }} 
                            </div>
                            <div class="form-check">
                                {{ Form::radio('servertype_1', '3', (old('servertype_1') == '3') ? true : '', ["id" => "servertype3","class" => "form-check-input"]) }}
                                {{ Form::label("servertype3", "Live", array("class" => "form-check-label")) }}
                            </div>
                            <div class="date_pick mb-3 px-3">
                                {{ Form::text("date", null, ["class" => " ". $errors->first("date", "is-invalid"),"placeholder" => "01/25/2018","id"=> "datepicker"] ) }}
                                @if($errors->has('date'))
                                    <div class="errors"> {{ $errors->first('date') }} </div>
                                @endif
                            </div>
                        </div>
                   </div>
                   <div class="col">
                        <div class="card-body">
                                <label for="exampleInputEmail1" class=" {{ $errors->has('serverplatform')? 'errors' : '' }} " >Server platform</label>
                                @if($errors->has('serverplatform'))
                                    <div class="errors"> {{ $errors->first('serverplatform') }} </div>
                                @endif

                            <div class="form-check">
                                 {{ Form::radio('serverplatform', 'L2j', (old('serverplatform') == 'L2j') ? true : '', ["id" => "serverplatform1", "class" => "form-check-input"]) }}
                                 {{ Form::label("serverplatform1", "L2j", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-check">
                                {{ Form::radio('serverplatform', 'L2off', (old('serverplatform') == 'L2off') ? true : '', ["id" => "serverplatform2", "class" => "form-check-input"]) }}
                                {{ Form::label("serverplatform2", "L2off", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                   </div>
                   <div class="col">
                        <div class="card-body">
                                <label class=" {{ $errors->has('type')? 'errors' : '' }} " >Server type</label>
                                @if($errors->has('type'))
                                    <div class="errors"> {{ $errors->first('type') }} </div>
                                @endif
                            <div class="form-check">
                                {{ Form::radio('type', 'normal', (old('type') == 'normal') ? true : '', ["id" => "type1", "class" => "form-check-input"]) }}
                                {{ Form::label("type1", "Normal", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-check">
                                {{ Form::radio('type', 'gve', (old('type') == 'gve') ? true : '', ["id" => "type2", "class" => "form-check-input"]) }}
                                {{ Form::label("type2", "GvE", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-check">
                                {{ Form::radio('type', 'stacksub', (old('type') == 'stacksub') ? true : '', ["id" => "type3", "class" => "form-check-input"]) }}
                                {{ Form::label("type3", "Stacksub", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-check">
                               {{ Form::radio('type', 'multiskill', (old('type') == 'multiskill') ? true : '', ["id" => "type4", "class" => "form-check-input"]) }}
                               {{ Form::label("type4", "MultiSkill", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                   </div>
               </div>
            </div>
        </div>


        <div class="server-ip ">
            <div class="card">
                <h6 class="card-header">Server IP and ports</h6>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label("loginIp", "Login server IP", array("class" => "")) }}
                            {{ Form::text("loginIp", null, ["class" => "form-control ". $errors->first("loginIp", "is-invalid"),"placeholder" => "127.0.0.1", "id" => "loginIp"] ) }}
                            @if($errors->has('loginIp'))
                                <div class="errors"> {{ $errors->first('loginIp') }} </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{ Form::label("serverIp", "Game server IP", array("class" => "")) }}
                            {{ Form::text("serverIp", null, ["class" => "form-control ". $errors->first("serverIp", "is-invalid"),"placeholder" => "127.0.0.1", "id" => "serverIp"] ) }}
                            @if($errors->has('serverIp'))
                                <div class="errors"> {{ $errors->first('serverIp') }} </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label("loginPort", "Login server Port", array("class" => "")) }}
                            {{ Form::text("loginPort", null, ["class" => "form-control ". $errors->first("loginPort", "is-invalid"),"placeholder" => "2106", "id" => "loginPort"] ) }}
                            @if($errors->has('loginPort'))
                                <div class="errors"> {{ $errors->first('loginPort') }} </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{ Form::label("serverPort", "Game server Port", array("class" => "")) }}
                            {{ Form::text("serverPort", null, ["class" => "form-control ". $errors->first("serverPort", "is-invalid"),"placeholder" => "7777", "id" => "serverPort"] ) }}
                            @if($errors->has('serverPort'))
                                <div class="errors"> {{ $errors->first('serverPort') }} </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chronicle my-4">
            <div class="card">
                <h6 class="card-header">Chronicle and rates</h6>
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Chronicle</label>
                    {{ Form::select('chronicle', [
                        'chronicle-1' => 'Chronicle 1', 
                        'chronicle-2' => 'Chronicle 2',
                        'chronicle-3' => 'Chronicle 3',
                        'chronicle-4' => 'Chronicle 4',
                        'chronicle-5' => 'Chronicle 5',
                        'interlude' =>  'Interlude',
                        'kamael'    =>  'Kamael',
                        'hellbound' =>  'Hellbound',
                        'gracia1'   =>  'Gracia 1',
                        'gracia2'   =>  'Gracia 2',
                        'gracia-final'  =>  'Gracia Final',
                        'gracia-epilogue'   =>  'Gracia Epilogue',
                        'freya' =>  'Freya',
                        'highfive'  =>  'High Five',
                        'goddess-of-destruction-awakening'  =>  'Goddess of Destruction Awakening',
                        'goddess-of-destruction-harmony'    =>  'Goddess of Destruction Harmony',
                        'goddess-of-destruction-tauti'  =>  'Goddess of Destruction Tauti',
                        'goddess-of-destruction-glory-days' =>  'Goddess of Destruction Glory Days',
                        'goddess-of-destruction-lindvior'   =>  'Goddess of Destruction Lindvior',
                        'epic-tale-of-aden-ertheia' =>      'Epic Tale of Aden Ertheia'    ,
                        'infinite-odyssey'  =>      'Infinite Odyssey',
                        'classic10' =>  'Classic 1.0',
                        'classic15' =>  'Classic 1.5',
                        'classic20' =>  'Classic 2.0',
                        'classic25' =>  'Classic 2.5',
                        'helios'    =>  'Helios',
                        'grand-crusade' =>  'Grand Crusade'
                        ],old('chronicle'), ['placeholder' => 'Select chronicle', 'class' => 'form-control selectpicker '.$errors->has('chronicle','is-invalid'), 'id' => 's-chronicle']) }}
                    @if($errors->has('chronicle'))
                        <div class="errors"> {{ $errors->first('chronicle') }} </div>
                    @endif

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label("xpRate", "EXP rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("xpRate", null, ["class" => "form-control ". $errors->first("xpRate", "is-invalid"),"placeholder" => " ", "id" => "xpRate", "maxlength" => "5"] ) }}
                            </div>
                            @if($errors->has('xpRate'))
                                <div class="errors"> {{ $errors->first('xpRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("dropRate", "DROP rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("dropRate", null, ["class" => "form-control ". $errors->first("dropRate", "is-invalid"),"placeholder" => " ", "id" => "dropRate", "maxlength" => "5"] ) }}
                            </div>
                            @if($errors->has('dropRate'))
                                <div class="errors"> {{ $errors->first('dropRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("safeRate", "Safe enchant", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("safeRate", null, ["class" => "form-control ". $errors->first("safeRate", "is-invalid"),"placeholder" => " ", "id" => "safeRate", "maxlength" => "5"] ) }}
                            </div>
                            @if($errors->has('safeRate'))
                                <div class="errors"> {{ $errors->first('safeRate') }} </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            {{ Form::label("spRate", "SP rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("spRate", null, ["class" => "form-control ". $errors->first("spRate", "is-invalid"),"placeholder" => " ", "id" => "spRate", "maxlength" => "5"] ) }}
                            </div>
                            @if($errors->has('spRate'))
                                <div class="errors"> {{ $errors->first('spRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("adenaRate", "ADENA rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("adenaRate", null, ["class" => "form-control ". $errors->first("adenaRate", "is-invalid"),"placeholder" => " ", "id" => "adenaRate", "maxlength" => "5"] ) }}
                            </div>
                            @if($errors->has('adenaRate'))
                                <div class="errors"> {{ $errors->first('adenaRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("maxRate", "Max enchant", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("maxRate", null, ["class" => "form-control ". $errors->first("maxRate", "is-invalid"),"placeholder" => " ", "id" => "maxRate", "maxlength" => "5"] ) }}
                            </div>
                            @if($errors->has('maxRate'))
                                <div class="errors"> {{ $errors->first('maxRate') }} </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="good">
            <div class="card">
                <h6 class="card-header">Good to know</h6>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-check">
                                
                                {{ Form::checkbox('SPrate', 'SP rate', (old('SPrate') == 'SP rate') ? true : '', 
                                ["id" => "sprate", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("sprate", "SP rate", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('NPCbuffer', 'NPC buffer', (old('NPCbuffer') == 'NPC buffer') ? true : '',
                                ["id" => "NPCbuffer", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("NPCbuffer", "NPC buffer", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('GlobalGK', 'Global GK', (old('GlobalGK') == 'Global GK') ? true : '',
                                ["id" => "GlobalGK", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("GlobalGK", "Global GK", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-check">
                                {{ Form::checkbox('Customzone', 'Custom zone', (old('Customzone') == 'Custom zone') ? true : '',
                                ["id" => "Customzone", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Customzone", "Custom zone", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('Customweapon', 'Custom weapon', (old('Customweapon') == 'Custom weapon') ? true : '',
                                ["id" => "Customweapon", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Customweapon", "Custom weapon", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('Customarmor', 'Custom armor', (old('Customarmor') == 'Custom armor') ? true : '',
                                ["id" => "Customarmor", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Customarmor", "Custom armor", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-check">
                                {{ Form::checkbox('Offlineshop', 'Offline shop', (old('Offlineshop') == 'Offline shop') ? true : '',
                                ["id" => "Offlineshop", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Offlineshop", "Offline shop", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-info my-4">
            <div class="card">
                <h6 class="card-header">Additional Information</h6>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Server language</label>
                        <?php $selectoption = []; ?>
                        @foreach ($select as $selec)
                            <?php $selectoption[$selec->code] = $selec->lang; ?>
                        @endforeach
                        {{ Form::select('language', $selectoption, old('language'), ['placeholder' => 'Select Language', 'class' => 'form-control selectpicker '.$errors->has('language','is-invalid'), 'id' => 'language']) }}

                        @if($errors->has('language'))
                            <div class="errors"> {{ $errors->first('language') }} </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Server description</label>
                        {{ Form::textarea('desc', null,["class" => "form-control ". $errors->first("desc", "is-invalid"), "placeholder" => "Your server description.","cols" => "130","rows" =>"10"]) }}
                        @if($errors->has('desc'))
                            <div class="errors"> {{ $errors->first('desc') }} </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Server website</label>
                        {{ Form::url('website', null,["class" => "form-control ". $errors->first("website", "is-invalid"), "placeholder" => "http://"]) }}
                        @if($errors->has('website'))
                            <div class="errors"> {{ $errors->first('website') }} </div>
                        @endif
                    </div>
                   
                    <div class="form-group has-feedback has-error">
                        <div class="checkbox {{ $errors->has('tos1')? 'errors':'' }}" >
                            {{ Form::checkbox('tos1', null, (old('tos1') == 'on') ? true : '', ["id" => "tos-agree", "class" => "position-static"]) }}
                            <label for="tos-agree">I have read the <a href="{{ url('terms')}}" target="_blank">Terms and Conditions</a> and i agree with the contents       </label>
                        </div>
                        <i class="form-control-feedback fa fa-times" data-fv-icon-for="tos1" style=""></i>
                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="tos1" data-fv-result="INVALID" style="">You must agree to our terms and conditions to add your server</small>
                    </div>
                    <div class="form-group has-feedback has-error">
                        <div class="checkbox {{ $errors->has('tos2')? 'errors':'' }}">
                            <input id="tos-agree2" class="styled" name="tos2" type="checkbox"  {{(old('tos2') == 'on') ? 'checked' : ''}}>
                            <label for="tos-agree2">By adding a server/website to our lists you agreethat you are the representative of that server/websiteand you take full responsibility for its legality</label>
                        </div><i class="form-control-feedback fa fa-times" data-fv-icon-for="tos2" style=""></i>
                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="tos2" data-fv-result="INVALID" style="">Please check this checkbox if you have read and you agree to our rules</small>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="g-recaptcha" data-sitekey="6LfPZ7gUAAAAALWZkamxbOGwK6z3jb1KOXRXyxxK"></div>
             @if($errors->has('maxRate'))
                <div class="errors"> {{ $errors->first('g-recaptcha-response') }} </div>
            @endif
            <br>
        </div>

        <button class="btn btn-primary" id="addserver_submit" type="submit">Add my server</button>
</div>
       </div>
   </div>

{!! Form::close() !!}
    <style>
    .errors {
        color: red !important;
    }
    #general{font-size: 16px;}
    #general .wrapper .middle-content{width:890px;}
    .form-check-label {
    margin: 0 24px;
    /* font-size: 16px; */
   
}
 #tos-agree{margin:0;}
 #tos-agree2{margin:0;}
 .btn-outline-secondary {
    padding: 16px;
}



</style>


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
@endsection

@section('pagefooterscript')
<script src="{{ url('js/popper.min.js') }}"></script>
<!-- <script src="{{ url('js/bootstrap.min.js') }}"></script> -->
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function(){
        $('input[name="servertype_1"]').on("change", function(){
            $('input[name="servertype_1"]:checked').is("#servertype3") ? $('#datepicker').parent('.gj-datepicker').hide() : $('#datepicker').parent('.gj-datepicker').show(); 
        })
       $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            minDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate())
        });
        $('input[name="servertype_1"]:checked').is("#servertype3") ? $('#datepicker').parent('.gj-datepicker').hide() : $('#datepicker').parent('.gj-datepicker').show();
    });
</script>

<script>
    

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
<a  href="{{ $imageBanner->where('id','=', 1)->first()->livebanner ? $imageBanner->where('id','=', 1)->first()->livebanner->website : '#' }}">
    <img src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 1)->first()->livebanner? $imageBanner->where('id','=', 1)->first()->livebanner->liveimages : 'no-image.png' }}" />
</a>
@endsection

@section('rightside')
<a  href="{{ $imageBanner->where('id','=', 3)->first()->livebanner ? $imageBanner->where('id','=', 3)->first()->livebanner->website : '#' }}">
<img src="{{ url('/images') }}/imagesAdd/{{ !empty($imageBanner->where('id','=', 3)->first()->livebanner) ? $imageBanner->where('id','=', 3)->first()->livebanner->liveimages : 'no-image.png' }}" />
</a>
@endsection