@extends('layouts.layout')

@section('headsection')
<title>Confirm Server</title>
@endsection
@section('content')
<div class="maincontain container">
  <div class="space container">
   <div style="min-height: 600px; "> 
    <table class="table">
      <thead>

      <tbody>
        <tr>
          <th scope="row">{{ trans('lang.days') }}</th>
          <td>{{ $datab['days'] }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.total_purchase_cost') }}</th>
          <td>{{ $datab['totalcost'] }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.add') }} {{ trans('lang.name') }}</th>
          <td>{{ $datab['addname'] }}</td>
        </tr>
        <tr>
          <th scope="row">{{ trans('lang.location') }} </th>
          <td>{{ $datab['imagelocation'] }}</td>
        </tr>
        
      </tbody>
    </table>
  
  <p>

 {{ trans('lang.banner_confirmation_msg') }}
</p>
<a href="{{ route('creatadd') }}"  class="btn btn-primary">{{ trans('lang.confirm') }}</a>

</div>
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
