

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
                                                    <strong>{{$detail->gh_user->name}}</strong>
                                                </div>
                                            </div>

                                            <hr>



                                            <div class="row">
                                               <h3 class="col-md-12" style="color: blue;">Email</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->email}}</strong>
                                                </div>
                                            </div>


                                            <hr>



                                             <div class="row">
                                                <h3 class="col-md-12" style="color: blue;">Phone</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->phone}}</strong>
                                                </div>
                                            </div>

                                            <hr>


                                            @if($detail->ph_user->currency == 'lc')

                                            <div class="row">
                                                <h3 class="col-md-12" style="color: blue;">Account No</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->account_no}}</strong>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <h3 class="col-md-12" style="color: blue;">Account Name</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->account_name}}</strong>
                                                </div>
                                            </div>

                                            <hr>



                                             <div class="row">
                                                <h3 class="col-md-12" style="color: blue;">Bank</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->bank}}</strong>
                                                </div>
                                            </div>

                                            <hr>


                                            @else


                                             <div class="row">
                                               <h3 class="col-md-12" style="color: blue;">Wallet Name</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->wallet_name}}</strong>
                                                </div>
                                            </div>

                                            <hr>


                                            <div class="row">
                                               <h3 class="col-md-12" style="color: blue;">Wallet Address</h3>
                                                <div class="col-md-12">
                                                    <strong>{{$detail->gh_user->wallet_address}}</strong>
                                                </div>
                                            </div>

                                            <hr>

                                           


                                            @endif



                                           
                                            <legend>
                                                
                                               <small style="color:blue;"> Teller/Hash</small>
                                            </legend>




                                            @if($detail->ph_user->currency == 'lc')



                                            <form class="form-horizontal form-material" action="{{route('user.merge.remaining.teller.submit')}}" method="POST" enctype="multipart/form-data"h>


                                            {{ csrf_field() }}

                                            
                                            <input type="hidden" name="merge_id" value="{{$detail->id}}">

                                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Upload teller</label>
                                                <div class="col-md-12">
                                                    <input placeholder="" class="form-control form-control-line" type="file" name="file" value="" id="file">
                                                    @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                           

                                              

                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">Submit</button>
                                                </div>
                                            </div>
                                        </form>






                                            @else



                                             <form class="form-horizontal form-material" action="{{route('user.merge.remaining.hash.submit')}}" method="POST">


                                            {{ csrf_field() }}

                                            <input type="hidden" name="merge_id" value="{{$detail->id}}">


                                            <div class="form-group{{ $errors->has('hash') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Upload payment hash</label>
                                                <div class="col-md-12">
                                                    <input placeholder="" class="form-control form-control-line" type="input" name="hash" value="" id="hash">
                                                    @if ($errors->has('hash'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hash') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                           

                                              

                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">Submit</button>
                                                </div>
                                            </div>
                                        </form>






                                            @endif


                                             <hr>

                                            <legend>
                                                
                                               <small style="color: blue;">Actions</small> 
                                            </legend>

                                          



                                              <a href="{{route('user.merge.remaining.default', ['id'=>$detail->id])}}" class="btn btn-sm btn-primary">I can't pay</a>




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


