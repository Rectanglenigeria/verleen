

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

                     


                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-titlen text-themecolor">Provide Help</h3>
                                <div class="d-flex flex-row comment-row">
                                    <div class="comment-text w-100">

                                        @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif
                                       
                                        <form class="form-horizontal form-material" action="{{route('user.help.provide.submit')}}" method="POST">
                                            {{ csrf_field() }}
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
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction History </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary"> Amount</th>
                                                <th class="text-primary">Timestamp</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php $count=1;?>
                                            @foreach ($achieved as $help)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$help->amount}}</td>
                                                <td>{{$help->created_at}}</td>
                                            </tr>

                                            <?php $count++; ?>

                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    

     @endsection


