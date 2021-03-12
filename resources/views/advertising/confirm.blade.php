@extends('layouts.layout')

@section('headsection')
<title>Confirm Server</title>
@endsection

@section('content')

<div class="maincontain container">
  <div class="space container" style="min-height: 700px;">

<table class="table">
  <thead>

  <tbody>
    <tr>
      <th scope="row"> {{ trans('lang.days') }}</th>
      <td>{{ $addDetails->get('days') }}</td>
    </tr>
    <tr>
      <th scope="row"> {{ trans('lang.total_purchase_cost') }}</th>
      <td>{{ $addDetails->get('totalCost') }}</td>
    </tr>
    <tr>
      <th scope="row"> {{ trans('lang.add') }}  {{ trans('lang.name') }}</th>
      <td>{{ $addDetails->get('addInstance')->Name }}</td>
    </tr>
    <tr>
      <th scope="row"> {{ trans('lang.location') }}</th>
      <td>{{ $addDetails->get('image') }}</td>
    </tr>
    
  </tbody>
</table>
<p>

 {{ trans('lang.banner_confirmation_msg') }}
</p>
<a href="{{ route('Tconfirm') }}"  class="btn btn-primary"> {{ trans('lang.confirm') }}</a>
</div>
</div>
@endsection



@section('pagefooterscript')
<style>
    #general{
        font-size:initial;
    }
</style>

@endsection
