<!DOCTYPE html>
<html lang="en">
<head>
  <base href="{{asset('')}}">
  <title>HTNSOFT | CORPORATION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="icon" href="{{('public/frontend/images/htn-logo.png')}}" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
  
  <link rel="stylesheet" href="{{('public/frontend/css/swiper.min.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/85188/raindrops.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{('public/frontend/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/raindrops.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{'public/frontend/css/owl.theme.default.min.css'}}">
  <link rel="stylesheet" href="{{('public/frontend/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{('public/frontend/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{('public/frontend/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{('public/frontend/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{('public/frontend/public/frontend/css/aos.css')}}">

  <link rel="stylesheet" href="{{('public/frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{('public/frontend/css/style-blog.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
 
  <!-- site content -->
  <div class="site-wrap">

   @include('client.layouts.header')

   @yield('content')


   @include('client.layouts.footer')
   
  </div> 
  <!-- end site content -->

  <a class="scrollToTop" title="Lên đầu trang" ><i style="color:#fff;" class="far fa-arrow-alt-circle-up"></i></a>
 
 
  <script src="{{('public/frontend/js/swiper.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery-ui.js')}}"></script>
  <script src="{{('public/frontend/js/popper.min.js')}}"></script>
  <script src="{{('public/frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{('public/frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{('public/frontend/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{('public/frontend/js/aos.js')}}"></script>
  <script src="{{('public/frontend/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{('public/frontend/js/jquery.sticky.js')}}"></script>
  <script src="{{('public/frontend/js/raindrops.js')}}"></script>

  <script src="{{('public/frontend/js/typed.js')}}"></script>
  <script>
    var typed = new Typed('.typed-words', {
      strings: ["Web Apps"," Mobile Apps"],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 4000,
      startDelay: 1000,
      loop: true,
      showCursor: true
    });

    jQuery(".rd").raindrops({
      color: "#0bd",
      canvasHeight: 250
    });

  </script>

  <script type="text/javascript">
   $(document).ready(function(){


     $(window).scroll(function(){
       if ($(this).scrollTop() > 600) {
         $('.scrollToTop').fadeIn();
       } else {
         $('.scrollToTop').fadeOut();
       }
     });

  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},300);
    return false;
  });
});
</script>
  
<script src="{{('public/frontend/js/main.js')}}"></script>
<script src="{{('public/frontend/scripts/zoom-image.js')}}"></script>
<script src="{{('public/frontend/scripts/main.js')}}"></script>

<style type="text/css">
    .scrollToTop {
      font-size: 30px;
      right: 20px;
      bottom: 10%;
      z-index: 999;
      text-decoration: none;
      position: fixed;
      display: none;
      background: #3b4741;
      cursor: pointer;
      border-radius: 5px;
      padding: 5px;
    }
</style>

</body>
</html>