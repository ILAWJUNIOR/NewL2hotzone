<div class="maincontain container">
    <center>
            <div class="row headertop headersearch centered">
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 12)->first()->livebanner ? $imageBanner->where('id','=', 12)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 12)->first()->livebanner? $imageBanner[3]['livebanner']['liveimages'] : 'no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 13)->first()->livebanner ? $imageBanner->where('id','=', 13)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 13)->first()->livebanner? $imageBanner[4]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"> <a  href="{{ $imageBanner->where('id','=', 14)->first()->livebanner ? $imageBanner->where('id','=', 14)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{$imageBanner->where('id','=', 14)->first()->livebanner? $imageBanner[5]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 15)->first()->livebanner ? $imageBanner->where('id','=', 15)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 15)->first()->livebanner? $imageBanner[6]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png'  }}" />
                     </a>
                  </div>
                  <div class="headerimage"><a  href="{{ $imageBanner->where('id','=', 29)->first()->livebanner ? $imageBanner->where('id','=', 29)->first()->livebanner->website : url('/ads') }}">
                     <img class="inner-image" src="{{ $imageBanner->where('id','=', 29)->first()->livebanner? $imageBanner[7]['livebanner']['liveimages'] :'https://l2hotzone.com/images/imagesAdd/no-image.png' }}" />
                     </a>
                  </div>

            </div>
         </center>
    <div class="space container">

      @if(!isset($_GET['server_name']))
      <div class="filter_box row">
        <div class="col-md-12">
   
       <!--    <div class="row">
            <div class="col-md-1"> --> 
              <select class="chronicle" id="chronicle" onchange="chroniclefilter()"  name="">
                <option value="" selected>By chronicle </option>
                <option value="chronicle-1">Chronicle 1</option>
                <option value="chronicle-2">Chronicle 2</option>
                <option value="chronicle-3">Chronicle 3</option>
                <option value="chronicle-4">Chronicle 4</option>
                <option value="chronicle-5">Chronicle 5</option>
                <option value="interlude">Interlude</option>
                 <option value="kamael">Kamael</option>
                <option value="hellbound">Hellbound</option>
                <option value="gracia1">Gracia 1</option>
                 <option value="gracia2">Gracia 2</option>
                <option value="gracia-final">Gracia Final</option>
                <option value="gracia-epilogue">Gracia Epilogue</option>
                 <option value="freya">Freya</option>
                <option value="highfive">High Five</option>
                <option value="goddess-of-destruction-awakening">Goddess of Destruction Awakening</option>
                 <option value="goddess-of-destruction-harmony">Goddess of Destruction Harmony</option>
                <option value="goddess-of-destruction-tauti">Goddess of Destruction Tauti</option>
                <option value="goddess-of-destruction-glory-days">Goddess of Destruction Glory Days</option>
                 <option value="goddess-of-destruction-lindvior">Goddess of Destruction Lindvior</option>
                <option value="epic-tale-of-aden-ertheia">Epic Tale of Aden Ertheia</option>
                <option value="infinite-odyssey">Infinite Odyssey</option>
                 <option value="classic10">Classic 1.0</option>
                <option value="classic15">Classic 1.5</option>
                <option value="classic20">Classic 2.0</option>
                <option value="classic25">Classic 2.5</option>
                <option value="helios">Helios</option>
                <option value="grand-crusade">Grand Crusade</option>
              </select>
          <!--   </div>
            <div class="col-md-2"> -->
               <select class="language" onchange="languagefilter()" id="language" >
                <option value="" selected>By language</option>
                @foreach($select as $lang)
                   <option value="{{ $lang->code }}">{{ $lang->lang }}</option>
                @endforeach
              
              </select>
          <!--   </div>
            <div class="col-md-2"> -->
              <select class="xpRate" onchange="xpRatefilter()" id="xpRate"  >
                <option value="" selected>By xprate</option>
                <option value="0">0X</option>
                <option value="1">1X</option>
                 <option value="2">2X</option>
                <option value="3">3X</option>
                <option value="4">4X</option>
                <option value="5">5X</option>
                <option value="6">6X</option>
                <option value="7">7X</option> 
                <option value="9">9X</option>
                <option value="10">10X</option>
                <option value="12">12X</option>
                <option value="15">15X</option>
                <option value="20">20X</option>
                <option value="25">25X</option>
                <option value="30">30X</option>
                <option value="35">35X</option>
                <option value="40">40X</option>
                <option value="45">45X</option>
                <option value="50">50X</option>
                <option value="55">55X</option>
                <option value="70">70X</option>
                <option value="75">75X</option>
                <option value="99">99X</option>
                <option value="100">100X</option>
                <option value="120">120X</option>
                <option value="150">150X</option>
                <option value="250">250X</option>
                <option value="300">300X</option>
                <option value="500">500X</option>
                <option value="1000">1000X</option>
                <option value="1200">1200X</option>
                <option value="1905">1905X</option>
                <option value="2000">2000X</option>
                <option value="3000">3000X</option>
                <option value="4000">4000X</option>
                <option value="9000">9000X</option>
                <option value="9500">9500X</option>
                <option value="9999">9999X</option>
                <option value="99999">99999X</option>


              </select>
           <!--  </div>
            <div class="col-md-2"> -->
               <select class="serverplatform" onchange="serverplatformfilter()" id="serverplatform">
                <option value="" selected>By platform</option>
                <option value="L2j">L2j</option>
                <option value="L2off">L2off</option>
              </select>
            <!-- </div>
            <div class="col-md-2"> -->
               <select class="serverType" onchange="serverTypefilter()" id="serverType" >
                <option value="" selected>By server type</option>
                <option>gve</option>
                <option>multiskill</option>
                <option>normal</option>
                <option>stacksub</option>
              </select>
         <!--    </div>
             <div class="col-md-2"> -->
               <select class="created_at" onchange="created_atfilter()" id="created_at" >
                <option value="" selected>By date</option>
                <option value="1">oldest</option>
                <option value="2">newest</option>
              </select>
           <!--  </div>
          </div> -->
      
        <br>
      </div>
      </div>
      @endif

        <div style="">
       
        	@php ($i = 1)  


    
    @foreach($premiumlists as $key => $premiumlist)

    @if(!isset($newestserver))
    
               <!-- <p>$i<=3 && $premiumlist->haspremium? 'text_bol_three' : 'normal'</p> --> 
            <div class="row  {{ $premiumlist->haspremium? 'midbg-sponsor' : 'normal' }} lower_box ">
                <div class="col-md-12">
                  <div class="zone_wrp_lower">
                    <table> 
                    <tbody>
                        <tr>
                           <td></td>
                            <td width="40px"> <span class="rank">{{  (isset($paginate_records) && !empty($paginate_records)) ? $premiumlists->firstItem() + $key : $key +1 }}</span> </td>
                                @if($premiumlist->haspremium)
                            <td width="140px" valign="middle" class="zone_img">
                            <a href='{{ route("serverdetail", [$premiumlist->id,  $premiumlist->server_name] ) }}' rel="nofollow">
                                 @if($premiumlist->premiumcontent)
                                    @if($premiumlist->premiumcontent->thumbnail)
                                        <img src="{{ url('/images/imagesAdd/'. $premiumlist->premiumcontent->thumbnail ) }}" alt="6084_l2topzone.gif"> </a>
                                    @endif
                                 @else
                                 <img src="{{ url('images/logo.png') }}" alt="6084_l2topzone.gif"> </a>
                                 @endif 
                            </td>
                                @endif
                            <td>
                            <div class="row">
                                <div class="col-md-12">
                                	
                                <a href='{{ route("serverdetail", [$premiumlist->id,  $premiumlist->server_name] ) }}' rel="nofollow" class="zone_title">
                                	
                                    <b>{{ $premiumlist->server_name }}</b></a>
                                        <span class="label chronicle-interlude big">
                                          @if($premiumlist->chronicle == 'highfive')
                                           <button class="btn-cus big highfive">
                                           {{ $premiumlist->chronicle }}
                                           </button>
                                         @elseif($premiumlist->chronicle == 'interlude')
                                         <button class="btn-cus big interlude">
                                          {{ $premiumlist->chronicle }}
                                         </button>
                                         @elseif($premiumlist->chronicle == 'kamael')
                                         <button class="btn-cus big kamael">
                                          {{ $premiumlist->chronicle }}
                                         </button>
                                         @else
                                         <button class="btn-cus big garclaFinal">
                                          {{ $premiumlist->chronicle }}
                                         </button>
                                         @endif
                                        </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="label label-primary">
                                       @if($premiumlist->xpRate > 1000)
                                      <button class="btn-cus medium">EXP: 1000</button>
                                      @else
                                      <button class="btn-cus medium">EXP: {{ $premiumlist->xpRate }}</button>
                                      @endif
                                    <span class="label label-primary"><button class="btn-cus medium">SP: {{ $premiumlist->spRate }}</button></span>
                                    <span class="label label-primary"><button class="btn-cus medium">DROP: {{ $premiumlist->dropRate }}</button></span>
                                    <span class="label label-primary"><button class="btn-cus medium"> ADENA: {{ $premiumlist->maxRate }}</button></span>
                                    <span class="label label-primary">
                                      @if($premiumlist->serverplatform == 'L2j')
                                      <button class="btn-cus small l2off ">
                                      {{ $premiumlist->serverplatform}}
                                      </button>
                                      @else
                                      <button class="btn-cus small">
                                        {{ $premiumlist->serverplatform}}
                                      </button>
                                      @endif </span>
                                     <span class="label label-primary"> 
                                      <button class="btn-cus small platform-type-serverdetails">
                                        {{ $premiumlist->type }}
                                        </button> 
                                      </span>
                                    <a href='{{ route("serverdetail", [$premiumlist->id,  $premiumlist->server_name] ) }}' rel="nofollow">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="vipdes">
                                @if($premiumlist->premiumcontent)
                                    @if($premiumlist->premiumcontent->premiumcontent)
                                        <p> {{ $premiumlist->premiumcontent->premiumcontent }} </p>
                                    @endif
                                @endif
                                </div>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="footersection">
                   
                        <a href="{{ url('/vote/id/'. $premiumlist->id) }}" data-toggle="tooltip" class="tip-bottom" title="" data-original-title="Votes">
                            <i class="fa fa-fw fa-lg fa-thumbs-up text-muted"></i>
                            <span class="sub">{{$premiumlist->total_count}}</span>
                            <!-- <span class="sub"><?php $total_vt=0; foreach($server_total_vote as $total_server_vote){ 
                              if($premiumlist->id==$total_server_vote->server_id)
                              {
                                  $total_vt=$total_server_vote->total_vote;
                              }
                            } echo $total_vt; ?> </span> -->
                        </a>
                        <!-- <a href="#" data-toggle="tooltip" class="tip-bottom" title="" data-original-title="Reviews">
                            <i class="fa fa-fw fa-lg fa-comments text-muted"></i>
                            <span class="sub">31</span>
                        </a> -->
                        <!-- server_total_review -->
                        <i class="fa fa-comments text-muted" aria-hidden="true"></i>
                         <span class="sub"><?php $total_rv=0; foreach($server_total_review as $total_reviews){ 
                              if($premiumlist->id==$total_reviews->server_id)
                              {
                                  $total_rv=$total_reviews->total_review;
                              }
                            } echo $total_rv; ?></span>

                         <?php
                         $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$premiumlist->serverIp;
                         $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
                         $country = $addrDetailsArr['geoplugin_countryName'];

                          ?>
                       
                            <i class="fa fa-globe text-muted" aria-hidden="true"></i></i>
                            <span class="sub"><?= $country ?></span>
                        
                            <i class="fa fa-fw fa-lg fa-language text-muted"></i>
                            <span class="sub">{{$premiumlist->langret->lang}}</span>
                        <!-- <a href="#" style="float:right;" data-toggle="tooltip" class="tip-bottom" title="" data-original-title="Premium server">
                            <i class="fa fa-fw fa-lg fa-paypal text-muted"></i>
                        </a>  -->
                        </div>
                    </div>
                  </div>
                </div>
                
                
        @endif
        @endforeach
       <center>{{ (isset($paginate_records) && !empty($paginate_records)) ? $paginate_records->links("pagination::bootstrap-4") : '' }}</center>

  
   
  

