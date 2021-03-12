@extends('layouts.layout')
@section('content')


<div class="maincontain container">
	<div class="space container">
		<div class="page-four">
			<div class="categories my-4">
				<a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="active">
					<p class="cat1 px-5 py-3"><i class="fas fa-bullhorn"></i> <br> {{ trans('lang.status') }}</p>
				</a>
				<a id="ip-tab" data-toggle="tab" href="#ip" role="tab" aria-controls="ip" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-coins"></i> <br> {{ trans('lang.ip') }}</p>
				</a>
				<a id="Settings-tab" data-toggle="tab" href="#Settings" role="tab" aria-controls="Settings" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-cogs"></i> <br> {{ trans('lang.settings') }} </p>
				</a>
				<a id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-info-circle"></i> <br> {{ trans('lang.des') }} / {{ trans('lang.url') }}</p>
				</a>
				<a id="News-tab" data-toggle="tab" href="#News" role="tab" aria-controls="News" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-comment"></i> <br>{{ trans('lang.news') }} </p>
				</a>
				<a id="Vote-tab" data-toggle="tab" href="#Vote" role="tab" aria-controls="Vote" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-code"></i> <br> {{ trans('lang.vote_code') }}</p>
				</a>
				<a id="Reward-tab" data-toggle="tab" href="#Reward" role="tab" aria-controls="Reward" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-share-alt"></i> <br>{{ trans('lang.reward') }}</p>
				</a>
				<!-- <a id="Reward-tab" data-toggle="tab" href="#Reward" role="tab" aria-controls="Reward" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-share-alt"></i> <br> Reward</p>
				</a>  -->
				@if($updateData->till_date)
				<a id="Premium-tab" data-toggle="tab" href="#Premium" role="tab" aria-controls="Premium" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-gem"></i> <br>{{ trans('lang.premium') }} </p>
				</a>
				@else
				<a href="javascript:void(0)" class="nonpremium">
					<p class="cat1 px-5 py-3"><i class="fas fa-gem"></i> <br> {{ trans('lang.premium') }}</p>
				</a>
				@endif
				<a id="Platform-tab" data-toggle="tab" href="#Platform" role="tab" aria-controls="Platform" aria-selected="false">
					<p class="cat1 px-5 py-3"><i class="fas fa-plug"></i> <br> {{ trans('lang.plateform_type') }}</p>
				</a>
			</div>
			<div class="tab-content" id="myTabContent"  style="min-height: calc(800px - 100px);">
				<div class="premium_update">
					<div class="tab-pane fade show  active" id="home" role="tabpanel" aria-labelledby="home-tab">
						{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/status']) !!}
						<div class="col">
							<div class="card-body"> 
								@if($errors->has('servertype_1'))
								<div class="errors"> {{ $errors->first('servertype_1') }} </div>
								@endif
								
								<div class="form-check">
									{{ Form::radio('servertype_1', '1', $updateData->servertype_1 =='1' ? "checked" : "", ["id" => "servertype1", "class" => "form-check-input"]) }}
									<!-- <input type="radio" name="servertype1" class="form-check-input"  <?php if($updateData->status == '1'){?> checked  <?php }  ?> id="servertype1"> -->
									{{ Form::label("servertype1", "Coming soon", array("class" => "form-check-label")) }}
								</div>
								<div class="form-check">
									{{ Form::radio('servertype_1', '2', $updateData->servertype_1 =='2' ? "checked" : "", ["id" => "servertype2", "class" => "form-check-input"]) }}
									{{ Form::label("servertype2", "Be until", array("class" => "form-check-label")) }}
								</div>
								<div class="form-check">
									{{ Form::radio('servertype_1', '3',  $updateData->servertype_1 =='3' ? "checked" : "", ["id" => "servertype3","class" => "form-check-input"]) }}
									{{ Form::label("servertype3", "Live", array("class" => "form-check-label")) }}
								</div>
								<div class="date_pick mb-3 px-3 col-md-3">
									{{ Form::text("date", $updateData->date, ["class" => " ". $errors->first("date", "is-invalid"),"placeholder" => "01/25/2018","id"=> "datepicker"]) }}
									@if($errors->has('date'))
									<div class="errors"> {{ $errors->first('date') }} </div>
									@endif
								</div>
							</div>
						</div>
						<div class="mt-3"><input type="button" class="btn btn-primary" onclick="update_server({{$server_id}},'status')" value="Update"/></div>
						<div class="alert alert-success mt-3" style="display: none;" id="status_error_hide" >
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>{{ trans('lang.success') }}!</strong>{{ trans('lang.status_updated_msg') }}
								</div>
						{{ Form::close() }}
					</div>
					<div class="tab-pane fade" id="ip" role="tabpanel" aria-labelledby="ip-tab">
						{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/ip']) !!}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity"><b>{{ trans('lang.login') }} {{ trans('lang.server') }} {{ trans('lang.ip') }}</b></label>
								<input type="text" class="form-control" id="login_server_ip" value="{{$updateData->loginIp}}" placeholder="54.36.91.218">
								<p id="login_ip" style="color: red"></p>
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity">{{ trans('lang.game') }} {{ trans('lang.server') }} {{ trans('lang.ip') }}</label>
								<input type="text" class="form-control" id="game_server_ip" value="{{ $updateData->serverIp }}" placeholder="54.36.91.218"><p id="game_ip" style="color: red"></p>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">{{ trans('lang.login') }} {{ trans('lang.server') }} {{ trans('lang.port') }}</label>
								<input type="text" class="form-control" id="login_server_port" value="{{ $updateData->loginPort}}" placeholder="2106">
								<p id="login_port" style="color: red"></p>
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity">{{ trans('lang.game') }} {{ trans('lang.server') }} {{ trans('lang.port') }}</label>
								<input type="text" class="form-control" id="game_server_port" value="{{ $updateData->serverPort }}" placeholder="7777">
								<p id="game_port" style="color: red"></p>
							</div>
						</div>
						<div class="mt-3"><input type="button" class="btn btn-primary" onclick="update_server({{$server_id}},'ip')" value="Update"/></div>
								<div class="alert alert-success mt-3" style="display: none;" id="ip_error_hide" >
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>{{ trans('lang.success') }}!</strong>{{ trans('lang.ip') }} {{ trans('lang.status_updated_msg') }}
								</div>
						{{ Form::close() }}
					</div>
					<div class="tab-pane fade" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
						
						{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/settings']) !!}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">{{ trans('lang.chronicle') }}</label>
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
								<p id="chronicle_error" style="color: red"></p>
								@if($errors->has('chronicle'))
								<div class="errors"> {{ $errors->first('chronicle') }} </div>
								@endif
							</div>
							<div class="form-group col-md-6">
								<label for="exampleInputEmail1">{{ trans('lang.server') }} {{ trans('lang.language') }}</label>
								<?php $selectoption = []; ?>
								@foreach ($select as $selec)
								<?php $selectoption[$selec->code] = $selec->lang; ?>
								@endforeach
								{{ Form::select('language', $selectoption, old('language'), ['placeholder' => 'Select Language', 'class' => 'form-control selectpicker '.$errors->has('language','is-invalid'), 'id' => 's-language']) }}
								<p id="language_error" style="color: red"></p>
								@if($errors->has('language'))
								<div class="errors"> {{ $errors->first('language') }} </div>
								@endif
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								{{ Form::label("xpRate", "EXP rate", array("class" => "")) }}
								<div class="input-group">
									{{ Form::text("xpRate", null, ["class" => "form-control ". $errors->first("xpRate", "is-invalid"),"placeholder" => " ", "id" => "xpRate", "maxlength" => "5"] ) }}
									
								</div><p id="xpr_error" style="color: red"></p>
								@if($errors->has('xpRate'))
								<div class="errors"> {{ $errors->first('xpRate') }} </div>
								@endif
							</div>
							<div class="form-group col-md-4">
								{{ Form::label("dropRate", "DROP rate", array("class" => "")) }}
								<div class="input-group">
									{{ Form::text("dropRate", null, ["class" => "form-control ". $errors->first("dropRate", "is-invalid"),"placeholder" => " ", "id" => "dropRate", "maxlength" => "5"] ) }}
								</div>
									<p id="drop_error" style="color: red"></p>
								@if($errors->has('dropRate'))
								<div class="errors"> {{ $errors->first('dropRate') }} </div>
								@endif
							</div>
							<div class="form-group col-md-4">
								{{ Form::label("safeRate", "Safe enchant", array("class" => "")) }}
								<div class="input-group">
									{{ Form::text("safeRate", null, ["class" => "form-control ". $errors->first("safeRate", "is-invalid"),"placeholder" => " ", "id" => "safeRate", "maxlength" => "5"] ) }}
								</div>
								<p id="safe_error" style="color: red"></p>
								@if($errors->has('safeRate'))
								<div class="errors"> {{ $errors->first('safeRate') }} </div>
								@endif
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								{{ Form::label("spRate", "SP rate", array("class" => "")) }}
								<div class="input-group">
									{{ Form::text("spRate", null, ["class" => "form-control ". $errors->first("spRate", "is-invalid"),"placeholder" => " ", "id" => "spRate", "maxlength" => "5"] ) }}
								</div>
								<p id="sp_error" style="color: red"></p>
								@if($errors->has('spRate'))
								<div class="errors"> {{ $errors->first('spRate') }} </div>
								@endif
							</div>
							<div class="form-group col-md-4">
								{{ Form::label("adenaRate", "ADENA rate", array("class" => "")) }}
								<div class="input-group">
									{{ Form::text("adenaRate", null, ["class" => "form-control ". $errors->first("adenaRate", "is-invalid"),"placeholder" => " ", "id" => "adenaRate", "maxlength" => "5"] ) }}
								</div>
								<p id="adena_error" style="color: red"></p>
								@if($errors->has('adenaRate'))
								<div class="errors"> {{ $errors->first('adenaRate') }} </div>
								@endif
							</div>
							<div class="form-group col-md-4">
								{{ Form::label("maxRate", "Max enchant", array("class" => "")) }}
								<div class="input-group">
									{{ Form::text("maxRate", null, ["class" => "form-control ". $errors->first("maxRate", "is-invalid"),"placeholder" => " ", "id" => "maxRate", "maxlength" => "5"] ) }}
								</div>
								<p id="max_error" style="color: red"></p>
								@if($errors->has('maxRate'))
								<div class="errors"> {{ $errors->first('maxRate') }} </div>
								@endif
							</div>
						</div>
						<div class="row">
                        <div class="col-md-4">
                        	<!-- $meta_field[0]->metaKey =='SPrate' ? "checked" : "" -->
                            <div class="form-group form-check">	
                                <!--  $updateData->SPrate =='SPrate' ? "checked" : "" -->
                                {{ Form::checkbox('good_to_know', 'SP rate', in_array("SP rate",$meta) ? true : '', 
                                ["id" => "sprate", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("sprate", "SP rate", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('good_to_know', 'NPC buffer', in_array("NPC buffer",$meta) ? true : '',
                                ["id" => "NPCbuffer", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("NPCbuffer", "NPC buffer", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('good_to_know', 'Global GK', in_array("Global GK",$meta) ? true : '',
                                ["id" => "GlobalGK", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("GlobalGK", "Global GK", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-check">
                                {{ Form::checkbox('good_to_know', 'Custom zone',in_array("Custom zone",$meta) ? true : '',
                                ["id" => "Customzone", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Customzone", "Custom zone", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('good_to_know', 'Custom weapon', in_array("Custom weapon",$meta) ? true : '',
                                ["id" => "Customweapon", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Customweapon", "Custom weapon", array("class" => "form-check-label")) }}
                            </div>
                            <div class="form-group form-check">
                                {{ Form::checkbox('good_to_know', 'Custom armor', in_array("Custom armor",$meta) ? true : '',
                                ["id" => "Customarmor", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Customarmor", "Custom armor", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-check">
                                {{ Form::checkbox('good_to_know', 'Offline shop',in_array("Offline shop",$meta) ? true : '',
                                ["id" => "Offlineshop", "class" => "form-check-input position-static"]) }}
                                {{ Form::label("Offlineshop", "Offline shop", array("class" => "form-check-label")) }}
                            </div>
                        </div>
                    </div>
						<div class="mt-3"><input type="button" class="btn btn-primary" onclick="update_server({{$server_id}},'settings')" value="Update"/></div>
						<div class="alert alert-success mt-3" style="display: none;" id="setting_error_hide" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>{{ trans('lang.success') }}!</strong>{{ trans('lang.update_success') }}
							</div>
						<!--  <div class=" mt-3"><b>API_KEY (TOKEN)</b></div>
							<div><input type="text" name="" id="input" class="form-control" disabled="" value="{{ $updateData->api_key }}" required="required" pattern="" title=""></div>
						<div><a   href="{{ url('Re-generate_api_key/'.$server_id) }}" class="btn btn-primary mt-3">Re-generate Api_key</a></div> -->
						{{ Form::close() }}
					</div>
					<div class="tab-pane fade" id="Description" role="tabpanel" aria-labelledby="Description-tab">
						{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/description']) !!}
						<div>{{ trans('lang.server') }} {{ trans('lang.des') }}</div>
						<div><textarea class="form-control" name="description" minlength="1000" rows="10" required="" data-fv-field="description" id="server_description">{{ $updateData->desc }}</textarea>
							<p id="description_error" style="color: red"></p>
						</div>
						<div>{{ trans('lang.server') }} {{ trans('lang.website') }}</div>
						<div>
							{{ Form::text("website_url", $updateData->website, ["class" => "form-control ","id"=>"website_url"] ) }}
							<p id="website_error" style="color: red"></p>
						</div>
						<div class="mt-3"><input type="button" class="btn btn-primary" onclick="update_server({{$server_id}},'description')" value="update"/></div>
						
							<div class="alert alert-success mt-3" style="display: none;" id="error_hide" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>{{ trans('lang.success') }}!</strong> {{ trans('lang.update_success') }}
							</div>
						
						{{ Form::close() }}
						
					</div>
					<div  class="tab-pane fade" id="News" role="tabpanel" aria-labelledby="News-tab">
						{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/news']) !!}
						
						<div class="server_news">
							<div id="editNews" style="display: none;" ><div class="alert alert-danger alert-dismissable">{{ trans('lang.server_err_msg') }}</div></div>
							<p> <b>{{ trans('lang.server') }} {{ trans('lang.news') }} (one {{ trans('lang.news') }}/{{ trans('lang.hour') }})</b> </p>
							<div class="form-group">
								<textarea class="form-control" id="news" rows="3" name="news"></textarea>
								<input type="hidden" name="" id="server_id_hidden" class="form-control" value="{{$server_id}}">
								<p id="news_error" style="color: red"></p>
							</div>
							<div class="mt-3"><input type="button" class="btn btn-primary" onclick="update_server({{$server_id}},'news')" value="News Add"/></div>
								<div class="alert alert-success mt-3" style="display: none;" id="news_error_hide" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>{{ trans('lang.success') }}!</strong> {{ trans('lang.news_insert_success') }}
							</div>
							<div class="panel panel-info mt-5">
									<div id="userTable">
										<div id="afterdelete">
											
										</div>
									</div>

							</div>
						</div>
						{{ Form::close() }}
					</div>
					<div class="tab-pane fade" id="Vote" role="tabpanel" aria-labelledby="Vote-tab">
						
						<!-- <textarea style="height: 172px; width: 100%;">{{$votecode}}</textarea> -->
						<div class="container">
							
							<ul class="nav nav-tabs" id="myTabContent" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#left" role="tab" aria-controls="home" aria-selected="true">Top left</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#right" role="tab" aria-controls="profile" aria-selected="false">Top right</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#botomleft" role="tab" aria-controls="contact" aria-selected="false">Bottom Left</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#botomright" role="tab" aria-controls="profile" aria-selected="false">Bottom Right</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#small" role="tab" aria-controls="contact" aria-selected="false">Small vote</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#normal" role="tab" aria-controls="profile" aria-selected="false">Normal vote</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="left" class="tab-pane fade in active in show">
									<div class="row">
										<div class="col-sm-2 col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/top-left1.png"> </div>
										<div class="col-sm-6 col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-top-left-1.gif" style="position: fixed; z-index:99999; top: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea> </div>
									</div>
									<div class="row">
										<div class="col-sm-2 col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/top-left2.png"> </div>
										<div class="col-sm-6 col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-top-left-2.png" style="position: fixed; z-index:99999; top: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea> </div>
									</div>
									
									<!-- <p>
										<div class="col-sm-12">
											<div class="col-sm-2"><img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-top-left-3.png"> </div>
											<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-top-left-3.png" style="position: fixed; z-index:99999; top: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea> </div>
										</div>
									</p> -->
									
								</div>
								<div id="right" class="tab-pane fade">
									
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right"src="{{ url('/images') }}/imagesAdd/top-right.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-top-right-2.png" style="position: fixed; z-index:99999; top: 0; right: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
									
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/top-right2.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-top-right-2.png" style="position: fixed; z-index:99999; top: 0; right: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
							</div>
							<div id="botomleft" class="tab-pane fade">
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/bot-left1.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-1.gif" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/bot-left2.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-2.png" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<!--   <p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-bottom-left-3.gif"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-3.gif" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-bottom-left-1.gif"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-1.gif" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-bottom-left-4.png"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-4.png" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-bottom-left-5.png"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-5.png" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p> -->
							</div>
							<div id="botomright" class="tab-pane fade">
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/bot-right1.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-right-1.png" style="position: fixed; z-index:99999; bottom: 0; right: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/bot-right2.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-right-2.gif" style="position: fixed; z-index:99999; bottom: 0; right: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<!-- <p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-bottom-left-5.png"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-left-5.png" style="position: fixed; z-index:99999; bottom: 0; left: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-bottom-right-4.png"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-bottom-right-4.png" style="position: fixed; z-index:99999; bottom: 0; right: 0;" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p> -->
							</div>
							<div id="small" class="tab-pane fade">
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/smvote1.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-small-1.png" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/smvote2.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-small-2.png" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<!--  <p>
									<div class="col-sm-12">
										<div class="col-sm-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/banner-small-3.png"> </div>
										<div class="col-sm-6"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-small-3.png" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p> -->
							</div>
							<div id="normal" class="tab-pane fade">
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/smvote1.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-normal-1.png" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
								<p>
									<div class="row">
										<div class="col-md-2"> <img class="img-responsive pull-right" src="{{ url('/images') }}/imagesAdd/smvote2.png"> </div>
										<div class="col-md-9"> <textarea class="form-control mybannertxt" onclick="this.select();" readonly="" rows="4"> &lt;a href="https://l2hotzone.com/vote/id/{{$form_id}}" target="_blank" title="l2topzone" &gt;&lt;img src="https://l2hotzone.com/vb/banner-normal-2.png" alt="l2hotzone.com" border="0"&gt;&lt;/a&gt; </textarea>  </div>
									</div>
								</p>
							</div>
						</div>
					</div>
					
				</div>
				<div class="tab-pane fade" id="Reward" role="tabpanel" aria-labelledby="Reward-tab">
					@if($updateData->api_key == "")
					<!-- <div class="row" id="hide_gererate_btn">
						<div class="col-md-12"><a onclick="re_generate({{ $server_id}})"  id="aftergenerate" class="btn btn-primary mt-3">Generate Api_key</a></div>
					</div>
					<div  id="show_api_content" style="display: none;">
						<div class="row">
							
							<div class="col-md-12 mt-3"><b>API_KEY (TOKEN)</b></div>
							<div class="col-md-12"><input type="text" name="" id="new_generated_key" onclick="this.select();"  class="form-control" readonly="" value="{{ $updateData->api_key }}" required="required" pattern="" title=""></div>
							<div class="col-md-12"><a onclick="re_generate({{ $server_id}})"  id="aftergenerate" class="btn btn-primary mt-3">Re-Generate API_KEY</a></div>
						</div>
						<div class="row">
							<div class="col-md-12 mt-3"><b>API Link (Method POST) [Parameter : IP Address, API_KEY]</b></div>
							<div class="col-md-12"><input type="text" name=""  onclick="this.select();"  class="form-control" readonly="" value="https://l2hotzone.com/api/check_ip" required="required" pattern="" title=""></div>
						</div>
						<div class="row">
							<div class="col-md-12 mt-3"><b>Response Data</b></div>
							<div class="col-md-12"><textarea class="form-control" onclick="this.select();" style="height: auto;" readonly="" >{"success":true,"messsage":"Ok","data":{"ip address":"192.168.17.43","Api-Key":"23996f-3bffd3-843422-89ef2e-6c859b","Ip version":"IP version4","status":"200"}}</textarea></div>
						</div>
						<div class="row">
							<div class="col-md-12 mt-3"><b>Error Response </b></div>
							<div class="col-md-12"><textarea class="form-control" onclick="this.select();" style="height: auto;" readonly="" >{"success":false,"messsage":"Ip addrress does't exists","ip address":"192.168.17","Api-Key":"23996f-3bffd3-843422-89ef2e-6c859b","Ip version":"","status":"200"}</textarea></div>
						</div>
					</div> -->
					@else
					<div class="row">
						<!--
													<div class="col-md-12 mt-3"><b>API_KEY (TOKEN)</b></div>
						<div class="col-md-12"><input type="text" name="" id="new_generated_key" onclick="this.select();"  class="form-control" readonly="" value="{{ $updateData->api_key }}" required="required" pattern="" title=""></div>
						<div class="col-md-12"><a onclick="re_generate({{ $server_id}})"  id="aftergenerate" class="btn btn-primary mt-3">Generate Api_key</a></div> -->
						
						<div class="col-md-12 mt-3"><b>API_KEY (TOKEN)</b></div>
						<div class="col-md-12"><input type="text" name="" id="new_generated_key" onclick="this.select();"  class="form-control" readonly="" value="{{ $updateData->api_key }}" required="required" pattern="" title=""></div>
						<!-- <div class="col-md-12"><a onclick="re_generate({{ $server_id}})" value="" class="btn btn-primary mt-3">Re-generate API_KEY</a></div> -->
						
						<!-- {{ url('Re-generate_api_key/'.$server_id) }} -->
					</div>
					<div class="row">
						<div class="col-md-12 mt-3"><b>API Link (Method POST) [Parameter : IP Address, API_KEY]</b></div>
						<div class="col-md-12"><input type="text" name=""  onclick="this.select();"  class="form-control" readonly="" value="https://l2hotzone.com/api/check_ip" required="required" pattern="" title=""></div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3"><b>Response Data</b></div>
						<div class="col-md-12"><textarea class="form-control" onclick="this.select();" style="height: auto;" readonly="" >{"status":valid,"error_code": 0 ,"result":{"Server Id":"{{$server_id}}","ip address":"{{$updateData->loginIp}}","Api-Key":"{{$updateData->api_key}}","Ip version":"IP version4","voted":"{{$voted}}"}}</textarea></div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3"><b>Error Response </b></div>
						<div class="col-md-12"><textarea class="form-control" onclick="this.select();" style="height: auto;" readonly="" >{"status":invalid,"error_code": 404,"error":"Api-Key does not exists","result":" "}</textarea></div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-3"><b>API coding for the Developer </b></div>
						<div class="col-md-12"><textarea class="form-control" onclick="this.select();" style="height: auto;" readonly="" >https://l2hotzone.com/api.php?API_KEY={{$updateData->api_key}}&SERVER_ID={{$server_id}}&IP={{$updateData->loginIp}}&VOTER_IP=</textarea></div>
					</div>
					@endif
					<!-- {{$_SERVER['REMOTE_ADDR']}} -->
				</div>
				@if($updateData->till_date)
				<div class="tab-pane fade" id="Premium" role="tabpanel" aria-labelledby="Premium-tab">
					{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/premium' ,'enctype' => 'multipart/form-data']) !!}
					
					<div class="premium_update">
						<h5>Premium section</h5>
						<p>Premium server image dimension <span class="soon">120 x 90</span> pixels</p>
						<div class="img_boxes">
							<div class="upper_box">
								<div class="lower_box">
									<div class="row">
										@if($updateData->thumbnail)
										<img id="thumnailsample" src="{{ url('images/imagesAdd/'.$updateData->thumbnail) }}" width="120px" height="90px" alt="6084_l2topzone.gif">
										@else
										<img id="thumnailsample" src="{{ url('images/defaultimage.png') }}" width="120px" height="90px"  alt="6084_l2topzone.gif">
										@endif
										<div>
											<a href='{{ route("serverdetail", [$server_id,  $updateData->server_name] ) }}' class="pl-3" rel="nofollow">
	                                    <b class="edit-premium-title">{{ $updateData->server_name }}</b>
										</a>
										<span class="label chronicle-interlude edit-premium-chrnicle" >{{ $updateData->chronicle }}</span>
											<div class="col-md-12">
												<span class="label label-primary setting-rate">EXP: {{ $updateData->xpRate }}</span>
												<span class="label label-primary setting-rate">SP: {{ $updateData->spRate }}</span>
												<span class="label label-primary setting-rate">DROP: {{ $updateData->dropRate }}</span>
												<span class="label label-primary setting-rate"> ADENA: {{ $updateData->maxRate }}</span>
												<span class="label label-primary setting-plateform"> {{ $updateData->serverplatform }}</span>
												<span class="label label-primary setting-type"> {{ $updateData->type}}</span>
												<p class="content_comehere">
													@if($updateData->premiumcontent)
													{{ $updateData->premiumcontent }}
													@endif
												</p>
												
											</div>
										</div>
									</div>
									<hr/>
									<div class="mt-2">
										<a href="{{ url('/vote/id/'. $server_id) }}"   data-toggle="tooltip" data-placement="bottom" title="Votes"><i class="fa fa-fw fa-lg fa-thumbs-up text-muted"></i>{{ $vote_count }}</a>
										<a href="#" data-toggle="tooltip" data-placement="bottom" title="Language"><i class="fa fa-fw fa-lg fa-language text-muted"></i> {{ $updateData->lang}} </a>
									</div>
									<!-- <div class="row pl-3 mt-2">
										<div class="col-lg-1"><a href="{{ url('/vote/id/'. $server_id) }}" data-toggle="tooltip" class="tip-bottom" title="" data-original-title="Votes">
											<i class="fa fa-fw fa-lg fa-thumbs-up text-muted"></i>
											<span class="sub"></span>
										</a></div>
										<div class="col-lg-1">
											<p><i class="fa fa-language "></i>{{ $updateData->lang}}</p>
										</div>
									</div> -->
								</div>

							</div>
						</div>
						<div class="form-group mt-3">
							<div class="input-group">
								<div class="custom-file input-group">
									<input type="file" name="thumbnailbanner" class="custom-file-input" id="imagefile" accept="image/x-png,image/gif,image/jpeg" />
									<label class="custom-file-label" for="imagefile" aria-describedby="inputGroupFileAddon02">Choose file</label>
								</div>
							</div>
						</div>
						<div class="form-group mt-3 row">
							<div class="description col-lg-12">
								<h6>Premium short description - 150 characters including spaces</h6>
								<textarea name="premiumcontentt"  style="width: 100%;" id="premiumcontentt"  rows="2" placeholder="Premium server sort description!"></textarea>
							</div>
						</div>
						<div class="my-2">
							<button type="sumit" class="btn">
							@if($updateData->premiumcontent && $updateData->thumbnail)
							Update
							@else
							Add
							@endif
							</button>
						</div>
						<!-- <div class="list">
							<p class="list_p my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, unde?</p>
							<ul class="dashed">
								<li class="benifit_list">Cras justo odio</li>
								<li class="benifit_list">Dapibus ac facilisis in</li>
								<li class="benifit_list">Morbi leo risus</li>
								<li class="benifit_list">Porta ac consectetur ac</li>
								<li class="benifit_list">Vestibulum at eros</li>
							</ul>
						</div>
						<div class="select_btn my-3">
							<button  class="btn"><i class="fas fa-plus-circle"></i> Add Premium</button>
						</div> -->
					</div>
					
					{{ Form::close() }}
					
				</div>
				@endif
				<div class="tab-pane fade" id="Platform" role="tabpanel" aria-labelledby="Platform-tab">
					{!! Form::model($updateData,['url' => '/server/'.$form_id.'/update/platformtype']) !!}
					<div class="row">
						<div class="col-lg-6 ">
	                        <div class="card-body">
	                                <label for="exampleInputEmail1" class=" {{ $errors->has('serverplatform')? 'errors' : '' }} " >{{ trans('lang.server_platform') }}</label>
	                                @if($errors->has('serverplatform'))
	                                    <div class="errors"> {{ $errors->first('serverplatform') }} </div>
	                                @endif

	                            <div class="form-check">
	                                 {{ Form::radio('serverplatform', 'L2j', $updateData->serverplatform ? true : '', ["id" => "serverplatform1", "class" => "form-check-input"]) }}
	                                 {{ Form::label("serverplatform1", "L2j", array("class" => "form-check-label")) }}
	                            </div>
	                            <div class="form-check">
	                                {{ Form::radio('serverplatform', 'L2off', $updateData->serverplatform ? true : '', ["id" => "serverplatform2", "class" => "form-check-input"]) }}
	                                {{ Form::label("serverplatform2", "L2off", array("class" => "form-check-label")) }}
	                            </div>
	                            <p id="plateform_error" style="color: red"></p>
	                        </div>
	                   </div>
	                   <div class="col-lg-6">
	                        <div class="card-body">
	                                <label class=" {{ $errors->has('type')? 'errors' : '' }} " >{{ $errors->first('server') }} {{ $errors->first('type') }}</label>
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
	                            <p id="type_error" style="color: red"></p>
	                        </div>
	                   </div>
						<div class="mt-3 col-lg-12"><input type="button" class="btn btn-primary" onclick="update_server({{$server_id}},'platform')" value="Update"/></div>
						<div class="alert alert-success mt-3" style="display: none;" id="plateform_error_hide" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>{{ $errors->first('success') }}!</strong> {{ $errors->first('update_success') }}
							</div>
					</div>
					{{ Form::close() }}
					
				</div>
			</div>
		</div>
	</form>
</div>
</div>
</div>
<style>
	.fade:not(.show) {
	opacity: 0;
	display: none;
	}
	.page-four .categories .active .cat1{
	background: #FF3C48;
	color: white;
	}
	.page-four .categories .nonpremium .cat1{
	text-align: center;
	background-color: #d0d0d0;
	display: inline-block;
	}
	.lower_box img{
	float:left
	}
	.lower_box:after {
	content: '';
	clear: both;
	display: table;
	}
</style>
@endsection

@section('pagefooterscript')
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="{{ url('js/bootstrap.min.js') }}"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script type="text/javascript">


// Ajax call	

function update_server(id,action)
{
	if(action == "settings")
	{
		var chronicle=document.getElementById("s-chronicle").value; 
		var language=document.getElementById("s-language").value; 
		var xprate=document.getElementById("xpRate").value; 
		var droprate=document.getElementById("dropRate").value; 
		var saferate=document.getElementById("safeRate").value; 
		var sprate=document.getElementById("spRate").value; 
		var adenarate=document.getElementById("adenaRate").value; 
		var maxrate=document.getElementById("maxRate").value; 
		var meta = [];
            $.each($("input[name='good_to_know']:checked"), function(){            
                meta.push($(this).val());
            });
          $.ajax({
		 	url: "https://l2hotzone.com/server/update/settings",
		 	type: 'POST',
		 	data:{
		 		id:id,
		 		chronicle:chronicle,
		 		language:language,
		 		xprate:xprate,
		 		droprate : droprate,
		 		saferate : saferate,
		 		sprate : sprate,
		 		adenarate : adenarate,
		 		maxrate : maxrate,
		 		meta : meta,
		 		"_token": "{!! csrf_token() !!}"
		 	},
		 	success : function(data)
		 	{
		 				$("#setting_error_hide").show();
						setTimeout(function() { $("#setting_error_hide").hide(); }, 5000);
						
		 	},
		 	error : function (data)
		 	{
		 		if(data.status == 422)
                 	{
	                 		document.getElementById("chronicle_error").innerHTML = data.responseJSON.errors.chronicle ? data.responseJSON.errors.chronicle[0] : "";
	                 		document.getElementById("language_error").innerHTML = data.responseJSON.errors.language ? data.responseJSON.errors.language[0] : "";
	                 		document.getElementById("xpr_error").innerHTML = data.responseJSON.errors.xprate ? data.responseJSON.errors.xprate[0] : "";
	                 		document.getElementById("drop_error").innerHTML = data.responseJSON.errors.droprate ? data.responseJSON.errors.droprate[0] : "";
	                 		document.getElementById("safe_error").innerHTML = data.responseJSON.errors.saferate ? data.responseJSON.errors.saferate[0] : "";
	                 		document.getElementById("sp_error").innerHTML = data.responseJSON.errors.sprate ? data.responseJSON.errors.sprate[0] : "";
	                 		document.getElementById("adena_error").innerHTML = data.responseJSON.errors.adenarate ? data.responseJSON.errors.adenarate[0] : "";
	                 		document.getElementById("max_error").innerHTML = data.responseJSON.errors.maxrate ? data.responseJSON.errors.maxrate[0] : "";
               	


                 	}
		 	}


		 })
	}
	if(action == "platform")
	{
		var server_plateform = $("input[name='serverplatform']:checked").val();
		var server_type = $("input[name='type']:checked").val();
		$.ajax({
			url: "https://l2hotzone.com/server/update/platformtype",
			type : "post",
			data:{
				id:id,
				plateform:server_plateform,
				type : server_type,
				"_token" : "{!! csrf_token() !!}"
			},
			success :function(data)
			{
					$("#plateform_error_hide").show();
						setTimeout(function() { $("#plateform_error_hide").hide(); }, 5000);
				
			},
			error : function(data)
			{
				if(data.status == 422)	
				{
					document.getElementById("plateform_error").innerHTML = data.responseJSON.errors.plateform ? data.responseJSON.errors.plateform[0] : "";
					document.getElementById("type_error").innerHTML = data.responseJSON.errors.type ? data.responseJSON.errors.type[0] : "";
				}
			}
		})
	}
	if(action == "status")
	{
		var status = $("input[name='servertype_1']:checked").val();

		var path = "https://l2hotzone.com/server/update/status";
		var date=document.getElementById("datepicker").value; 
		if(date == '' && status == 1)
		{
			alert("Please Select Comming Soon Date");
		}
		else{

			$data = {
			id:id,
			date:date,
			status : status,
			"_token": "{!! csrf_token() !!}"

			}
			$.post(path,$data,function($data)
			{
				$("#status_error_hide").show();
				setTimeout(function() { $("#status_error_hide").hide(); }, 5000);
			});
		}
		/*var be_until = document.getElementById("datepicker").value;
		var live = document.getElementById("datepicker").value;*/
		
	}
	if(action == "description")
	{
		var path = "https://l2hotzone.com/server/update/description";
		var website_url=document.getElementById("website_url").value;  
		var description=document.getElementById("server_description").value;
		  $.ajax({

                url: "https://l2hotzone.com/server/update/description",

                type:'POST',

                data: {id:id,
					url:website_url,
					description:description,
					"_token": "{!! csrf_token() !!}"
				},

                success: function(data) {

                    if($.isEmptyObject(data.error)){

                       
                        $("#error_hide").show();
						setTimeout(function() { $("#error_hide").hide(); }, 5000);
                        document.getElementById("website_error").innerHTML = "";
                 		document.getElementById("description_error").innerHTML = "";	
                 		// document.getElementById("website_url").style.border = "1px solid #ced4da";
                 		// document.getElementById("server_description").style.border = "1px solid #ced4da";
                    }

                },
                 error: function( data )
                 {
                 	if(data.status == 422)
                 	{
                 		console.log(data.responseJSON);
                 		document.getElementById("website_error").innerHTML = data.responseJSON.errors.url ? data.responseJSON.errors.url[0] : "";
                 		document.getElementById("description_error").innerHTML = data.responseJSON.errors.description ?data.responseJSON.errors.description[0] : "" ;	
                 		// document.getElementById("website_url").style.border = "1px solid red";
                 		// document.getElementById("server_description").style.border = "1px solid red";
                 	}
                 }
				});
	}
	if(action == "ip")
	{
		var login_ip=document.getElementById("login_server_ip").value;
		var login_port=document.getElementById("login_server_port").value;
		var game_port=document.getElementById("game_server_port").value;
		var game_ip=document.getElementById("game_server_ip").value;

		 $.ajax({
		 	url: "https://l2hotzone.com/server/update/ip",
		 	type: 'POST',
		 	data:{
		 		id:id,
		 		login_ip:login_ip,
		 		login_port:login_port,
		 		game_port:game_port,
		 		game_ip : game_ip,
		 		"_token": "{!! csrf_token() !!}"
		 	},
		 	success : function(data)
		 	{
		 				$("#ip_error_hide").show();
						setTimeout(function() { $("#ip_error_hide").hide(); }, 5000);
						document.getElementById("login_ip").innerHTML =  "";
                 		document.getElementById("login_port").innerHTML =  "";
                 		document.getElementById("game_port").innerHTML =  "";
                 		document.getElementById("game_ip").innerHTML =  "";
		 	},
		 	error : function (data)
		 	{

		 		if(data.status == 422)
                 	{
                 		console.log(data.responseJSON);
                 		document.getElementById("login_ip").innerHTML = data.responseJSON.errors.login_ip ? data.responseJSON.errors.login_ip[0] : "";
                 		document.getElementById("login_port").innerHTML = data.responseJSON.errors.login_port ? data.responseJSON.errors.login_port[0] : "";
                 		document.getElementById("game_port").innerHTML = data.responseJSON.errors.game_port ? data.responseJSON.errors.game_port[0] : "";
                 		document.getElementById("game_ip").innerHTML = data.responseJSON.errors.game_ip ? data.responseJSON.errors.game_ip[0] : "";

                 		// document.getElementById("login_server_ip").style.border = "1px solid red";
                 		// document.getElementById("login_server_port").style.border = "1px solid red";
                 		// document.getElementById("game_server_port").style.border = "1px solid red";
                 		// document.getElementById("game_server_ip").style.border = "1px solid red";

                 	}
		 	}


		 });

	}
	if(action == "news")
	{
		var news=document.getElementById("news").value;

				  $.ajax({

                url: "https://l2hotzone.com/server/update/news",

                type:'POST',

                data: {id:id,
					news:news,
					"_token": "{!! csrf_token() !!}"},

                success: function(data) {
                		if(JSON.parse(data) == "error")
                		{
                			$("#editNews").show();
						setTimeout(function() { $("#editNews").hide(); }, 5000);
                		}
                		if(JSON.parse(data) == "insert")
                		{
                			$("#news_error_hide").show();
						setTimeout(function() { $("#news_error_hide").hide(); }, 5000);
                		}
						$('#afterdelete').empty();
 						display_data();
 						
                        document.getElementById("news_error").innerHTML = "";	
                        $('#news').val('');
                 		// document.getElementById("news").style.border = "1px solid #ced4da";
                    /*if($.isEmptyObject(data.error))
                    {
                    	
                        
                    }*/

                },
                 error: function( data )
                 {
                 	if(data.status == 422)
                 	{
                 		console.log(data.responseJSON);
                 		document.getElementById("news_error").innerHTML = data.responseJSON.errors.news ? data.responseJSON.errors.news[0] : "";
                 		// document.getElementById("news").style.border = "1px solid red";

                 	}
                 }
				});
	}

}
function delete_news(id)
{
	var path = "https://l2hotzone.com/server/delete/news",
	$data = { 	
					id:id,
					"_token": "{!! csrf_token() !!}"
				 };
				 $.post(path,$data,function($data)
 				{
 					
 				}).done(function() {
				    alert( "News deleted Successfully." );
				    $('#afterdelete').empty();
 					display_data();
				  })
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
	display_data();
/*			var server_id=document.getElementById("server_id_hidden").value; 
			var path = "https://l2hotzone.com/server/display/news"

			$data = { 	
					id:server_id,
					"_token": "{!! csrf_token() !!}"
				 };

		$.post(path,$data,function($data)
 				{
 					 var result = JSON.parse($data)
 					 // console.log(result.length)

	 					  if(result.length != null)
	 					  {
				             var len = $data.length;
				             for(var i=0; i<result.length; i++)
				             {
				             	var id = result[i].id;
				             	var news = result[i].news;
				             	  var tr_str = "<div class='panel-body bg-light p-3'  id='"+id+"' style='border: 1px solid #ced4da'>" +
				                   "<div>" + news + "</div>" +
				                   "<i class='fa fa-trash-alt bg-danger p-2 float-right' style='color: white;font-size: 13px;cursor: pointer' onclick='delete_news("+id+")'></i>"
				                  
				               "</div>";
				                $("#userTable").append(tr_str);


				             }
				          }
 				})*/

	})
function display_data()
{
	var server_id=document.getElementById("server_id_hidden").value; 
			var path = "https://l2hotzone.com/server/display/news"

			$data = { 	
					id:server_id,
					"_token": "{!! csrf_token() !!}"
				 };

		$.post(path,$data,function($data)
 				{
 					 var result = JSON.parse($data);

	 					  if(result.length != null)
	 					  {
				             var len = $data.length;
				             for(var i=0; i<result.length; i++)
				             {
				             	var id = result[i].id;
				             	var news = result[i].news;
				             	var created = result[i].created_at;
				             	var update = result[i].updated_at;
				             	
				             	  var tr_str = "<div  class='panel-body bg-light p-3 mt-4' style='border: 1px solid #ced4da'>News<span style='background:black;color:white;    padding: 6px;margin-left: 10px;border-radius: 38px;font-weight: 700;'>"+created+"<span><i class='fa fa-trash-alt bg-danger p-2 float-right' style='color: white;font-size: 13px;cursor: pointer' onclick='delete_news("+id+")'></i></div>"+"<div class='panel-body bg-light p-3'    class='aa'  id='"+id+"' style='border: 1px solid #ced4da'>" +
				                   "<div>" + news +
				                   "</div>"
				                  
				               "</div>";
				                $("#userTable #afterdelete").append(tr_str);


				             }
				          }
 				})
}
 function re_generate(id)
 {

 	var path = "https://l2hotzone.com/Re-generate_api_key";
 	$data = {id:id,
 		 "_token": "{!! csrf_token() !!}"
 		};
 	
 	
 	$.post(path,$data,function($data)
 	{
 			$("#new_generated_key").val($data);
 			document.getElementById("show_api_content").style.display = "block";
 			document.getElementById("hide_gererate_btn").style.display = "none";
 	})
 } 

// Ajax call endsection
 $(window).scroll(function(){
 $('nav').toggleClass('scrolled', $(this).scrollTop() > 60);
 });
 
 window.onscroll = function() {myFunction()};
 var header = document.getElementById("myheader");
 var sticky = header.offsetTop;
 function myFunction() 
 {
 if (window.pageYOffset > sticky)
 {
     header.classList.add("sticky");
 }
 else 
 {
     header.classList.remove("sticky");
   }
 }
 function re_generate(id)
 {

 	var path = "https://l2hotzone.com/Re-generate_api_key";
 	$data = {id:id,
 		 "_token": "{!! csrf_token() !!}"
 		};
 	
 	
 	$.post(path,$data,function($data)
 	{
 			$("#new_generated_key").val($data);
 			document.getElementById("show_api_content").style.display = "block";
 			document.getElementById("hide_gererate_btn").style.display = "none";
 	})
 } 

</script>


<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            console.log($(e.target).parent('.categories').find('a[data-toggle="tab"]').not(this).removeClass('active'));
            e.target // newly activated tab
            e.relatedTarget // previous active tab
        })
        $('input[name="servertype_1"]').on("change", function(){
            $('input[name="servertype_1"]:checked').is("#servertype3") ? $('#datepicker').parent('.gj-datepicker').hide() : $('#datepicker').parent('.gj-datepicker').show(); 
        })
       $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            minDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate())
        });
        $('input[name="servertype_1"]:checked').is("#servertype3") ? $('#datepicker').parent('.gj-datepicker').hide() : $('#datepicker').parent('.gj-datepicker').show();
        
        $(window.location.hash).tab('show');

        $('#premiumcontentt').on('keyup',function(){
            $('.content_comehere').html($(this).val());
        });
        var _URL = window.URL || window.webkitURL;
        $("#imagefile").change(function(e) {
            var $this = $(this);
            var file, img;


            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                   
                    if(this.width == 120 && this.height == 90){
                        
                        $('#thumnailsample').attr('src', img.src);
                        $('[for=imagefile]').text($this.val());
                    }else{
                        $this.val('');
                        alert('images should be 120 x 90 only!');
                    }
                };
                img.onerror = function() {
                    alert( "not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);

            }

});

       		 // if(website_url == "")
		 // {
	  //     alert("Error: enter website url");
	  //     document.getElementById("website_url").style.border = "1px solid red";
	  //    }
	  //   	if(description == "")
	  //   	{
	  //   		alert("Error: enter description");
	  //   		document.getElementById("server_description").style.border = "1px solid red";
	  //   	}
		/*$data = { 	
					id:id,
					url:website_url,
					description:description,
					"_token": "{!! csrf_token() !!}"
				 };
				 $.post(path,$data,function($data)
 				{
 					alert($data)
 				
 				})*/


//       $('form[name="banner_add"]').on('submit', function(e){
          
//           var $this = $(this);
//           var flag = 0;
         
//           $this.find('input, select').each(function(i, j){
  
//              if(j.hasAttribute("required")){
                 
//               if($(j).val() == '' || $(j).val() == null){
//                   flag++;
//               }
  
//              }
//           });
  
//           if( flag != 0){
//               e.preventDefault();
//               alert("fill All field!");
//           } 
  
//       });
  
//   function readURL(input) {
//       if (input.files && input.files[0]) {
//           var reader = new FileReader();
//           reader.onload = function (e) {
//               $('#addshow').attr('src', e.target.result);
//           }
//           reader.readAsDataURL(input.files[0]);
//       }
//   }







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