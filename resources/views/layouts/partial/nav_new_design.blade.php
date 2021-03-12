<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>

li.nav-item ul {
    position: absolute;
    z-index: 99;
}
.inner-image
{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 85px;
    width: 100%;
    padding: 0px 10px;
    
}
.main-bottom-left-image
{
    position: absolute;
    
    height: 250px;
    width: 300px;
}
.logo-image
{
    position: absolute;
    top: 28%;
    left: 0%;
}
.ss::-webkit-scrollbar { width: 0 !important };
.ss { overflow: -moz-scrollbars-none; };
.ss { -ms-overflow-style: none; };

@media (min-width: 320px) and (max-width: 480px) {
    .header-top {
        display: none;
    }


}
.navbtn
{
  display: flow-root
}
</style>
<div class="header" >
    <header>
        <div class="header-top">
           <div class="container-var">
                <div class="wrap pt-4 pb-3">
                    <div class="row">

                        <div class="col-md-1">
                            <div class="wrap-logo h-100">
                                <a href=" {{ URL::to('/') }} "><img class="logo-image" src="{{url('images/logo.png')}}" alt="craftnotion"></a>
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="wrap-ads h-100">
                              <a  href="{{ $imageBanner->where('id','=', 12)->first()->livebanner ? $imageBanner->where('id','=', 12)->first()->livebanner->website : '#' }}">
                              <img class="inner-image" src="{{ url('/images') }}/imagesAdd/b1.gif" />
                              </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="wrap-contact h-100">
                              <a  href="{{ $imageBanner->where('id','=', 13)->first()->livebanner ? $imageBanner->where('id','=', 13)->first()->livebanner->website : '#' }}">
                                <img class="inner-image" src="{{ url('/images') }}/imagesAdd/b2.jpg" />
                              </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="wrap-contact h-100">
                              <a  href="{{ $imageBanner->where('id','=', 14)->first()->livebanner ? $imageBanner->where('id','=', 14)->first()->livebanner->website : '#' }}">
                                 <img class="inner-image" src="{{ url('/images') }}/imagesAdd/b1.gif" />
                               </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="wrap-contact h-100">
                              <a  href="{{ $imageBanner->where('id','=', 15)->first()->livebanner ? $imageBanner->where('id','=', 15)->first()->livebanner->website : '#' }}">
                                <img class="inner-image" src="{{ url('/images') }}/imagesAdd/b2.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="wrap-contact h-100">
                              <a  href="{{ $imageBanner->where('id','=', 29)->first()->livebanner ? $imageBanner->where('id','=', 29)->first()->livebanner->website : '#' }}">
                                <img class="inner-image" src="{{ url('/images') }}/imagesAdd/b1.gif " />
                                </a>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="wrap-panel text-center h-100">
                             
                                @if(Auth::guest())
                                <div class="sign">
                                    <img src="/images/loginregister.png" alt="Login">
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
                                <div class="ip mt-1">
                                    <p>Your IP: <span> {{request()->ip()}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          

<div class="row">
  <div class="col-md-12 col-sm-12">
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbtn" >
      
          <button class="navbar-toggler" style="float: right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="header-bottom collapse navbar-collapse" id="navbarNav"  style="z-index: 1;padding: 0px">
            <div class="container-var">
                <ul class="nav nav-pills nav-fill navbar-nav">
                    <li class="nav-item">
                        <a style="padding: 50px" class="nav-link py-3 text-white" href="{{ url('alllineage2servers') }}">All lineage2 servers</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 50px" class="nav-link py-3 text-white" href="{{ url('premiumservers') }}">premium servers</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 50px" class="nav-link py-3 text-white" href="{{ url('newservers') }}">new servers</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 50px" class="nav-link py-3 text-white" href="{{ url('searchservers') }}">search a servers</a>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 50px" class="nav-link py-3 text-white" href="{{ url('addserver') }}">add new servers</a>
                        <ul>
                       <!--  @if(!Auth::guest())
                            <li><a href="{{ route('userseverlist') }}" >server list </a></li>
                        @endif -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a style="padding: 50px" class="nav-link py-3 text-white" href="{{ url('advertising') }}">Advertising</a>
                    </li>
                </ul>
            </div>
        </div>     
       </nav>
     </div>
</div>
    </header>
</div>
