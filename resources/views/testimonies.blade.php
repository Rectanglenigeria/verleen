 @extends('layouts.landing')

@section('content')

  
  <!--=== page-title-section start ===-->
  <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/background/title-bg-01.jpg);">
  <div class="parallax-overlay"></div>
    <div class="container">
      <div class="page-title text-center white-color">
        <h1>Testimonies</h1>
        <h4 class="text-uppercase mt-30">Verleen is making people smile</h4>
      </div>
    </div>
  </section>
  <!--=== page-title-section end ===--> 
  
  
   <!--=== Testimonails Start ===-->
  <section class="pt-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12 heading-style-one text-center">
          
        </div>
      </div>
      <div class="row mt-50">
        
          <div class="slick testimonial testimonial-three"> 


            @foreach($testimonies as $testimony)
            
        <!--=== Slide ===-->
        <div class="testimonial-item">
            <div class="col-md-12">
            <div class="testimonial-content"> 
              <div class="testimonial-content-in radius-50">
              <div class="img"><img class="img-responsive" src="{{asset('landing/assets/images/team/avatar-4.jpg')}}" alt="avatar-1"/>
              </div>
              <h5>{{$testimony->name}}</h5>
              <h6>{{$testimony->created_at}}</h6>
              <p>{{$testimony->body}}</p>
             </div>
            </div>
          </div>
        </div>

       <!--end slide-->

        @endforeach
             
            
          </div>
        
      </div>
    </div>
  </section>
  <!--=== Testimonails End ===-->




  @endsection