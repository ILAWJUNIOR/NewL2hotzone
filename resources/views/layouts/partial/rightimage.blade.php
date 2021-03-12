<div class="bright bfixed bgadsm imgnone">
         <a  href="{{ $imageBanner->where('id','=', 3)->first()->livebanner ? $imageBanner->where('id','=', 3)->first()->livebanner->website : url('/ads') }}">
<img class="tsize" 
 title="{{ $imageBanner->where('id','=', 3)->first()->livebanner? 
    $imageBanner->where('id','=', 3)->first()->livebanner->till_date.' remains from expire' : '' }}" 
src="{{ $imageBanner->where('id','=', 3)->first()->livebanner? $imageBanner[1]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-side-banner.png' }}"
 />
</a>
</div>