</div>
</div>
</div>





<style type="text/css">
  .text_bol_three{
    font-weight: bold !important;
  }

  select{
    font-size: 16px !important;
    margin: 5px !important;
    width: 135px !important;
    border-radius: 5px !important;
    color: cadetblue !important;
  }
  .btn-cus {
    background: url(../images/x50.png) no-repeat;
    background-size: 60px 20px;
    width: 60px;
    
 }
 .medium
 {
   border: 0;
    color: #fff;
    height: 20px;
    margin-right: 3px;
    font-size: 10px;
    font-family: "PT Sans", sans-serif;
    line-height: 20px;
    cursor: pointer;
 }
 .small
 {
    background: url(../images/l2j.png) no-repeat;
    width: 41px;
    background-size: 40px 20px !important;
 }
.l2off
{
  background: url(../images/l2off.png) no-repeat;
}
.platform-type-serverdetails
{
  background: #2e6701 !important;
  width:70px;
}
.interlude {
  background: url(../images/interlude.png) no-repeat;
}
.garclaFinal {
  background: url(../images/garclaFinal.png) no-repeat;
}
.highfive {
  background: url(../images/highfive.png) no-repeat;
}
.kamael {
  background: url(../images/kamael.png) no-repeat;
}
.big
{
    margin-left: 0px;
    width: auto;
    background-size: 100% 25px !important;
    padding-right: 20px;
}


