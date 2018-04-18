 @extends('layouts.landing')

@section('content')

 <!--=== Hero Slider Start ===-->
  
  <section class=""  style="background:url({{asset('landing/assets/images/slides/home-bg-1.jpg')}});">
            <div class="container">
             <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">

                   <div class="white-color hidden-sm hidden-xs">
                   
                    <h1 class="upper-case font-600">VERLEEN</h1>
                    <p class="upper-case">
                      <span class="font-600" style="line-height: 30px;">
                      A peer-to-peer platform where participants can provide help in local currency, etherrum and electroleum to get 30, 50 and 60% ROI respectively.
                    </span>
                  </p>
                    <p class="text-left mt-30"><a class="btn btn-gradient btn-md" href="{{route('login')}}">Login</a> </p>
                   </div>

                   <div class="white-color hidden-md hidden-lg" style="text-align: center;">
                   
                    <h1 class="upper-case font-600">VERLEEN</h1>
                    <p class="upper-case">
                      <span class="font-1000">
                      A peer-to-peer platform where participants can provide help in local currency, etherrum and electroleum to get 30, 50 and 60% ROI respectively.
                    </span>
                  </p>
                    <p class="mt-30" style="text-align: center;"><a class="btn btn-gradient btn-md" href="{{route('login')}}">Login</a> </p>
                   </div>


                   

                </div>




                <!--registartion form-->

                <div class="col-md-6 col-sm-12 col-xs-12 contact-box">

                 
          <form name="contact-form" id="" action="{{ route('register') }}" method="POST" novalidate="true">
             {{ csrf_field() }}
            <div class="messages"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Your Phone No</label>
                  <input name="phone" class="form-control" id="phone" required="" placeholder="Your Phone No" data-error="Your Phone Number is required" type="number" value="{{ old('phone') }}" autofocus>
                  @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="sr-only" for="email">Your Email</label>
                  <input name="email" class="form-control" id="email" placeholder="Your Email" required="" data-error="Please Enter Valid Email" type="email" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Your Password</label>
                  <input name="password" class="form-control" id="password" required="" placeholder="Your Password" data-error="Your Password is required" type="password" value="{{old('password')}}">
                  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <label class="sr-only" for="email">Confirm Password</label>
                  <input name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm Password" required="" data-error="This field is required" type="password" >
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
            </div>

            @if(isset($referal))

             <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('referal_name') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Referal</label>
                  <input type="hidden" name="referal_phone" value="{{$referal->phone}}">
                  <input type="hidden" name="referal_name" value="{{$referal->name}}">
                  <input  disabled="disabled" class="form-control"  type="text" value="Referal : {{$referal->name}}">
                  @if ($errors->has('referal_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referal_name') }}</strong>
                                    </span>
                                @endif

                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
            </div>

            @endif

            <div class="form-group">
             <p> * By creating an account, you accept our <a class="red-color" href="{{route('terms')}}">terms and conditions</a>.</p>
            </div>

            <div class="text-right">
              <button type="submit" name="submit" class="btn btn-candy btn-md btn-circle btn-animated-none remove-margin disabled"><span>Create Account</span></button>
            </div>


          </form>
                  
                </div>



                 <!--registartion form-->

              </div>
            </div>
         
  
     
  
  </section>
  
  <!--=== Hero Slider End ===--> 
  
  <!--=== Welcome Start ===-->
  <section>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6">
  				<div class="intro-img"><img class="img-responsive" src="{{asset('landing/assets/images/intro-img.png')}}" alt=""/></div>
  			</div>
  			<div class="col-md-6 heading-style-one">
  				<hr class="gradient-bg left-line">
  				<h2><span class="font-700">Who We Are</span></h2>
  				<p class="mt-30">
            VERLEEN is basically a peer to peer platform coupled with a great features which makes it sustainable and stand the test of time. Verleen is founded by a great team which views are not contrary to financial independence of individuals in the world at large.
            </p>
  				
  			</div>
  		</div>
  	</div>
  </section>
  <!--=== Welcome End ===--> 

  
  <!--=== Counter Start ===-->
 <!-- <section class="parallax-bg fixed-bg pt-70 pb-70" data-stellar-background-ratio="0.2" style="background-image: url(assets/images/background/pattern-parallax.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="counter-wrap">
            <h2><span class="counter">114</span></h2>
            <h3>Our Projects</h3>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="counter-wrap">
            <h2><span class="counter">350</span></h2>
            <h3>Happy Clients</h3>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="counter-wrap">
            <h2><span class="counter">574</span></h2>
            <h3>Cups of Coffee</h3>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="counter-wrap">
            <h2><span class="counter">1000</span></h2>
            <h3>Facebook Likes</h3>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!--=== Counter End ===--> 
  
  
  

  
  <!--=== Our Services Start ===-->
  <section>
     <div class="container">
      <div class="row">
        <div class="col-md-12 heading-style-two text-center">
          <h2 class="font-700"><span>How It Works</span></h2>
        </div>
      </div>
      <div class="row mt-50">
        <div class="col-md-4 main-service-box text-center col-sm-6">
           <i class="mdi mdi-tune default-color"></i>
          <h4>Support</h4>
          <p>VERLEEN support its peer to peer platform with the donation of  LOCAL CURRENCY, ETHERUM, ELECTRONEUM</p>
        </div>
        <div class="col-md-4 main-service-box text-center col-sm-6">
          <i class="mdi mdi-tune default-color"></i>
          <h4>Returns</h4>
          <p>It gives its return of invest of 30% on LOCAL CURRENCY, 50% on ETHERUM and 60% on ELECTRONEUM</p>
        </div>
        <div class="col-md-4 main-service-box text-center col-sm-6">
          <i class="mdi mdi-tune default-color"></i>
          <h4>Insurance</h4>
          <p>Down payment of 10% will be matched after 48hours of pledge which will take effect after 30days of launch and remaining 90% takes effect after.</p>
        </div>
        <div class="col-md-4 main-service-box text-center col-sm-6">
          <i class="mdi mdi-trophy default-color"></i>
          <h4>LOCAL CURRENCY  Registration bonus</h4>
          <p>
