
@extends('layouts.error')

@section('content')







  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url({{asset('landing/assets/images/background/title-bg-05.jpg')}});">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>503!</h1>
        <h4 class="text-uppercase mt-30">Internal server error</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Contact Us Start ===-->
  <section class="white-bg">
    <div class="container">
    	
    	
    	<div class="row mt-100" style="margin-top: -180px;">

          <div class="col-md-3">
         
        </div>
        <!-- Map End -->

        <div class="col-md-6 contact-box">

        	<form name="contact-form" id="">
                                                
           
        		<center>
           <h4>To join verleen, click <a href="{{route('register')}}" style="color: blue;">here</a></h4>

            </center>
          </form>
        </div>
        <!-- Form End -->




          <div class="col-md-3">
         
        </div>
        
        
      
      </div>
      
    </div>
  </section>
  <!--=== Contact Us End ===-->





			@endsection

