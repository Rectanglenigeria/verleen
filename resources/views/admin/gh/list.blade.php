
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
                                    <li class="breadcrumb-item"><a href="#">Ghs</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h5 class="portlet-title text-dark text-uppercase">
                                           {{$filterBy}} Ghs 
                            </h5>

                            <br>


                            <!--data table-->

                             <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                   <th>Date</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Matched</th>
                                    <th>Remainance</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                @foreach($ghs as $gh)

                                <?php 
                                	if($gh->user->currency != $filterBy){
                                		continue;
                                	}

                                 ?>

                                 <?php
                                    if($gh->user->id == 3000){
                                        continue;
                                    }
                                 ?>
                                                    <tr>
                                                        <!--<td></td>-->
                                                        <td>{{$gh->created_at}}</td>
                                                        <td>{{$gh->user->name}}</td>
                                                        <td>{{number_format($gh->amount)}}</td>
                                                         <td>{{number_format($gh->amount-$gh->remainance)}}</td>
                                                          <td>{{number_format($gh->remainance)}}</td>
                                                        <td>
                                                        	<label class="label label-sm label-info">
                                                             
                                                                @if($gh->remainance==0)
                                                                    {{'completely merged'}}

                                                                @else
                                                                {{'partialy merged'}}
                                                                @endif

                                                            </label>
                                                        </td>
                                                        <td>
                                                            @if($gh->remainance > 0)
                                                             <a class="btn btn-xs btn-success" href="{{route('admin.merge.remaining',['id'=>$gh->id])}}">Merge remaining</a>

                                                             @endif

                                                            

                                                             <hr>
                                                            <a class="btn btn-sm btn-primary" href="{{route('admin.gh.view',['id'=>$gh->id])}}">View</a>
                                                              <!--<a class="btn btn-sm btn-danger" href="{{route('admin.gh.delete',['id'=>$gh->id])}}">Delete</a>-->
                                                        </td>
                                                    </tr>

                                @endforeach
                          
                                </tbody>
                            </table>

                            <!--data table-->
                            
                            
                        </div>

                        {{$ghs->links()}}
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