10k - 19k = 2k<br>
20k - 99k = 3k<br>
100k - 149k =5k<br>
150k - 500k = 10k</p>
        </div>
        <div class="col-md-4 main-service-box text-center col-sm-6">
        <i class="mdi mdi-trophy default-color"></i>
          <h4>ETHERUM Registration bonus</h4>
          <p>
️0.2 - 0.39 = 0.002<br>
0.4- 0.59 = 0.003<br>
️0.6 -0.79 = 0.007<br>
️0.8 - 1.0 = 0.01<br>

</p>
        </div>
        <div class="col-md-4 main-service-box text-center col-sm-6">
          <i class="mdi mdi-trophy default-color"></i>
          <h4>ELECTRONEUM Registration bonus</h4>
          <p>
10 - 100 = 1.0<br>
️101 - 300 = 2.50<br>
301 - 700 = 5.0<br>
️701 - 1000 = 10</p>
        </div>


        

      </div>
    </div>
  </section>
  <!--=== Our Services End ===-->
  

  
  
   
  
  <!--=== Testimonails Start ===-->
  <section class="parallax-bg fixed-bg" data-stellar-background-ratio="0.2" style="background-image: url({{asset('landing/assets/images/background/pattern-parallax.jpg')}});">
    <div class="container">
      <div class="row">
  			<div class="col-md-12 heading-style-two text-center">
  				<h2 class="font-700"><span>Our Testimonials</span></h2>
  			</div>
  		</div>
      <div class="row mt-60">
        
          <div class="slick testimonial"> 

            @foreach($testimonies as $testimony)
           	
				<!--=== Slide ===-->
				<div class="testimonial-item">
			  		<div class="col-md-12">
					  <div class="testimonial-content"> 
					  	<div class="testimonial-content-in">
						  <div class="img">
						  <img class="img-responsive img-circle" src="{{asset('landing/assets/images/team/avatar-4.jpg')}}" alt="avatar-4"/>
						  </div>
							<h5>{{$testimony->name}}</h5>
							<h6>{{$testimony->created_at}}</h6>
							<p>{{$testimony->body}}</p>
						 </div>
					  </div>
				  </div>
				</div>

        @endforeach
            	
            
          </div>
        
      </div>
    </div>
  </section>
  <!--=== Testimonails End ===--> 


  @endsection