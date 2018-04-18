

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
                        <h3 class="text-themecolor">Merge Details</h3>
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

              
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                   
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        
                    </div>
                    <div class="col-lg-6 col-xlg-6 col-md-6">

                         @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif



                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Details</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">



                                        <div class="row">
                                                <h3 class="col-md-12" style="color: blue;">Full Name</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->ph_user->name}}</strong>
                                                </div>
                                            </div>

                                            <hr>



                                            <div class="row">
                                                <h3 class="col-md-12" style="color: blue;">Email</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->ph_user->email}}</strong>
                                                </div>
                                            </div>

                                            <hr>



                                             <div class="row">
                                               <h3 class="col-md-12" style="color: blue;">Phone</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->ph_user->phone}}</strong>
                                                </div>
                                            </div>
                                            <hr>





                                             <legend>
                                                
                                             <small style="color: blue;">View teller/Hash</small> 
                                            </legend>


                                            @if($detail->ph_user->currency=='lc')

                                            @if($detail->has_uploaded_teller==1)

                                            <a href="{{asset('uploads/'.$detail->teller)}}" class="btn btn-sm btn-danger">View teller</a>

                                            @endif

                                            @else

                                            @if($detail->has_uploaded_teller==1)

                                            <p>{{$detail->payment_hash}}</p>

                                            @endif

                                            @endif

                                            <hr>

                                            <legend>
                                                
                                               <small style="color: blue;">Actions</small> 
                                            </legend>

                                            <a href="{{route('user.merge.insurance.flag', ['id'=>$detail->id])}}" class="btn btn-sm btn-danger">Fake</a>

                                             <a href="{{route('user.merge.insurance.extendtime', ['id'=>$detail->id])}}" class="btn btn-sm btn-primary">Extend time</a>



                                              <a href="{{route('user.merge.insurance.confirm', ['id'=>$detail->id])}}" class="btn btn-sm btn-primary">Confirm</a>



                                        




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-3">
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


