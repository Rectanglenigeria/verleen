
@extends('layouts.landing')

@section('content')







  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url({{asset('landing/assets/images/background/title-bg-05.jpg')}});">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Login</h1>
        <h4 class="text-uppercase mt-30">With your email and password</h4>
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

        	  @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif


        	<form name="contact-form" id="" action="{{ route('login') }}" method="POST">
                                                 {{ csrf_field() }}
            <div class="messages"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Email</label>
                  <input placeholder="Email" type="email" name="email" class="form-control" id="email" value="{{old('email')}}" required  data-error="Email is required">
                   @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>


              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Password</label>
                  <input type="password" name="password" class="form-control" id="password"  required placeholder="Password" data-error="Password is required">
                   @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>


              <div class="col-md-12 col-sm-12">
                 <label>
                   <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
              </div>
             




            </div>

            
            
            <div class="text-right">
              <button type="submit" class="btn btn-candy btn-md btn-circle"><span>Login</span></button>
              <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
            </div>
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

