

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
                        <h3 class="text-themecolor">Bonus</h3>
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
  @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif
                     

             

               <div class="row">
                    <div class="col-md-2 col-sm-12 col-xs-12 col-lg-2"></div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-themecolor"><i class="mdi mdi-credit-card"></i>Registration Bonus</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Date</th>
                                                <th class="text-primary">Name</th>
                                                 <th class="text-primary">Phone</th>
                                                 <th class="text-primary">Bonus</th>
                                                  <th class="text-primary">Status</th>
                                                  <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(!empty($bonus))
                                            <tr>
                                                <td>1</td>
                                                <td>{{$bonus->created_at}}</td>
                                                <td>{{Auth::user()->name}}</td>
                                                <td>{{Auth::user()->phone}}</td>
                                                <td>{{$bonus->amount}}</td>
                                                <td>
                                                    <!-- <span class="label label-table label-success">Matched</span>
                                                    <span class="label label-table label-info">Paid</span>-->

                                                    @if($bonus->has_received==0)
                                                    <span class="label label-table label-primary">Available</span>
                                                    @else
                                                     <span class="label label-table label-success">Received</span>
                                                    @endif

                                                </td>
                                                <td>

                                                     @if($bonus->has_received==0)
                                                    <a href="{{route('user.bonus.reg.cashout',['id'=>$bonus->id])}}" class="btn btn-sm btn-success">Cashout</a>
                                                    @endif
                                                     
                                                    
                                                </td>
                                            </tr>

                                            @endif

                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
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


