@extends('layouts.layout')

@section('headsection')
<title>Add server</title>
@endsection

@section('content')
    @if(Auth::guest())  
        @includeIf('userLog')
    @else
      

   {{ trans('lang.vote_support_message') }}

    @endif
    <style>
    #general{
       font-size:initial;
    }
    </style>

@endsection

@section('leftside')
    
@endsection

@section('rightside')
    
@endsection