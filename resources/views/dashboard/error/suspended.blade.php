

@extends('layouts.dashboard')

@section('content')


        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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

                    <div class="col-md-12 col-12">
                         <label>Referral link</label>
                         <div class="alert alert-success" role="alert">
                            {{Auth::user()->referal_link}}
                         </div>
                     
                    </div>
                    <br><br>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-1 col-xlg-3 col-md-5 col-sm-1 col-xs-1">
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{asset('dashboard/assets/images/avatar.jpg')}}" class="img-circle" width="150">
                                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                </center>
                            </div>
                            <span>
                                <hr> </span>
                            <div class="card-body"> <small class="text-muted">Suspesion Status</small>
                                
                                <h6><?php if(isset(Auth::user()->name)){echo Auth::user()->email;} ?></h6> 
                                <h6> <?php if(isset(Auth::user()->phone)){echo Auth::user()->phone;} ?></h6>
                                <small class="text-muted p-t-30 db">Bank Details</small>
                                <h6><?php if(isset(Auth::user()->bank)){echo Auth::user()->bank;} ?></h6>
                                <h6><?php if(isset(Auth::user()->account_no)){echo Auth::user()->account_no;} ?></h6> 
                                <h6><?php if(isset(Auth::user()->account_name)){echo Auth::user()->account_name;} ?></h6>
                               
                               
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-6 col-xlg-9 col-md-7 col-sm-5, col-xs-5">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Suspension status</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                 <div class="alert alert-success" role="alert">
                            You've been suspended from the system. Contact the admin.
                         </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xlg-3 col-md-5 col-xs-1 col-sm-1">
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
           
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

                        @endsection


