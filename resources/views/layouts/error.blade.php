<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.incognitothemes.com/chaos/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Mar 2018 07:10:10 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Verleen</title>
<meta name="description" content="Verleen is a Peer-t-peer donation platform" />
<meta name="keywords" content="Peer-t-peer, ponzi scheem, ponzi, PH and GH, PH & GH, ethereum, Electroneum, Local currency" />
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="{{asset('landing/assets/css/master.css')}}">
<link rel="stylesheet" href="{{asset('landing/assets/css/responsive.css')}}">
</head>
<body>

<!--=== Loader Start ======-->
<div id="loader-overlay">
  <div class="loader">
    <div class="loader-inner"></div>
  </div>
</div>
<!--=== Loader End ======--> 

<!--=== Wrapper Start ===-->
<div class="wrapper"> 
  
  <!--=== Header Start ===-->
  <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full">
  	
    <div class="container"> 
      <!--=== Start Atribute Navigation ===-->
      <div class="attr-nav">
        <ul>
        	<li class="side-menu"><a href="#"><i class="mdi mdi-menu"></i></a></li>
        </ul>
      </div>
      <!--=== End Atribute Navigation ===--> 
      
      <!--=== Start Header Navigation ===-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="mdi mdi-menu"></i> </button>
        <div class="logo"> <a href="{{route('register')}}"> <img class="logo logo-display" src="{{asset('landing/assets/images/logo-white.png')}}" alt=""> <img class="logo logo-scrolled" src="{{asset('landing/assets/images/logo-white.png')}}" alt=""> </a> </div>
      </div>
      <!--=== End Header Navigation ===--> 
      
      <!--=== Collect the nav links, forms, and other content for toggling ===-->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
          <li > 
            <a href="{{route('register')}}" class="dropdown-toggle" data-toggle="dropdown">Home</a>
            
          </li>
          <li><a href="{{route('about-us')}}">About Us</a></li>
          <li> 
            <a href="{{route('hiw')}}" class="dropdown-toggle" data-toggle="dropdown">How it Work</a>
          </li>
          <li> 
            <a href="{{route('testimonies')}}" class="dropdown-toggle" data-toggle="dropdown">Testimonies</a>
          </li>
          
          <li><a href="{{route('contact-us')}}">Contact Us</a></li>

          <li>
            <a href="{{route('faqs')}}">Faqs</a>
          </li>
        </ul>
      </div>
      <!--=== /.navbar-collapse ===--> 
    </div>
    <!-- Start Side Menu -->
    <div class="side">
            <a href="#" class="close-side"><i class="mdi mdi-close"></i></a>
            <div class="widget">
                <h6 class="title">Side Links</h6>
                <ul class="link">
                    <li><a href="{{route('register')}}">Home</a></li>
                    <li><a href="{{route('hiw')}}">How it Works</a></li>
                    <li><a href="{{route('about-us')}}">About Us</a></li>
                    <li><a href="{{route('contact-us')}}">Contact</a></li>
                </ul>
            </div>
            <div class="widget">
                <h6 class="title">Other Links</h6>
                <ul class="link">
					<li><a href="{{route('testimonies')}}l">Testimonies</a></li>
					<li><a href="{{route('faqs')}}">Faqs</a></li>
                </ul>
            </div>
     </div>
     <!-- End Side Menu -->   
  </nav>
  <!--=== Header End ===--> 
  
 @yield('content')
  
  
  
  <!--=== Footer Start ===-->
  <footer class="footer">
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="widget widget-links">
              <h5 class="widget-title">About Us</h5>
              <div class="footer-about">
              	<p>VERLEEN is basically a peer to peer platform coupled with a great features which makes it sustainable and stand the test of time. </p>
              	<ul class="social-media">
				  <!--<li><a href="#" class="mdi mdi-facebook"></a></li>
				  <li><a href="#" class="mdi mdi-twitter"></a></li>
				  <li><a href="#" class="mdi mdi-pinterest"></a></li>
				  <li><a href="#" class="mdi mdi-dribbble"></a></li>-->
				</ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-2">
            <div class="widget widget-links">
              <h5 class="widget-title">Quick Links</h5>
              <ul>
                  <li><a href="{{route('register')}}">Home</a></li>
                <li><a href="{{route('about-us')}}">About Us</a></li>
                <li><a href="{{route('hiw')}}">How it Works</a></li>
                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
              </ul>
            </div>
          </div>


          <div class="col-sm-6 col-md-4">
            <div class="widget widget-links">
              <h5 class="widget-title">Others</h5>
              <ul>
                  <li><a href="{{route('testimonies')}}">Testimonies</a></li>
                <li><a href="{{route('faqs')}}">Faqs</a></li>
              </ul>
            </div>
          </div>


          <div class="col-sm-6 col-md-3">
            <div class="widget widget-text">
              <h5 class="widget-title">Contact Us</h5>
              <ul class="footer-contact">
              
                <li><i class="mdi mdi-email"></i> <p><a href="#">admin@verleen.online</a></p></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="footer-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copy-right">© <?php echo date('Y');?> Verleen</div>
          </div>
        </div>
        
      </div>
    </div>
  </footer>
  <!--=== Footer End ===--> 
  
</div>
<!--=== Wrapper End ===--> 

<!--=== Javascript Plugins ===--> 
<script src="{{asset('landing/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('landing/assets/js/smoothscroll.js')}}"></script>  
<script src="{{asset('landing/assets/js/plugins.js')}}"></script> 
<script src="{{asset('landing/assets/js/master.js')}}"></script>  
<!--=== Javascript Plugins End ===-->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ab4f7794b401e45400dfdea/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

<!-- Mirrored from www.incognitothemes.com/chaos/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Mar 2018 07:14:46 GMT -->
</html>