.zone_wrp{}
.zone_wrp_lower{background: #d3f5fd;border: 2px solid #337ab7;border-radius: 10px;padding: 10px;margin-bottom: 10px;}
.zone_wrp_content {
    display: flex;
    align-items: center;
}
.zone_no{}
.zone_no h4{    padding: 3px;
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
    font-size: 13px;
}
.zone_img {
    padding: 0 15px;
}
.zone_img a{}
.zone_img a img {
    width: 120px;
    height: 90px;
    object-fit: contain;
}
.zone_desc{}
.zone_title {
    color: #337ab7;
    font-size: 16px;
    font-weight: 600;
}
.zone_title span.orange {
    background: #ef5400;
    color: #fff;
    font-size: 12px;
    padding: 0.2em;
    border-radius: 0.2em;
    font-weight: 400;
}
.label_btns{}
.label_btns span {
    display: inline;
    padding: .2em .4em .3em;
    font-size: 75%;
    color: #fff;
    border-radius: .25em;
    background: #337ab7;
}
span.blue{}
span.pink{background: #fd1b7a;color: #fff;}
span.green{background: #2e6701;color: #fff;}
.zone_desc p {
    font-size: 12px;
    color: #000;
    margin: 0;
    padding-bottom: 5px;
}
.like_vote_wrp {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #ccc;
    padding-top: 10px;
}
.like_leftside a {
    font-size: 12px;
    color: #808080;
    padding-right: 8px;
}
a.btn.btn-danger.btn-xs.pull-right {
    padding: 1px 5px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 0;
}

.headerimage {
    padding: 15px;
}

.headerimage a {
    width: 200px;
    height: 200px;
}
.headertop img {
    width: 100%;
    padding: 0;
    /* top: 28%; */
    /* left: 0%; */
    height: 100%;
    object-fit: fill;
    width: 178px !important;
    height: 78px !important;
}

@media only screen and (max-width: 575px) {
  .zone_wrp_content {
    display: block;
    align-items: center;
    text-align: center;
    margin: 0 auto;
}
.zone_no h4 {text-align: center;float: none;margin: 0 auto;}
.label_btns span {display: block;margin: 2px 0;}
.like_vote_wrp {    display: block;}
}


</style>

<script>

  function chroniclefilter()
  {
     var key="chronicle";
     var value = document.getElementById("chronicle").value;
     var url= window.location.href;
     var mainUrl=url.substring(0,url.indexOf("?"));

     window.location.href=mainUrl+'?key='+key+'&value='+value;


  }

  function languagefilter()
  {
     var key="language";
     var value = document.getElementById("language").value;

     var url= window.location.href;
     var mainUrl=url.substring(0,url.indexOf("?"));
     if(value!='')
     {
       window.location.href=mainUrl+'?key='+key+'&value='+value;
     }
    

  }

   function xpRatefilter()
  {
     var key="xpRate";
     var value = document.getElementById("xpRate").value;
     var url= window.location.href;
     var mainUrl=url.substring(0,url.indexOf("?"));
     if(value!='')
     {
       window.location.href=mainUrl+'?key='+key+'&value='+value;
     }

  }

   function serverplatformfilter()
  {
     var key="serverplatform";
     var value = document.getElementById("serverplatform").value;
     var url= window.location.href;
     var mainUrl=url.substring(0,url.indexOf("?"));

     if(value!='')
     {
       window.location.href=mainUrl+'?key='+key+'&value='+value;
     }

  }

   function serverTypefilter()
  {
     var key="type";
     var value = document.getElementById("serverType").value;
     var url= window.location.href;
     var mainUrl=url.substring(0,url.indexOf("?"));

    if(value!='')
     {
       window.location.href=mainUrl+'?key='+key+'&value='+value;
     }

  }

   function created_atfilter()
  {
     var key="created_at";
     var value = document.getElementById("created_at").value;
     var url= window.location.href;
     var mainUrl=url.substring(0,url.indexOf("?"));

    if(value!='')
     {
       window.location.href=mainUrl+'?key='+key+'&value='+value;
     }

  }

    
      
 
</script>