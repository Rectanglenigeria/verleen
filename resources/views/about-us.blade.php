 @extends('layouts.landing')

@section('content')

 <!--=== Hero Slider Start ===-->
  
    <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/background/title-bg-01.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>About Us</h1>
        <h4 class="text-uppercase mt-30">An innovative peer-to-peer platform</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Welcome Start ===-->
  <section class="white-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-6 heading-style-one box-title-three text-center col-md-offset-3">
          <h6 class="red-color text-uppercase">About Verleen</h6>
          
        <div class="thin-border-purple thin-borders margin-auto mt-40 mb-40"></div>
        <p>VERLEEN is basically a peer to peer platform coupled with a great features which makes it sustainable and stand the test of time. Verleen is founded by a great team which views are not contrary to financial independence of individuals in the world at large. .</p>
        </div>
      </div>
    </div>
  </section>
  <!--=== Welcome End ===--> 


  
  
  <!--=== Feature Start ===-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="feature-box text-center mb-20">
            <i class="bulb-shadow-icon img-icon big-icon"></i>
            <h3>AIM</h3>
            <p>To build stable streams of income and sustainable financial planning for all.</p>
          
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-box text-center mb-20">
            <i class="diamond-shadow-icon img-icon big-icon"></i>
            <h3>Mission</h3>
            <p>To use investment methodology based on peer-to-peer to proliferate daily income of average individual creating stable financial environment</p>
          
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-20">
          <div class="feature-box text-center">
            <i class="magic-shadow-icon img-icon big-icon"></i>
            <h3>Vision</h3>
            <p>To create globally, an atmosphere where people have maximum capabilities of  living the runtimes they wish without having to rely on anyone else for cash.</p>
          
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-box text-center">
            <i class="connect-shadow-icon img-icon big-icon"></i>
            <h3>Core Values</h3>
            <p>Sustainability, consitency, user satisfaction and security.</p>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=== Feature End ===-->


  @endsection