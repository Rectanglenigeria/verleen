
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
                                    <li class="breadcrumb-item"><a href="#">Phs</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">


                        	@if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h5 class="portlet-title text-dark text-uppercase">
                                           {{$filterBy}} Phs 
                            </h5>

                            <br>


                            <!--data table-->

                             <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                   <th>Date</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Growth</th>
                                    <th>Day</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                @foreach($phs as $ph)

                                <?php 
                                	if($ph->user->currency != $filterBy){
                                		continue;
                                	}

                                 ?>


                                  <?php
                                    if($ph->user->id == 3000){
                                        continue;
                                    }
                                 ?>
                                                    <tr>
                                                        <!--<td></td>-->
                                                        <td>{{$ph->created_at}}</td>
                                                        <td>{{$ph->user->name}}</td>
                                                        <td>{{number_format($ph->amount)}}</td>
                                                        <td>{{number_format($ph->growth)}}</td>
                                                        <td>{{number_format($ph->period)}}</td>
                                                        <td>
                                                        	<label class="label label-sm label-info">{{'pending'}}</label>
                                                        </td>
                                                        <td>

                                                            @if(!isset($ph->insurance_merge->id))
                                                        	<a class="btn btn-xs btn-success" href="{{route('admin.merge.downpayment',['id'=>$ph->id])}}">Merge downpayment</a>
                                                            <hr>
                                                            @endif


                                                            <a class="btn btn-sm btn-primary" href="{{route('admin.ph.view',['id'=>$ph->id])}}">View</a>
                                                              <!--<a class="btn btn-sm btn-danger" href="{{route('admin.ph.delete',['id'=>$ph->id])}}">Delete</a>-->
                                                        </td>
                                                    </tr>

                                @endforeach
                          
                                </tbody>
                            </table>

                            <!--data table-->
                            
                            
                        </div>

                        {{$phs->links()}}
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
