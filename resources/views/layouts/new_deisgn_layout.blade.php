<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
      <link rel="stylesheet" href="{{ url('css/style.css') }}" />
   </head>
   
   <style type="text/css">
      #main_menu > li:last-child
      {
          float:right;
      }
      .footer {
      background: #51BDB5;
      position: relative;
      z-index: 150;
      margin-top: 50px;
      }
      .f1 ul li {
      list-style: none;
      padding-left: 170px;
      }
      .f1 ul li a {
      color: #fff;
      font-weight: lighter;
      letter-spacing: 1px;
      text-decoration: none;
      line-height: 35px;
      font-size: 13px;
      }
      .f1 ul li h5 strong {
      color: white;
      }
      .f1 {
      padding: 20px;
      }
      .cfooter {
      background: black;
      padding-left: 48px;
      }
      .cfooter p {
      color: white;
      font-size: 14px;
      margin: 10px;
      }
      .headertop img {
      width: 100%;
      padding: 10px;
      top: 28%;
      left: 0%;
      }
      .menu {
      background: #fff;
      z-index: 1000 !important;
      }
      .mymenu ul {}
      .mymenu ul li a {
      font-size: 14px;
      text-transform: uppercase;
      font-weight: 600;
      color: black !important;
      }
      .mymenu ul li:hover {}
      .navbar-default {
      transition: 500ms ease;
      }
      .navbar-default.scrolled {
      background: #51BDB5;
      }
      .sticky {
      position: fixed;
      top: 0;
      width: 100%;
      }
      .sticky+.content {
      padding-top: 102px;
      }
      .socialimage {
      width: 16px;
      margin-right: 4px;
      }
      @media (min-width: 768px) .navbar-right {
      float: right!important;
      margin-right: -15px;
      }
      .bgadsm {
      top: 50px;
      }
      .bleft {
      right: 50%;
      margin-right: 524px;
      }
      .bfixed,
      {
      position: fixed;
      }
      .bgadsm {
      top: 50px;
      }
      .bright {
      left: 50%;
      margin-left: 524px;
      }
      .bfixed,
      .floating_wrap {
      position: fixed;
      }
      .middle-content-inner-sides {}
      .hcolor {
      font-size: 20px;
      color: #51BDB5;
      text-align: left;
      padding: 4px 0;
      padding-left: 6px;
      border-bottom: 2px solid #51BDB5
      }
      .containimage {
      position: absolute;
      height: 250px;
      width: 300px;
      }
      .usernews {
      display: inline-block;
      width: 300PX;
      background: white;
      }
      .maincontain{
      background-color: #F1F1F1;
      }
      @media (min-width: 320px) and (max-width: 480px) {
      .maincontain {
      margin-left: 0px;
      }
      }
      .heading {
      background-color: #51BDBB;
      width: 100% !important;
      }
      .heading p {
      font-size: 12px;
      text-align: center;
      color: #fff;
      padding: 8px 0;
      margin: 0;
      text-transform: uppercase;
      }
      @media (min-width: 1200px) {
      .maincontain.container {
      max-width: 1080px;
      }
      }
      .headertop {
      text-align: center;
      margin: 0 auto;
      display: inline-flex;
      }
      .headerimage{
      width: 20%;
      }
      .collapse.navbar-collapse.mymenu {
      text-align: right;
      width: 100%;
      }
      .navbar-nav.navbar-right.custom-ul {
      display: inline-flex;
      }
      .custom-ul li{
      padding-left: 8px !important;
      }

      .custom-ul li a:{
      background-color: white !important;
      }
      @media (max-width: 1024px) {
      .f1 ul li {
      padding-left: 50px;
      }
      }
      @media (min-width: 992px) {
      .collapse.navbar-collapse.mymenu {
      display: block !important;
      }
      }
      @media (min-width: 320px) and (max-width: 768px){
        .mymenu{
            text-align: left !important;
        }
      }
      @media (max-width: 768px) {
      .f1 ul li {
      padding-left: 0px !important;
      }
      }
      @media (min-width: 320px) and (max-width:991px) {
      .collapse.navbar-collapse.mymenu {
      text-align: left;
      }
      }
      @media (min-width: 320px) and (max-width: 480px) {
      .headertop {
      display: none;
      }
      }
      @media (min-width: 320px) and (max-width: 480px) {
      .usernews {
      margin-top: 30px;
      }
      }
      @media (min-width: 320px) {
      .f1 ul li {
      padding-left: 0px;
      }
      }
      @media (min-width: 320px) and (max-width: 480px) {
      .cfooter {
      padding-left: 48px;
      }
      }
      /*@media (min-width: 320px) and (max-width: 480px) {
      .mymenu ul li{
      padding-left: 0px;
      }*/
   </style>
   <body>
      <!-- ********************** HEADER BOTTOM START ************************ -->
      <div>
         <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top menu" id="myheader">
            <a class="navbar-brand" href="#"><img class="logo-image" src="{{url('images/logo.png')}}" alt="craftnotion" style="width: 120px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mymenu" id="navbarNav" style="text-align: center" >
               <ul id="main_menu" class="navbar-nav navbar-right custom-ul">
                  <li class="nav-item">
                     <a class="nav-link"  href="{{ url('alllineage2servers') }}">All lineage2 servers</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('premiumservers') }}">premium servers</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('newservers') }}">new servers</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Coming Soon Servers</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('searchservers') }}">search a servers</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('addserver') }}">add new servers</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('advertising') }}">Advertising</a>
                  </li>
              
               </ul>

            </div>
            <div class="wrap-panel h-100"  style="width: 227px;">
               @if(Auth::guest())
               <div class="sign">
                  <img src="/images/loginregister.png"  style="width: 23px;margin-right: 6px;vertical-align: bottom;" alt="Login">
                  <span class="sign-lr"><a href="{{url('/forum/index.php?action=login&page=dashboard')}}">Login</a></span>
                  <span class="divider">|</span>
                  <span class="sign-lr"><a href="{{url('/forum/index.php?action=register&page=dashboard')}}">Register</a></span>
               </div>
               @else
               <div class="dropdown">
                  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->member_name }}
                  </a>
                  <?php $v = "forum/index.php?action=logout&page=dashboard;".$session_var.'='.$session_value; 
                     $prof = "forum/index.php?action=profile&area=account&u=".Auth::User()->id_member; 
                     $forum = "forum/index.php"; 
                     ?>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     <a class="dropdown-item" href="{{ url($prof) }}">Profile</a>
                     <a class="dropdown-item" href="{{ route('userseverlist') }}" >Server List </a>
                     <a class="dropdown-item" href="{{ url($forum) }}">Forum</a>
                     <a class="dropdown-item" href="{{ url($v) }}">Logout</a>
                  </div>
               </div>
               <!-- <div class="sign">
                  <img src="/images/loginregister.png" alt="Login">
                  <span class="sign-lr"><a href="#"> {{ Auth::user()->member_name }}</a></span>
                  <span class="divider">|</span>
                  <?php $v = "forum/index.php?action=logout&page=dashboard;".$session_var.'='.$session_value; ?>
                  <span class="sign-lr"><a href="{{ url($v) }}"> Logout</a></span>
                  </div>  --> 
               @endif  
            </div>
      </nav>
      </div>
      <!-- ************************ HEADER BOTTOM  END ************************** -->
      <!-- ********************* LEFT SIDE IMAGE START  *********************** -->
      <div class="bleft bfixed bgadsm">
         <img src="{{ url('/images') }}/imagesAdd/left.gif" />
      </div>
      <!-- **************** LEFT SIDE IIMAGE END ********************************* -->
      <!-- ************************* RIGHT SIDE IMAGE START ********************* -->
      <div class="bright bfixed bgadsm">
         <img src="{{ url('/images') }}/imagesAdd/right.gif" />
      </div>
      <!-- **************** RIGHT SIDE IMAGE END ****************** -->
      <!-- ************** MIDDLE CONTENT START ***************** -->
      <div class="maincontain container">
         <center>
            <div class="row headertop centered">
               <div class="headerimage"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div>
               <div class="headerimage"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div>
               <div class="headerimage"><img class="" src="{{ url('/images') }}/imagesAdd/b3.gif" alt="craftnotion"></div>
               <div class="headerimage"><img class="" src="{{ url('/images') }}/imagesAdd/b4.gif" alt="craftnotion"></div>
               <div class="headerimage"><img class="" src="{{ url('/images') }}/imagesAdd/b5.gif" alt="craftnotion"></div>
               <!--  <div class="row"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div>
                  <div class="row"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div>
                  <div class="row"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div>
                  <div class="row"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div>
                  <div class="row"><img class="" src="{{ url('/images') }}/imagesAdd/b1.gif" alt="craftnotion"></div> -->
            </div>
         </center>
         <div class="space container">
            <div class="row">
               <div class="col-md-6">
                  <div class="middle-content-inner mb-4">
                     <div class="middle-content-inner-sides" style="margin-right: 19px;">
                        <div class="wrap">
                           <div class="heading myheading" style="width: 100%;">
                              <p class="myp">Newest Server of lengae 2</p>
                           </div>
                           <table class="table">
                              <tbody>
                                 {{-- newest text servers start from here --}}
                                 @if(array_key_exists('newest', $textAdds))
                                 @foreach($textAdds['newest'] as $keyn => $textAdd)
                                 @if($keyn == 'newest_1')
                                 @php($class = 'green' )
                                 @elseif($keyn == 'newest_2')
                                 @php($class = 'blue' )
                                 @else
                                 @php($class = 'red' )
                                 @endif
                                 @foreach($textAdd as $textAd)
                                 <tr class="{{ $class }}">
                                    <td class="title">
                                       <div class="in">
                                          <a href=' {{ route("serverdetail", [$textAd->id,  $textAd->server_name] ) }}'>
                                          <span>{{ $textAd->server_name }}</span>
                                          </a>
                                       </div>
                                    </td>
                                    <td class="small">
                                       @if($textAd->serverplatform == 'L2j')
                                       <button class="btn-cus small l2off ">
                                       {{ $textAd->serverplatform}}
                                       </button>
                                       @else
                                       <button class="btn-cus small">
                                       {{ $textAd->serverplatform}}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="big">
                                       @if($textAd->chronicle == 'highfive')
                                       <button class="btn-cus big highfive">
                                       {{ $textAd->chronicle }}
                                       </button>
                                       @elseif($textAd->chronicle == 'interlude')
                                       <button class="btn-cus big interlude">
                                       {{ $textAd->chronicle }}
                                       </button>
                                       @elseif($textAd->chronicle == 'kamael')
                                       <button class="btn-cus big kamael">
                                       {{ $textAd->chronicle }}
                                       </button>
                                       @else
                                       <button class="btn-cus big garclaFinal">
                                       {{ $textAd->chronicle }}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="medium">
                                       <button class="btn-cus medium">{{ $textAd->xpRate }}</button>
                                    </td>
                                 </tr>
                                 @endforeach
                                 @endforeach
                                 @endif
                                 {{-- newest regualr servers start from here --}}
                                 @foreach($newservers as $newserver)
                                 <tr>
                                    <td class="title">
                                       <div class="in arrow">
                                          <a href=' {{ route("serverdetail", [$newserver->id,  $newserver->server_name] ) }}'>
                                          <span>{{ $newserver->server_name }}</span>
                                          </a>
                                       </div>
                                    </td>
                                    <td class="small">
                                       @if($newserver->serverplatform == 'L2j')
                                       <button class="btn-cus small l2off ">
                                       {{ $newserver->serverplatform}}
                                       </button>
                                       @else
                                       <button class="btn-cus small">
                                       {{ $newserver->serverplatform}}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="big">
                                       @if($newserver->chronicle == 'highfive')
                                       <button class="btn-cus big highfive">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @elseif($newserver->chronicle == 'interlude')
                                       <button class="btn-cus big interlude">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @elseif($newserver->chronicle == 'kamael')
                                       <button class="btn-cus big kamael">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @else
                                       <button class="btn-cus big garclaFinal">
                                       {{ $newserver->chronicle }}
                                       </button>
                                       @endif
                                    </td>
                                    <td class="medium">
                                       <button class="btn-cus medium">{{ $newserver->xpRate }}</button>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="middle-content-inner-sides">
                     <div class="wrap">
                        <div class="heading">
                           <p>Newest 10 premium Servers</p>
                        </div>
                        <table class="table">
                           <tbody>
                              @if(array_key_exists('premium', $textAdds))
                              @foreach($textAdds['premium'] as $keyp => $textAddPr)
                              @if($keyp == 'premium_1')
                              @php($class = 'green' )
                              @elseif($keyp == 'premium_2')
                              @php($class = 'blue' )
                              @else
                              @php($class = 'red' )
                              @endif
                              @foreach($textAddPr as $textAddP)
                              <tr class="{{ $class }}">
                                 <td class="title">
                                    <div class="in">
                                       <a href=' {{ route("serverdetail", [$textAddP->id,  $textAddP->server_name] ) }}'>
                                       <span>{{ $textAddP->server_name }}</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($textAddP->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $textAddP->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $textAddP->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($textAddP->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $textAddP->chronicle }}
                                    </button>
                                    @elseif($textAddP->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $textAddP->chronicle }}
                                    </button>
                                    @elseif($textAddP->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $textAddP->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $textAddP->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">{{ $textAddP->xpRate }}</button>
                                 </td>
                              </tr>
                              @endforeach
                              @endforeach
                              @endif
                              {{-- premium regual servers start from here --}}
                              @foreach($premiumservers as $premiumserver)
                              <tr>
                                 <td class="title">
                                    <div class="in arrow">
                                       <a href=' {{ route("serverdetail", [$premiumserver->id,  $premiumserver->server_name] ) }}'>
                                       <span>{{ $premiumserver->server_name }}</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($premiumserver->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $premiumserver->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $premiumserver->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($premiumserver->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @elseif($premiumserver->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @elseif($premiumserver->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $premiumserver->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">{{ $premiumserver->xpRate }}</button>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="middle-content-inner-sides" style="margin-right: 19px;">
                     <div class="wrap">
                        <div class="heading">
                           <p>top 10 Lineage 2 servers</p>
                        </div>
                        <table class="table">
                           <tbody>
                              @if(array_key_exists('top', $textAdds))
                              @foreach($textAdds['top'] as $keyt => $textAddtop)
                              @if($keyt == 'top_1')
                              @php($class = 'green' )
                              @elseif($keyt == 'top_2')
                              @php($class = 'blue' )
                              @else
                              @php($class = 'red' )
                              @endif
                              @foreach($textAddtop as $textAddto)
                              <tr class="{{ $class }}">
                                 <td class="title">
                                    <div class="in">
                                       <a href=' {{ route("serverdetail", [$textAddto->id,  $textAddto->server_name] ) }}'>
                                       <span>{{ $textAddto->server_name }}</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($textAddto->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $textAddto->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $textAddto->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($textAddto->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $textAddto->chronicle }}
                                    </button>
                                    @elseif($textAddto->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $textAddto->chronicle }}
                                    </button>
                                    @elseif($textAddto->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $textAddto->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $textAddto->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">{{ $textAddto->xpRate }}</button>
                                 </td>
                              </tr>
                              @endforeach
                              @endforeach
                              @endif
                              {{-- top server start from here --}}
                              @foreach($topservers as $topserver)
                              <tr>
                                 <td class="title">
                                    <div class="in arrow">
                                       <a href=' {{ route("serverdetail", [$topserver->id,  $topserver->server_name] ) }}'>
                                       <span>{{ $topserver->server_name }}</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    @if($topserver->serverplatform == 'L2j')
                                    <button class="btn-cus small l2off ">
                                    {{ $topserver->serverplatform}}
                                    </button>
                                    @else
                                    <button class="btn-cus small">
                                    {{ $topserver->serverplatform}}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="big">
                                    @if($topserver->chronicle == 'highfive')
                                    <button class="btn-cus big highfive">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @elseif($topserver->chronicle == 'interlude')
                                    <button class="btn-cus big interlude">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @elseif($topserver->chronicle == 'kamael')
                                    <button class="btn-cus big kamael">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @else
                                    <button class="btn-cus big garclaFinal">
                                    {{ $topserver->chronicle }}
                                    </button>
                                    @endif
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">{{ $topserver->xpRate }}</button>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="middle-content-inner-sides">
                     <div class="wrap">
                        <div class="heading">
                           <p>10 coming soon Servers</p>
                        </div>
                        <table class="table">
                           <tbody>
                              <tr class="green">
                                 <td class="title">
                                    <div class="in">
                                       <a href=" https://l2hotzone.com/serverinfo/21/server%204">
                                       <span>server 4</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    <button class="btn-cus small l2off ">
                                    L2j
                                    </button>
                                 </td>
                                 <td class="big">
                                    <button class="btn-cus big kamael">
                                    kamael
                                    </button>
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">122</button>
                                 </td>
                              </tr>
                              <tr class="green">
                                 <td class="title">
                                    <div class="in">
                                       <a href=" https://l2hotzone.com/serverinfo/20/server%203">
                                       <span>server 3</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    <button class="btn-cus small">
                                    L2off
                                    </button>
                                 </td>
                                 <td class="big">
                                    <button class="btn-cus big highfive">
                                    highfive
                                    </button>
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">11112</button>
                                 </td>
                              </tr>
                              <tr class="green">
                                 <td class="title">
                                    <div class="in">
                                       <a href=" https://l2hotzone.com/serverinfo/19/anuj_21">
                                       <span>anuj_21</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    <button class="btn-cus small">
                                    L2off
                                    </button>
                                 </td>
                                 <td class="big">
                                    <button class="btn-cus big garclaFinal">
                                    gracia-epilogue
                                    </button>
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">122</button>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="title">
                                    <div class="in arrow">
                                       <a href=" https://l2hotzone.com/serverinfo/39/Lulukos">
                                       <span>Lulukos</span>
                                       </a>
                                    </div>
                                 </td>
                                 <td class="small">
                                    <button class="btn-cus small l2off ">
                                    L2j
                                    </button>
                                 </td>
                                 <td class="big">
                                    <button class="btn-cus big interlude">
                                    interlude
                                    </button>
                                 </td>
                                 <td class="medium">
                                    <button class="btn-cus medium">10</button>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6" style="margin-top: 30px;">
                  <div class="middle-content-inner-sides" style="margin-right: 19px;">
                     <div class="wrap">
                        <a  href="{{ $imageBanner->where('id','=', 4)->first()->livebanner ? $imageBanner->where('id','=', 4)->first()->livebanner->website : '#' }}">
                        <img  class="main-bottom-left-image containimage" style="position: static;" src="{{ url('/images') }}/imagesAdd/{{ $imageBanner->where('id','=', 4)->first()->livebanner? $imageBanner->where('id','=', 4)->first()->livebanner->liveimages : 'no-image.png' }}" />
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6"  style="margin-top: 30px;">
                  <div class="middle-content-inner-sides usernews" >
                     <div class="wrap" style="margin: 0 26px 0px;">
                        <div class="">
                           <p class="hcolor">Latest User News</p>
                        </div>
                        <div class="news-wrap">
                           @forelse($latestNes as $latestNe=>$value)
                           <div class="news-wrap-content pt-3">
                              <!--  <h5><strong>{{ $value->subject }}</strong> {{ $value->subject }}</h5> -->
                              <p><strong><a href="{{url('forum/index.php?topic='.$value->id_msg)}}">{{$value->subject}}</a></strong></p>
                           </div>
                           @empty
                           <p>No any news!</p>
                           @endforelse
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- **************** MIDDLE CONTENT END ************* -->
      <!-- *******************     FOOTER START ********************* -->
      <div class="container-fluied">
         <div class="row footer" style="margin-right: 0px;margin-bottom: 0px; ">
            <div class="col-md-4 f1">
               <ul>
                  <li>
                     <h5><strong>HZ FORUM ACTIVITY</strong></h5>
                  </li>
                  <li><a href="">New Auto Donate Panel +...</a></li>
                  <li><a href="{{ route('addserver') }}">Any new server?</a></li>
                  <li><a href="">Auto Donate Panel Cheap...</a></li>
                  <li><a href="">[AVE] Professional Logo...</a></li>
                  <li><a href="">Auto Donate Panel Cheap...</a></li>
               </ul>
            </div>
            <div class="col-md-4 f1">
               <ul>
                  <li>
                     <h5><strong>HOPZONE ANNOUNCEMENT</strong></h5>
                  </li>
                  @foreach($posts as $key=>$value)
                  <li><a href="{{url('forum/index.php?topic='.$value->id_msg)}}">{{$value->subject}}</a></li>
                  @endforeach
               </ul>
            </div>
            <div class="col-md-4 f1">
               <ul>
                  <li>
                     <h5><strong>SOCIAL MEDIA</strong></h5>
                  </li>
                  <li><a href="#"><img class="socialimage" src="{{ url( 'images/facebook-logo-button.png' )}}" alt="Facebook"> Facebook</a></li>
                  <li><a href="#"><img class="socialimage" src="{{ url( 'images/twitter-logo-button.png' )}}" alt="Twitter"> Twitter</a></li>
                  <li><a href="#"><img class="socialimage" src="{{ url( 'images/google-plus.png' )}} " alt="Google"> Google</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="container-fluied">
      <div class="row" style="margin-right: 0px;">
      <div class="col-md-12 cfooter">
         <p>© Copyright 2019. All rights reserved.</p>
      </div>
      <!-- *********************** FOOTER END ******************************* -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script type="text/javascript">
         $(window).scroll(function(){
         $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
         });
         
         window.onscroll = function() {myFunction()};
         var header = document.getElementById("myheader");
         var sticky = header.offsetTop;
         function myFunction() 
         {
         if (window.pageYOffset > sticky)
         {
             header.classList.add("sticky");
         }
         else 
         {
             header.classList.remove("sticky");
           }
         }
         
         
      </script>
   </body>
</html>