

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
                        <h3 class="text-themecolor">Profile</h3>
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

                <div class="row">

                    <div class="col-md-12 col-12">
                         <label>Referral link</label>
                         <div class="alert alert-success" role="alert">
                            {{Auth::user()->referal_link}}
                         </div>
                     
                    </div>
                    <br><br>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-1 col-xlg-3 col-md-5 col-sm-1 col-xs-1">
                    </div>
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{asset('dashboard/assets/images/avatar.jpg')}}" class="img-circle" width="150">
                                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                </center>
                            </div>
                            <span>
                                <hr> </span>
                            <div class="card-body"> <small class="text-muted">User Profile </small>
                                
                                <h6><?php if(isset(Auth::user()->name)){echo Auth::user()->email;} ?></h6> 
                                <h6> <?php if(isset(Auth::user()->phone)){echo Auth::user()->phone;} ?></h6>
                                <small class="text-muted p-t-30 db">Bank Details</small>
                                <h6><?php if(isset(Auth::user()->bank)){echo Auth::user()->bank;} ?></h6>
                                <h6><?php if(isset(Auth::user()->account_no)){echo Auth::user()->account_no;} ?></h6> 
                                <h6><?php if(isset(Auth::user()->account_name)){echo Auth::user()->account_name;} ?></h6>
                               
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xlg-9 col-md-7 col-sm-5, col-xs-5">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="{{route('user.profile.update')}}" method="POST">


                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" placeholder="" class="form-control form-control-line" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" placeholder="" class="form-control form-control-line" type="email" name="email" value="{{Auth::user()->email}}" id="email">
                                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" placeholder="08134546578" class="form-control form-control-line" type="number" name="phone" id="phone" value="{{Auth::user()->phone}}">
                                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                             <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                                                <label for="example-email" class="col-md-12">Currency</label>
                                                <div class="col-md-12">

                                                     <input disabled="disabled"  class="form-control form-control-line" type="text" name="currency" id="phone" value="{{Auth::user()->currency}}">

                                                     @if ($errors->has('currency'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                @endif
                                                    
                                                </div>
                                            </div>


                                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label for="example-email" class="col-md-12">Nationality</label>
                                                <div class="col-md-12">

                                                     <input disabled="disabled"  class="form-control form-control-line" type="text" name="country" id="country" value="{{Auth::user()->country}}">

                                                     @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                                                    
                                                </div>
                                            </div>


                                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Account Name</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" value="{{Auth::user()->account_name}}" class="form-control form-control-line" type="text" name="account_name" id="account_name">
                                                    @if ($errors->has('account_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                           
                                            <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Account Number</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" value="{{Auth::user()->account_no}}" class="form-control form-control-line" type="text" name="account_no" id="account_no">
                                                    @if ($errors->has('account_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_no') }}</strong>
                                    </span>
                                @endif
                                         
                                                </div>
                                            </div>

                                             <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                                <label for="example-email" class="col-md-12">Bank Name</label>
                                                <div class="col-md-12">

                                                   <input disabled="disabled" value="{{Auth::user()->Bank}}" class="form-control form-control-line" type="text" name="bank" id="bank">

                                                     @if ($errors->has('bank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                                                    
                                                </div>
                                            </div>


                                              <div class="form-group{{ $errors->has('wallet_name') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Wallet name</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" value="{{Auth::user()->wallet_name}}" class="form-control form-control-line" type="text" id="wallet_name" name="wallet_name">

                                                     @if ($errors->has('wallet_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wallet_name') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>


                                             <div class="form-group{{ $errors->has('wallet_address') ? ' has-error' : '' }}">
                                                <label class="col-md-12">Wallet address</label>
                                                <div class="col-md-12">
                                                    <input disabled="disabled" value="{{Auth::user()->wallet_address}}" class="form-control form-control-line" type="text" name="wallet_address" id="wallet_address">
                                                     @if ($errors->has('wallet_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wallet_address') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                           
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <a class="btn btn-primary btn-sm" href="{{route('user.profile')}}">Update my Profile</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xlg-3 col-md-5 col-xs-1 col-sm-1">
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


