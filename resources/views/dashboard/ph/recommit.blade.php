

@extends('layouts.dashboard')

@section('content')


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
                        <h3 class="text-themecolor">Provide help</h3>
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

                     
            <div class="col-md-3">
                        
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-titlen text-themecolor">Make Recommitment</h3>
                                <div class="d-flex flex-row comment-row">
                                    <div class="comment-text w-100">

                                        @if(Session::has('notification'))
          <small style="color: red;">{{Session::get('notification')}}</small>
        @endif
                                       
                                        <form class="form-horizontal form-material" action="{{route('user.help.recommit.submit')}}" method="POST">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="ph_id" value="{{$ph_id}}">
                                            <div class="row form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                              <label for="example-text-input" class="col-4 col-form-label">Amount</label>
                                              <div class="col-8">
                                                <input class="form-control" type="text" value="{{old('amount')}}" id="amount" name="amount">

                                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <small>By Clicking create means you accept our <a href="{{route('terms')}}">terms and conditions</a></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    

     @endsection


