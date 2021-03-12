@extends('layouts.layout')

@section('headsection')
<title>Confirm Server</title>
@endsection

@section('content')




<?php 

$sever = $data['server_list'];


?>
<div class="maincontain container">
  <div class="space container">
    <table class="table">
      <thead>

      <tbody>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->server_name }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->servertype_1 }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->serverplatform }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->type }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->loginIp }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->serverIp }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->loginPort}}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->serverPort }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->chronicle }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->xpRate }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->safeRate }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->spRate }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->adenaRate }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}e</th>
          <td>{{ $sever->maxRate }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->language }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td>{{ $sever->website }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.server') }} {{ trans('lang.name') }}</th>
          <td><p style="    max-width: 600px; word-break: break-word;">{{ $sever->desc }}</p></td>
        </tr>
      </tbody>
    </table>
    <a href="{{ route('confirmation') }}"  class="btn btn-primary">{{ trans('lang.confirm') }}</a>
</div>
</div>
@endsection

@section('pagefooterscript')
<style>
    #general{
        font-size:initial;
    }
</style>
<script>
$(document).ready(function(){

    


});
</script>
@endsection
