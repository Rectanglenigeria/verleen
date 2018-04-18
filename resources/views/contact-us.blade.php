 @extends('layouts.landing')

@section('content')

  
   <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/background/title-bg-05.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Contact Us</h1>
        <h4 class="text-uppercase mt-30">Just Keep in Touch With Us</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  <!--=== Contact Us Start ===-->
  <section class="white-bg">
    <div class="container">
      
      
      <div class="row mt-100" style="margin-top: -80px;">

          <div class="col-md-6">
          <div class="widget-contact">
            <h1>Email Address</h1>
            <p><a href="#">admin@verleen.online</a> </p>
          </div>
        </div>
        <!-- Map End -->


        <div class="col-md-6 contact-box">


           @if(Session::has('notification'))
                             <br>
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif


          <form name="contact-fo" id="" action="{{route('contact-us.submit')}}" method="POST">

             {{ csrf_field() }}

            <div class="messages"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required placeholder="Your Name" data-error="Your Name is Required" value="{{old('name')}}">
                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="sr-only" for="email">Your Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required data-error="Please Enter Valid Email" value="{{old('email')}}">
                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
              <label class="sr-only" for="message">Message</label>
              <textarea name="message" class="form-control" id="message" rows="7" placeholder="Your Message" required data-error="Please, Leave us a message">
                {{old('message')}}
              </textarea>

              @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
              <div class="help-block with-errors mt-10"></div>
            </div>
            <div class="text-right">
              <button type="submit" name="submit" class="btn btn-candy btn-md btn-circle btn-animated-none remove-margin"><span>Send Mail</span></button>
            </div>
          </form>
        </div>
        <!-- Form End -->
        
        
      
      </div>
      
    </div>
  </section>
  <!--=== Contact Us End ===-->


  @endsection