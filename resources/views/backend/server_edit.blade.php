@extends('backend.common.main')
@section('title', 'Server Manage ')
@section('content')


    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        Server
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('costa') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Server</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if(Session::has('errordate'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('errordate') }}
        </div>
    @endif

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit server</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
              {!! Form::open(['url' => 'costa/server_update']) !!}
              <input type="hidden" name="user_id" value="{{ $servers['user_id']}}">
              <input type="hidden" name="id" value="{{ $servers['id']}}">
           <!--  <form method="post" action="{{ url('costa/server_update')}}"> -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Server Name : Server name cannot be edited after having been inserted into the database, so please add it correctly. Don't add rates/chronicles in server name.</label>
                {{ Form::text("server_name", $servers['server_name'], ["class" => "form-control ". $errors->first("server_name", "is-invalid"),"placeholder" => "Server Name","required"] ) }}
                 @if($errors->has('server_name'))
                            <div class="errors"> {{ $errors->first('server_name') }} </div>
                        @endif
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Server status/Platform/Type</label>
                    <div class="form-check">
                                {{ Form::radio('servertype_1', '1', ($servers['servertype_1'] == '1') ? true : '', ["id" => "servertype1", "class" => ""]) }}
                                {{ Form::label("servertype1", "Coming soon", array("class" => "form-check-label")) }}
                    </div>
                    <div class="form-check">
                        {{ Form::radio('servertype_1', '2', ($servers['servertype_1'] == '2') ? true : '', ["id" => "servertype2", "class" => "form-check-input"]) }}
                        {{ Form::label("servertype2", "Be until", array("class" => "form-check-label")) }} 
                    </div>
                    <div class="form-check">
                        {{ Form::radio('servertype_1', '3', ($servers['servertype_1'] == '3') ? true : '', ["id" => "servertype3","class" => "form-check-input"]) }}
                        {{ Form::label("servertype3", "Live", array("class" => "form-check-label")) }}
                    </div>
                    <div class="date_pick mb-3 px-3">
                        {{ Form::text("date", $servers['date'], ["class" => " ". $errors->first("date", "is-invalid"),"placeholder" => "01/25/2018","id"=> "datepicker"] ) }}
                        @if($errors->has('date'))
                            <div class="errors"> {{ $errors->first('date') }} </div>
                        @endif
                    </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1" class=" {{ $errors->has('serverplatform')? 'errors' : '' }} " >Server platform</label>
                @if($errors->has('serverplatform'))
                    <div class="errors"> {{ $errors->first('serverplatform') }} </div>
                @endif
                <div class="form-check">
                     {{ Form::radio('serverplatform', 'L2j', ($servers['serverplatform'] == 'L2j') ? true : '', ["id" => "serverplatform1", "class" => "form-check-input"]) }}
                     {{ Form::label("serverplatform1", "L2j", array("class" => "form-check-label")) }}
                </div>
                <div class="form-check">
                    {{ Form::radio('serverplatform', 'L2off', ($servers['serverplatform'] == 'L2off') ? true : '', ["id" => "serverplatform2", "class" => "form-check-input"]) }}
                    {{ Form::label("serverplatform2", "L2off", array("class" => "form-check-label")) }}
                </div>
                </div>
              <!-- /.form-group -->
              <div class="form-group">
                 <label class=" {{ $errors->has('type')? 'errors' : '' }} " >Server type</label>
                 @if($errors->has('type'))
                    <div class="errors"> {{ $errors->first('type') }} </div>
                @endif
                    <div class="form-check">
                        {{ Form::radio('type', 'normal', ($servers['type'] == 'normal') ? true : '', ["id" => "type1", "class" => "form-check-input"]) }}
                        {{ Form::label("type1", "Normal", array("class" => "form-check-label")) }}
                    </div>
                    <div class="form-check">
                        {{ Form::radio('type', 'gve', ($servers['type'] == 'gve') ? true : '', ["id" => "type2", "class" => "form-check-input"]) }}
                        {{ Form::label("type2", "GvE", array("class" => "form-check-label")) }}
                    </div>
                    <div class="form-check">
                        {{ Form::radio('type', 'stacksub', ($servers['type'] == 'stacksub') ? true : '', ["id" => "type3", "class" => "form-check-input"]) }}
                        {{ Form::label("type3", "Stacksub", array("class" => "form-check-label")) }}
                    </div>
                    <div class="form-check">
                       {{ Form::radio('type', 'multiskill', ($servers['type'] == 'multiskill') ? true : '', ["id" => "type4", "class" => "form-check-input"]) }}
                       {{ Form::label("type4", "MultiSkill", array("class" => "form-check-label")) }}
                    </div>
              </div>
              <!-- /.form-group -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <h5 class="card-header"><label>Server IP and ports</label></h5>
                {{ Form::label("loginIp", "Login server IP", array("class" => "")) }}
                    {{ Form::text("loginIp", $servers['loginIp'], ["class" => "form-control ". $errors->first("loginIp", "is-invalid"),"placeholder" => "127.0.0.1", "id" => "loginIp","required"] ) }}
                    @if($errors->has('loginIp'))
                        <div class="errors"> {{ $errors->first('loginIp') }} </div>
                    @endif
              </div>
               <div class="form-group">
                 {{ Form::label("serverIp", "Game server IP", array("class" => "")) }}
                    {{ Form::text("serverIp", $servers['serverIp'], ["class" => "form-control ". $errors->first("serverIp", "is-invalid"),"placeholder" => "127.0.0.1", "id" => "serverIp","required"] ) }}
                    @if($errors->has('serverIp'))
                        <div class="errors"> {{ $errors->first('serverIp') }} </div>
                    @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              </div>
               <div class="form-group">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {{ Form::label("loginPort", "Login server Port", array("class" => "")) }}
                {{ Form::text("loginPort",  $servers['loginPort'], ["class" => "form-control ". $errors->first("loginPort", "is-invalid"),"placeholder" => "2106", "id" => "loginPort","required"] ) }}
                @if($errors->has('loginPort'))
                    <div class="errors"> {{ $errors->first('loginPort') }} </div>
                @endif
              </div>
               <div class="form-group">
                 {{ Form::label("serverPort", "Game server Port", array("class" => "")) }}
                    {{ Form::text("serverPort", $servers['serverPort'], ["class" => "form-control ". $errors->first("serverPort", "is-invalid"),"placeholder" => "7777", "id" => "serverPort","required"] ) }}
                    @if($errors->has('serverPort'))
                        <div class="errors"> {{ $errors->first('serverPort') }} </div>
                    @endif
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
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
                        ],$servers['chronicle'], ['placeholder' => 'Select chronicle', 'class' => 'form-control selectpicker '.$errors->has('chronicle','is-invalid'), 'id' => 's-chronicle',"required"]) }}
                    @if($errors->has('chronicle'))
                        <div class="errors"> {{ $errors->first('chronicle') }} </div>
                    @endif
              </div>
               
            </div>

            <!-- /.col -->
          </div>
          <div class="row">
              <div class="col-md-4">
                            {{ Form::label("xpRate", "EXP rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("xpRate",  $servers['xpRate'], ["class" => "form-control ". $errors->first("xpRate", "is-invalid"),"placeholder" => " ", "id" => "xpRate", "maxlength" => "5","required"] ) }}
                            </div>
                            @if($errors->has('xpRate'))
                                <div class="errors"> {{ $errors->first('xpRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("dropRate", "DROP rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("dropRate", $servers['dropRate'], ["class" => "form-control ". $errors->first("dropRate", "is-invalid"),"placeholder" => " ", "id" => "dropRate", "maxlength" => "5","required"] ) }}
                            </div>
                            @if($errors->has('dropRate'))
                                <div class="errors"> {{ $errors->first('dropRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("safeRate", "Safe enchant", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("safeRate",  $servers['safeRate'], ["class" => "form-control ". $errors->first("safeRate", "is-invalid"),"placeholder" => " ", "id" => "safeRate", "maxlength" => "5","required"] ) }}
                            </div>
                            @if($errors->has('safeRate'))
                                <div class="errors"> {{ $errors->first('safeRate') }} </div>
                            @endif
                        </div>
          </div>
          <div class="row">
             
                 <div class="col-md-4">
                            {{ Form::label("spRate", "SP rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("spRate", $servers['spRate'], ["class" => "form-control ". $errors->first("spRate", "is-invalid"),"placeholder" => " ", "id" => "spRate", "maxlength" => "5","required"] ) }}
                            </div>
                            @if($errors->has('spRate'))
                                <div class="errors"> {{ $errors->first('spRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("adenaRate", "ADENA rate", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("adenaRate", $servers['adenaRate'], ["class" => "form-control ". $errors->first("adenaRate", "is-invalid"),"placeholder" => " ", "id" => "adenaRate", "maxlength" => "5","required"] ) }}
                            </div>
                            @if($errors->has('adenaRate'))
                                <div class="errors"> {{ $errors->first('adenaRate') }} </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            {{ Form::label("maxRate", "Max enchant", array("class" => "")) }}
                            <div class="input-group">
                                {{ Form::text("maxRate", $servers['maxRate'], ["class" => "form-control ". $errors->first("maxRate", "is-invalid"),"placeholder" => " ", "id" => "maxRate", "maxlength" => "5","required"] ) }}
                            </div>
                            @if($errors->has('maxRate'))
                                <div class="errors"> {{ $errors->first('maxRate') }} </div>
                            @endif
                        </div>
              
          </div>
          <div class="row">
            
            <div class="col-md-4">
              <h5 class="card-header"><label>Good to know</label></h5>
                            <div class="form-group form-check">
                                
                                {{ Form::checkbox('SPrate', 'SP rate', ($servers['spRate'] == 'SP rate') ? true : '', 
                                ["id" => "sprate", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("sprate", "SP rate", array("class" => "form-check-labe")) }}
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
          <div class="row">
             <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Server language</label>
                        <?php $selectoption = array(); ?>
                        @foreach ($select as $selec)
                            <?php $selectoption[$selec->code] = $selec->lang; ?>
                        @endforeach
                        {{ Form::select('language', $selectoption, $servers['language'], ['placeholder' => 'Select Language', 'class' => 'form-control selectpicker '.$errors->has('language','is-invalid'), 'id' => 'language',"required"]) }}

                        @if($errors->has('language'))
                            <div class="errors"> {{ $errors->first('language') }} </div>
                        @endif
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Server description</label>
                        {{ Form::textarea('desc', $servers['desc'],["class" => "form-control ". $errors->first("desc", "is-invalid"), "placeholder" => "Your server description.","cols" => "130","rows" =>"10"]) }}
                        @if($errors->has('desc'))
                            <div class="errors"> {{ $errors->first('desc') }} </div>
                        @endif
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Server website</label>
                        {{ Form::url('website', $servers['website'],["class" => "form-control ". $errors->first("website", "is-invalid"), "placeholder" => "http://"]) }}
                        @if($errors->has('website'))
                            <div class="errors"> {{ $errors->first('website') }} </div>
                        @endif
                  </div>
                 
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                   <div class="form-group">
                     {{ Form::checkbox('tos1', null, (old('tos1') == 'on') ? true : '', ["id" => "tos-agree", "class" => "position-static","required"]) }}
                            <label for="tos-agree">I have read the <a href="{{ url('terms')}}" target="_blank">Terms and Conditions</a> and i agree with the contents       </label><i class="form-control-feedback fa fa-times" data-fv-icon-for="tos1" style=""></i>
                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="tos1" data-fv-result="INVALID" style=""><label>You must agree to our terms and conditions to add your server</label></small>
                  </div>
              </div>
          </div>
          <div class="row">
             <div class="col-md-12">
                  <div class="form-group">
                     <input id="tos-agree2" class="styled" name="tos2" required type="checkbox"  {{(old('tos2') == 'on') ? 'checked' : ''}}>
                            <label for="tos-agree2">By adding a server/website to our lists you agreethat you are the representative of that server/websiteand you take full responsibility for its legality</label><i class="form-control-feedback fa fa-times" data-fv-icon-for="tos2" style=""></i>
                        <small class="help-block" data-fv-validator="notEmpty" data-fv-for="tos2" data-fv-result="INVALID" style=""><label>Please check this checkbox if you have read and you agree to our rules</label></small>
                  </div>
                  <div class="form-group">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                <button class="btn btn-primary" id="addserver_submit" type="submit">Update server</button>
                  
              </div>
          </div>
       {!! Form::close() !!}
          
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

     
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

@endsection

@section('pagefooterscript')
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
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
@endsection