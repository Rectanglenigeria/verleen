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
                                    <li class="breadcrumb-item"><a href="#">Messages</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h5 class="portlet-title text-dark text-uppercase">
                                            Total messages &nbsp; <label class="badge">{{$totalMessages}}</label>
                            </h5>

                            <br>


                            <!--data table-->

                             <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                   <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                @foreach($messages as $message)
                                                    <tr>
                                                        <!--<td></td>-->
                                                        <td>{{$message->created_at}}</td>
                                                        <td>{{$message->name}}</td>
                                                        <td>{{$message->email}}</td>
                                                        <td>

                                                            <td>{{$message->title}}</td>

                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary" href="{{route('admin.message.view',['id'=>$message->id])}}">View</a>
                                                              <a class="btn btn-sm btn-danger" href="{{route('admin.message.delete',['id'=>$message->id])}}">Delete</a>
                                                        </td>
                                                    </tr>

                                @endforeach
                          
                                </tbody>
                            </table>

                            <!--data table-->
                            
                            
                        </div>

                        {{$messages->links()}}
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
