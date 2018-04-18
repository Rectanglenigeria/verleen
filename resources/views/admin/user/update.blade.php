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
                                    <li class="breadcrumb-item"><a href="#">Update User</a></li>
                                </ol>

                            </div>
                        </div>









                <div class="row">


                     @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif


                            <div class="col-12">

                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            View User
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


















                                            
                                <form action="{{route('admin.user.update.submit')}}" method="POST" role="form">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                    <legend>Profile</legend>

                                    <div class="form-body">








                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Name</label>

                                                <input class="form-control"  
                                            value="{{$user->name}}" 
                                         name="name" id="name">


                                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>





                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label>Email</label>

                                                <input class="form-control"  
                                            value="{{$user->email}}" 
                                         name="email" id="email">


                                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                    <label>Phone</label>

                                                <input class="form-control"  
                                            value="{{$user->phone}}" 
                                         name="phone" id="phone">


                                                 @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>





                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    @if($user->country==null)
                                                    <p>Nigeria</p>
                                                    @else
                                                    <p>{{$user->country}}</p>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>



                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Currency</label>

                                                    <p>{{$user->currency}}</p>

                                                </div>

                                            </div>
                                        </div>






                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('account_name') ? ' has-error' : '' }}">
                                                    <label>Account name</label>

                                                <input class="form-control"  
                                            value="{{$user->account_name}}" 
                                         name="account_name" id="account_name">


                                                 @if ($errors->has('account_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_name') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>


                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('account_no') ? ' has-error' : '' }}">
                                                    <label>Account no</label>

                                                <input class="form-control"  
                                            value="{{$user->account_no}}" 
                                         name="account_no" id="account_no">


                                                 @if ($errors->has('account_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_no') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>



                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                                    <label>Bank</label>

                                                <input class="form-control"  
                                            value="{{$user->bank}}" 
                                         name="bank" id="bank">


                                                 @if ($errors->has('bank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>






                                         <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('wallet_name') ? ' has-error' : '' }}">
                                                    <label>Wallet_name</label>

                                                <input class="form-control"  
                                            value="{{$user->wallet_name}}" 
                                         name="wallet_name" id="wallet_name">


                                                 @if ($errors->has('wallet_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wallet_name') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-12 ">
                                            <div class="form-group{{ $errors->has('wallet_address') ? ' has-error' : '' }}">
                                                    <label>Wallet_address</label>

                                                <input class="form-control" value="{{$user->wallet_address}}" 
                                         name="wallet_address" id="wallet_address">


                                                 @if ($errors->has('wallet_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wallet_address') }}</strong>
                                    </span>
                                @endif

                                                </div>

                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12 ">
                                            <div class="form-group">
                                                    <label>Verification code</label>

                                                    <p>{{$user->verification_code}}</p>  

                                                </div>

                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-12 ">
                                            <div class="form-group">
                                                   

                                                  <button type="submit" class="btn btn-sm btn-primary">
                                                      Update
                                                  </button>

                                                </div>

                                            </div>
                                        </div>
                                        

                                       



                                    </div>
                                </form>


                                 <hr>
                                        <legend>Status</legend>


                                       @if($user->has_verified==1 && $user->has_blocked==0 && $user->has_suspended==0)
                                                            <label class="label label-info">Active</label>
                                                            @else
                                                            <label class="label label-danger">Not active</label>
                                                            @endif
                                        <hr>
                                        <legend>Actions</legend>

                                        <a href="{{route('admin.user.list')}}" class="btn btn-sm btn-primary">Back</a>
                                         
                                        @if($user->has_verified==0)
                                         <a class="btn btn-sm btn-primary" href="{{route('admin.user.verify',['id'=>$user->id])}}">Verify</a>
                                         @endif

                                         @if($user->has_blocked==0) 
                                            <a class="btn btn-sm btn-danger" href="{{route('admin.user.block',['id'=>$user->id])}}">Block</a>
                                        @else
                                            <a class="btn btn-sm btn-primary" href="{{route('admin.user.unblock',['id'=>$user->id])}}">Unblock</a>
                                        @endif
                                          <a class="btn btn-sm btn-danger" href="{{route('admin.user.delete',['id'=>$user->id])}}">Delete</a>


                                          <hr>
                                            @if($user->currency=='lc')
                                            @if($user->is_lcdpr ==0)
                                          <a title="Make local currency downpayment receiver" class="btn btn-sm btn-success" href="{{route('admin.lcdpr',['id'=>$user->id])}}">Make LC DPR</a>
                                          @endif
                                          @endif


                                            @if($user->currency=='eth')
                                            @if($user->is_ethdpr ==0)
                                           <a title="Make ethereum currency downpayment receiver" class="btn btn-sm btn-success" href="{{route('admin.ethdpr',['id'=>$user->id])}}">Make ETH DPR</a>
                                           @endif
                                           @endif


                                           @if($user->currency=='etn')
                                           @if($user->is_etndpr ==0)
                                           <a title="Make electroneum currency downpayment receiver" class="btn btn-sm btn-success" href="{{route('admin.etndpr',['id'=>$user->id])}}">Make ETN DPR</a>
                                           @endif
                                           @endif


                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        

                    </div> <!-- container -->

                </div> <!-- content -->

               








@endsection
