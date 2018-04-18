@extends('layouts.admin')

@section('content')


  <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">View Contact Message</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">RectangleInvest</a></li>
                                    <li class="breadcrumb-item"><a href="#">Contact Message</a></li>
                                    <li class="breadcrumb-item"><a href="#">View</a></li>

                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0">Contact Messages</h3>
                            <br>


                           <div class="card-body">
                                    <div class="form-body">
                                       
                                       
                                       
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Sender's name : </label>
                                                    <span>{{$message->name}}</span>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Sender's email : </label>
                                                    <span>{{$message->email}}</span>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Title : </label>
                                                    <span>
                                                        {{$message->title}}
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Mesaage : </label>
                                                    <span>
                                                        {{$message->body}}
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                       <hr>
                                       <a href="mailto:{{$message->email}}" class="btn btn-sm btn-primary">Reply</a>
                                       <a href="{{route('admin.message')}}" class="btn btn-sm btn-primary">Back</a>

                                       
                                      
                                       


                                    </div>
                            
                            </div>
                            
                            
                        </div>
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection
