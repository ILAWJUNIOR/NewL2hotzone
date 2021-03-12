
@extends('layouts.layout')

@section('headsection')
<title>Buy Premium server</title>
@endsection

@section('content')

<div class="maincontain container">
    <div class="space container" style="min-height: 700px;">
         <div class="page-one">
        <div class="top-row row">
            <div class="col-md-4"><a href="{{ route('ads') }}" class="btn" > <i class="fas fa-shopping-cart"></i> {{ trans('lang.buy') }} {{ trans('lang.banner_ad') }}</a></div>
            <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-user"></i> {{ trans('lang.my') }} {{ trans('lang.banner_ad') }}</a></div>
            <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> {{ trans('lang.get_more') }} {{ trans('lang.advertising') }}</a></div>
        </div>

        <table class="table">
           
            <tbody>
                @forelse($myBanners as $myBanner)
                <tr>
                    <td scope="row">{{ $myBanner->server_name }}</td>
                    <td>{{ $myBanner->till_date }}</td>
                    <td>{{ $myBanner->name }}</td>
                    <td>{{ $myBanner->liveimages }}</td>
                     <td>@if(date('y-m-d',strtotime($myBanner->till_date)) < date('y-m-d')) <a class="btn btn-danger">Deactivated</a> @elseif($myBanner->active_flag)  <a class="btn btn-success">Activated</a> @else <a class="btn btn-warning">Pending</a> @endif</td>
                    
                </tr>
                @empty
                <tr>
                    <td colspan="4">{{ trans('lang.no_record_found') }} </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        

</div>
    </div>

</div>


@endsection

@section('pagefooterscript')
<style>
.table{
    font-size:14px !important;
}
.page-two .fas.fa-stop {

color: orange;

}
.page-two .fas.fa-play {

color: green;

}
</style>
<script>
$(document).ready(function(){

   

});
</script>
@endsection