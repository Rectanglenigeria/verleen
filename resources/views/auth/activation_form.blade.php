
@extends('layouts.landing')

@section('content')







  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url({{asset('landing/assets/images/background/title-bg-05.jpg')}});">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Hope not a robot</h1>
        <h4 class="text-uppercase mt-30">A code has been sent to your phone and email. Enter code below</h4>
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


        	<form name="contact-form" id="" action="{{ route('activate.user.submit') }}" method="POST">
                                                 {{ csrf_field() }}
            <div class="messages"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                  <label class="sr-only" for="name">Activation code</label>
                  <input type="hidden" name="user_id" value="{{$user_id}}">
                  <input type="number" name="code" class="form-control" id="code" value="{{old('code')}}" required placeholder="E.g. 4543" data-error="Code is required">
                   @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                  <div class="help-block with-errors mt-10"></div>
                </div>
              </div>
             
            </div>

            
            
            <div class="text-right">
              <button type="submit" class="btn btn-candy btn-md btn-circle" value="verify"><span>Verify me</span></button>
              <a href="{{route('activate.user.reverify', ['id'=>$user_id])}}" class="btn btn-sm btn-default"> Resend code</a>
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

