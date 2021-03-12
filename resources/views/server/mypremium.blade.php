@extends('layouts.layout')

@section('headsection')
<title>Buy Premium server</title>
@endsection

@section('content')
<?php
//echo '<pre>';print_r($mypre->toArray());die;
?>
<div class="maincontain container">
    <div class="space container" style="min-height: 900px !important;">
            <div class="page-one">
        <div class="top-row row">
            <div class="col-md-4"><a href="{{ route('buypremium') }}" class="btn" > <i class="fas fa-shopping-cart"></i> Buy Premium</a></div>
            <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-user"></i> My Premium</a></div>
            <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> Get more advertising</a></div>
        </div>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Server Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mypre as $mypr)
                
                <tr>
                    <td scope="row">{{ $mypr->server_name }}</td>
                    <td>{{ $mypr->created_at }}</td>
                    <td>{{ $mypr->till_date }}</td>
                    <td>
                    @php
                        $date = \Carbon\Carbon::today();
                      
                    @endphp
                    
                    @if($date->greaterThan($mypr->till_date))
                    <a class="btn btn-danger">Deactivated</a>
                    <!-- <i class="fas fa-stop">s</i> -->
                    
                    @elseif($mypr->active_status)
                    <a class="btn btn-success">Activated</a>
                    <!-- <i class="fas fa-play">w</i> -->
                    @else
                    <a class="btn btn-danger">Deactivated</a>
                    @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Record found!</td>
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
