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
                                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h5 class="portlet-title text-dark text-uppercase">
                                            Total users &nbsp; <label class="badge">{{$totalUsers}}</label>
                            </h5>

                            <br>


                            <!--data table-->

                             <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
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
                          
                                </tbody>
                            </table>

                            <!--data table-->
                            
                            
                        </div>

                        {{$users->links()}}
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
