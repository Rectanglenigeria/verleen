

@extends('layouts.dashboard')

@section('content')


   <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 col-12 align-self-center">
                        <h3 class="text-themecolor">News</h3>
                        <!--<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Dashboard</li>
                        </ol>-->
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->

             

               <div class="row">
                    <div class="col-md-2 col-sm-12 col-xs-12 col-lg-2"></div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    
                    <!--news-->
                     


                            
                                <div class="card card-inverse card-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">{{$news->created_at}}</h4></div>
                                    <div class="card-body">
                                        <h3>{{$news->title}}</h3>

                                        <p class="card-text"> {!!html_entity_decode($news->body)!!} </p>
                                        
                                    </div>
                                </div>
                            

                            

                           
                    </div>
                      <div class="col-md-2 col-sm-12 col-xs-12 col-lg-2"></div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    

     @endsection


