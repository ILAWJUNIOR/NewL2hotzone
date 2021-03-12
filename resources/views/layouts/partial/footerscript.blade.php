<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript">
 /*$(window).scroll(function(){
 $('nav').toggleClass('scrolled', $(this).scrollTop() > 40);
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
 }*/
 
$(window).scroll(function(){
  var sticky = $('.menu'),
      scroll = $(window).scrollTop();

  if (scroll >= 30) sticky.addClass('sticky');
  else sticky.removeClass('sticky');
});



// var stickyOffset = $('.menu').offset().top;

// $(window).scroll(function(){
//   var sticky = $('.menu'),
//       scroll = $(window).scrollTop();

//   if (scroll >= stickyOffset) sticky.addClass('sticky');
//   else sticky.removeClass('sticky');
// });
 
// jQuery(document).ready(function($){
//     var offset = $( "#myheader" ).offset();
//     checkOffset();

//     $(window).scroll(function() {
//         checkOffset();
//     });

//     function checkOffset() {
//         if ( $(document).scrollTop() > offset.top){
//             $('#myheader').addClass('sticky');
//         } else {
//             $('#myheader').removeClass('sticky');
//         } 
//     }

// });


</script>