
@extends('layouts.admin')

@section('content')


  <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Verleen</a></li>
                                    <li class="breadcrumb-item"><a href="#">News</a></li>
                                </ol>

                            </div>
                        </div>








                         <div class="row">

                            @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0">
                                {{$news->title}}
                            </h3>
                            <br>

                            <hp class="text-dark header-title m-t-0">
                                {{$news->sub_title}}
                            </hp>
                            <br>



                           <div class="card-body">
                                    <div class="form-body">
                                       
                                       
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{asset('uploads/'.$news->cover)}}" style="width: 100%;">
                                            </div>
                                        </div>

                                        <br>
                                        

                                         <div class="row">
                                            <div class="col-md-12 ">
                                                
                                                    
                                                   <div>
                                                    {!!html_entity_decode($news->body)!!}
                                                    
                                                   </div>
                                               
                                            </div>
                                        </div>

                                       <hr>



                                    

                                      

                                       <a href="{{route('admin.news.list')}}" class="btn btn-sm btn-primary">Back</a>

                                       
                                      
                                       


                                    </div>
                            
                            </div>
                            
                            
                        </div>
                    </div>
                   


                </div>



                       




                     

              

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection