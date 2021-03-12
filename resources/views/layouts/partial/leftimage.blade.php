<div class="bleft bfixed bgadsm imgnone">
         <a  href="{{ $imageBanner->where('id','=', 1)->first()->livebanner ? $imageBanner->where('id','=', 1)->first()->livebanner->website : url('/ads') }}">
    <img 
    title="{{ $imageBanner->where('id','=', 1)->first()->livebanner? 
    $imageBanner->where('id','=', 1)->first()->livebanner->till_date.' remains from expire' : '' }}"  
    src="{{ $imageBanner->where('id','=', 1)->first()->livebanner? $imageBanner[0]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-side-banner.png'}}" />
</a>
 </div>






