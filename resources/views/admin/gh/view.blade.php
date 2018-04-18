
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
                                    <li class="breadcrumb-item"><a href="#">View GH</a></li>
                                </ol>

                            </div>
                        </div>









                <div class="row">

                            <div class="col-12">

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            View GH
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


















                                            
                                <form action="" method="" role="form">

                                

                                    <legend>GH details</legend>

                                    <div class="form-body">




                                         


                                          <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Currency</label>

                                                <input disabled="disabled" class="form-control"  
                                            value="{{$gh->user->currency}}">

                                                </div>

                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Amount</label>

                                                <input disabled="disabled"  class="form-control"  
                                            value="{{number_format($gh->amount)}}">

                                                </div>

                                            </div>
                                        </div>




                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Name</label>

                                                <input disabled="disabled"  class="form-control"  
                                            value="{{$gh->user->name}}">

                                                </div>

                                            </div>
                                        </div>



                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Phone</label>

                                                <input disabled="disabled"  class="form-control"  
                                            value="{{$gh->user->phone}}">

                                                </div>

                                            </div>
                                        </div>



                                        @if($gh->user->currency=='lc')

                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Account Name</label>

                                                <input disabled="disabled"  class="form-control"  
                                            value="{{$gh->user->account_name}}">

                                                </div>

                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Account No</label>

                                                <input disabled="disabled"  class="form-control"  
                                            value="{{$gh->user->account_no}}">

                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Bank</label>

                                                <input disabled="disabled" class="form-control"  
                                            value="{{$gh->user->bank}}">

                                                </div>

                                            </div>
                                        </div>

                                        @else


                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Wallet Name</label>

                                                <input disabled="disabled" class="form-control"  
                                            value="{{$gh->user->wallet_name}}">

                                                </div>

                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Gher's Wallet Address</label>

                                                <input disabled="disabled" class="form-control"  
                                            value="{{$gh->user->wallet_address}}">

                                                </div>

                                            </div>
                                        </div>

                                        @endif

                                       



                                    </div>
                                </form>


                                 <hr>
                                        <legend>Status</legend>


                                        <label class="label label-info">Pending</label>
                                        <legend>Actions</legend>

                                       
                                                              <!--<a class="btn btn-sm btn-danger" href="{{route('admin.gh.delete',['id'=>$gh->id])}}">Delete</a>-->


                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        

                    </div> <!-- container -->

                </div> <!-- content -->

               





@endsection
