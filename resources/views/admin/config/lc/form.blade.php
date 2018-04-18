
@extends('layouts.admin')

@section('content')


 <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">Create News</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Verleen</a></li>
                                    <li class="breadcrumb-item"><a href="#">Configuration</a></li>
                                     <li class="breadcrumb-item"><a href="#">LC</a></li>


                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">


                             @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0">Update config</h3>
                        

                           
                           <!--news-->

                        <div class="row">

                            <!--news card-->

                            <div class="col-md-12">

                                 <form action="{{route('admin.config.lc.update')}}" method="POST" role="form">

                                         {{ csrf_field() }}
                                    
                                    <div class="form-body">



                                        <?php

                                            echo json_encode($config);
                                        ?>
                            
               
                                        
                                    <div class="row">
                                            <div class="col-md-12 ">
                                            <div class="form-group{{ $errors->has('min_ph_value') ? ' has-error' : '' }}">
                                                    <label>Minimum ph value</label>
                                                    <input class="form-control"   value="{{$config->min_ph_value}}" type="text" name="min_ph_value" id="min_ph_value">

                                                    @if ($errors->has('min_ph_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('min_ph_value') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>




                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('min_ph_value') ? ' has-error' : '' }}">
                                                    <label>Maximum ph value</label>
                                                    <input class="form-control"   value="{{$config->max_ph_value}}" type="text" name="max_ph_value" id="max_ph_value">

                                                    @if ($errors->has('max_ph_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_ph_value') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>


                                     <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('ph_multiple') ? ' has-error' : '' }}">
                                                    <label>Ph interval</label>
                                                    <input class="form-control"   value="{{$config->ph_multiple}}" type="text" name="ph_multiple" id="ph_multiple">

                                                    @if ($errors->has('ph_multiple'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ph_multiple') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>




                                     <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('roi_value') ? ' has-error' : '' }}">
                                                    <label>Roi value</label>
                                                    <input class="form-control"   value="{{$config->roi_value}}" type="text" name="roi_value" id="roi_value">

                                                    @if ($errors->has('roi_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roi_value') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>



                                     <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('roi_period') ? ' has-error' : '' }}">
                                                    <label>Roi period</label>
                                                    <input class="form-control"   value="{{$config->roi_period}}" type="text" name="roi_period" id="roi_period">

                                                    @if ($errors->has('roi_period'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roi_period') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>



                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('ph_per_time') ? ' has-error' : '' }}">
                                                    <label>Ph per time</label>
                                                    <input class="form-control"   value="{{$config->ph_pertime}}" type="text" name="ph_per_time" id="ph_per_time">

                                                    @if ($errors->has('ph_per_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ph_per_time') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>



                                    


                                     <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('downpayment') ? ' has-error' : '' }}">
                                                    <label>downpayment</label>
                                                    <input class="form-control"   value="{{$config->downpayment}}" type="text" name="downpayment" id="downpayment">

                                                    @if ($errors->has('downpayment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('downpayment') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>



                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{ $errors->has('payment_time') ? ' has-error' : '' }}">
                                                    <label>payment_time</label>
                                                    <input class="form-control"   value="{{$config->payment_time}}" type="text" name="payment_time" id="payment_time">

                                                    @if ($errors->has('payment_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_time') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>


                                    


                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{$errors->has('autoconfirm_unflagged_payment_after') ? ' has-error' : '' }}">
                                                    <label>autoconfirm_unflagged_payment_after</label>
                                                    <input class="form-control"   value="{{$config->autoconfirm_unflagged_payment_after}}" type="text" name="autoconfirm_unflagged_payment_after" id="autoconfirm_unflagged_payment_after">

                                                    @if ($errors->has('autoconfirm_unflagged_payment_after'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('autoconfirm_unflagged_payment_after') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>













                                

                                 


                                    <hr>
                                     <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <button id="create" type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                </div>

                                            </div>
                                    </div>




                                       
                                    </div>
                                </form>

                            </div>
                            <!--news card-->


                           

                           

                          </div>


                         

                               
                           

                       </div>

                           <!--news-->
                            
                            
                        </div>
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->


                

@endsection