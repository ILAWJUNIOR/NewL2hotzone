<div class="container-fluied">
         <div class="row footer" style="margin-right: 0px;margin-bottom: 0px;position: relative;">
            
            <div class="col-md-2 f1">
                <h5><strong>{{ trans('lang.social_media') }}</strong></h5>
            </div>
            <div class="col-md-2 f1" style="font-size: 17px;">
                <a href="#"><img class="socialimage" src="{{ url( 'images/facebook-logo-button.png' )}}" alt="Facebook">{{ trans('lang.facebook') }} </a>
            </div>
            <div class="col-md-2 f1" style="font-size: 17px;">
                <a href="#"><img class="socialimage" src="{{ url( 'images/twitter-logo-button.png' )}}" alt="Twitter">{{ trans('lang.twitter') }} </a>
            </div>
            <div class="col-md-2 f1" style="font-size: 17px;">
                <a href="#"><img class="socialimage" src="{{ url( 'images/google-plus.png' )}} " alt="Google">{{ trans('lang.google') }} </a>
            </div>
            <div class="col-md-2 f1" style="font-size: 17px; text-align: right;">
                <strong>Language </strong>
            </div>
            <div class="col-md-2 f1" style="font-size: 17px;">
                <form action="{{ action('Viewservers@changeLang') }}" method="post">

                         

                           <select name="lang" class="lang_drop">


                              <option  @if(Session::has("language_key") && Session::get('language_key')=="en") selected @endif value="en">English</option>
                              <option  @if(Session::has('language_key') && Session::get('language_key')=='el') selected @endif value="el">Greek</option>
                              <option  @if(Session::has('language_key') && Session::get('language_key')=='ru') selected @endif value="ru">Russia</option>
                              <option  @if(Session::has('language_key') && Session::get('language_key')=='es') selected @endif value="es">Spanish</option>
                              <option  @if(Session::has('language_key') && Session::get('language_key')=='pt') selected @endif value="pt">Portugease</option>
                              <option  @if(Session::has('language_key') && Session::get('language_key')=='tr') selected @endif value="tr">Turkish</option>
                           </select>
                             @csrf
                           <button type="submit" class="btn btn-sm btn_lang" style="margin-top:-6px !important">Go !</button>
                           
                        </form>
            </div>  
               
                  </div>

                  </li>
               </ul>
                
             </div>
         </div>
         <div class="row" style="margin-right: 0px;">
      <div class="col-md-12 cfooter">
         <p>© {{ trans('lang.copyright') }}</p>
      </div> 
   </div>
      </div>
      
   <style>
       .btn_lang
         {
               background-color: #17a2b8;
    color: white;
    margin-top: -12px;
    height: 24px;
    padding: 0pc;
    margin-left: 3px;
    width: 40px;
    font-weight: bolder;
    border: 2px solid white;
    box-shadow: 1px 2px 4px 0px black !important;

         }

         .lang_drop
         {
    font-size: 15px;
    color: #17a2b8;
    padding: 1px;
}
.f1{
  padding: 7px 20px;
}
.socialimage{
  font-size: 17px;
}
   </style>






      