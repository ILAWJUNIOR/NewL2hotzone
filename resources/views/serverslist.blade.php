@extends('layouts.layout')

@section('headsection')
<title>Premuim servers</title>
@endsection
       
@section('content')

   
        <div class="server_page">

    
 @include('serverSection')
 

    <style>
        .midbg-sponsor,
        .row.normal {
            margin-bottom:2px;
            word-break: break-all;
            font-size: 14px;
        }
        .midbg-sponsor
         {
            
        }
        .row.normal {
    background: #fff;
    margin-bottom: 10px;
    box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.09);
    padding:5px 20px
}
.midbg-sponsor{
    background: #f6fdff;
    margin-bottom: 10px;
    box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.09);
     padding:5px 20px
}
.footersection:before{
    content:'';
    clear:both;
    display:table;
}
.footersection{
    width:100%;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #ccc;
    padding-top: 10px;
}
.pagination-sm .page-link
{
    padding: 10px 16px;
    font-size: 14px;
}
.pagination
{
    padding: 10px 16px;
    font-size: 14px;
}

.big {border: 0;}
.rank{padding: 3px;
    text-align: center;
    border-radius: 2px;
    background: #fafafa;
    float: left;
    width: 35px;
    text-shadow: 1px 1px 0 rgb(255 255 252 / 50%);
    box-shadow: inset 1px #fff;
    border-top: 1px solid #ececec;
    border-left: 1px solid #e8e8e8;
    border-right: 1px solid #ececec;
    border-bottom: 1px solid #e8e8e8;
    margin: 0;
    font-size: 13px;}


    .normal.lower_box .zone_wrp_lower {background: #fff !important ;border: 0 !important;}
    .normal.lower_box .footersection {margin-top: 10px;}

    </style>
  <!--   <script >
        $(".pagination").addClass("pagination-sm");
    </script> -->
        </div>
    @endsection
@section('leftside')
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