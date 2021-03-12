
@extends('layouts.layout')

@section('headsection')
<title>Buy Premium server</title>
@endsection

@section('content')

<div class="maincontain container">
    <div class="space container" style="min-height: 700px;">
        <div class="page-one">
        <div class="top-row row">
            <div class="col-md-4"><a href="{{ route('text') }}" class="btn" > <i class="fas fa-shopping-cart"></i> {{ trans('lang.buy') }} {{ trans('lang.text_ad') }} {{ trans('lang.premium') }}</a></div>
            <div class="col-md-4"><a href="javascript:void(0)" class="btn active" > <i class="fas fa-user"></i> {{ trans('lang.my') }}  {{ trans('lang.text_ad') }} {{ trans('lang.premium') }}</a></div>
            <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> {{ trans('lang.get_more') }} {{ trans('lang.advertising') }}  </a></div>
        </div>

        <table class="table">
           
            <tbody>
                @forelse($myTextadds as $myTextadd)
               
                {{ print_r($myTextadd) }}
                <tr>
                    <td scope="row">{{ $myTextadd->Name }}</td>
                    <td>{{ $myTextadd->till_date }}</td>
                     <td>
                    @php
                        $date = \Carbon\Carbon::today();
                      
                    @endphp
                    
                    @if($date->greaterThan($myTextadd->till_date))
                    <a class="btn btn-danger">Deactivated</a>
                    <!-- <i class="fas fa-stop">s</i> -->
                    @elseif($myTextadd->active_status)
                        <a class="btn btn-success">Activated</a>
                    @else
                    <a class="btn btn-warning">Pending</a>
                    <!-- <i class="fas fa-play">w</i> -->

                    @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">{{ trans('lang.no_record_found') }}</td>
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
