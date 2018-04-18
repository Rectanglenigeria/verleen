@extends('layouts.admin')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{Auth::guard('admin')->user()->email}}as admin!
                </div>
            </div>
        </div>
    </div>
</div>-->




                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Verleen</a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                </ol>

                            </div>
                        </div>



                        <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-primary"></i>
                            <p class="m-0 text-dark counter font-600">50,000,00</p>
                            <div class="text-muted m-t-5 h6">Investment</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-pink"></i>
                            <p class="m-0 text-dark counter font-600">20,000,000</p>
                            <div class="text-muted m-t-5 h6">Total Profit</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-attach-money text-info"></i>
                            <p class="m-0 text-dark counter font-600">20,000,000</p>
                            <div class="text-muted m-t-5 h6">Total Paid-Out</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            <i class="md md-account-child text-custom"></i>
                            <p class="m-0 text-dark counter font-600">10,879</p>
                            <div class="text-muted m-t-5 h6">Investors</div>
                        </div>
                    </div>
                </div>









                <div class="row">

                            <div class="col-12">

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            Latest Users &nbsp; <label class="badge">500</label>
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet2" class="panel-collapse collapse show" style="">
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <!--<th>S/N</th>-->
                                                        <th>Date</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>




                                                    @foreach($users as $user)

                                                        <?php

                                    if($user->id == 3000){
                                        continue;
                                    }
                                 ?>


                                                    
                                                    <tr>
                                                        <!--<td></td>-->
                                                        <td>{{$user->created_at}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->phone}}</td>
                                                        <td>

                                                            @if($user->has_verified==1 && $user->has_blocked==0 && $user->has_suspended==0)
                                                            <label class="label label-info">Active</label>
                                                            @else
                                                            <label class="label label-danger">Not active</label>
                                                            @endif


                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="{{route('admin.user.update',['id'=>$user->id])}}">Update</a>

                                                           @if($user->has_blocked==0) 
                                                            <a class="btn btn-sm btn-danger" href="{{route('admin.user.block',['id'=>$user->id])}}">Block</a>
                                                        @else

                                                           
                                                             <a class="btn btn-sm btn-primary" href="{{route('admin.user.unblock',['id'=>$user->id])}}">Unblock</a>
                                                    @endif

                                                     @if($user->has_suspended==0) 
                                                            <a class="btn btn-sm btn-danger" href="{{route('admin.user.suspend',['id'=>$user->id])}}">Suspend</a>
                                                        @else

                                                           
                                                             <a class="btn btn-sm btn-primary" href="{{route('admin.user.unsuspend',['id'=>$user->id])}}">Unsuspend</a>
                                                    @endif

                                                              <a class="btn btn-sm btn-danger" href="{{route('admin.user.delete',['id'=>$user->id])}}">Delete</a>
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                    <!--<tr>
                                                        <td>1</td>
                                                        <td>01/01/2015</td>
                                                        <td>tunde</td>
                                                        <td>+234812345434</td>
                                                        <td>
                                                            <label class="label label-info">Active</label>
                                                        </td>
                                                        <td>
                                                            <a href="view_user.html" class="btn btn-sm btn-primary">view</a>
                                                            <a class="btn btn-sm btn-danger">Block</a>
                                                             
                                                              <a class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>-->


                                                   <!-- <tr>
                                                        <td>1</td>
                                                        <td>01/01/2015</td>
                                                        <td>tunde</td>
                                                        <td>+234812345434</td>
                                                        <td>
                                                            <label class="label label-info">Blocked</label>
                                                        </td>
                                                        <td>
                                                            <a href="view_user.html" class="btn btn-sm btn-primary">view</a>
                                                           
                                                             <a class="btn btn-sm btn-success">Unblock</a>
                                                              <a class="btn btn-sm btn-danger">Delete</a>
                                                        </td>
                                                    </tr>-->

                                                   

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        

                    </div> <!-- container -->

                </div> <!-- content -->

               








@endsection
