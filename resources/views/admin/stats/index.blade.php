
@extends('layouts.admin')

@section('content')




  <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">Statistics</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Verleen</a></li>
                                    <li class="breadcrumb-item"><a href="#">Statistics</a></li>
                                </ol>

                            </div>
                        </div>



                        <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                         
                            <p class="m-0 text-dark counter font-600">{{number_format($totalusers)}}</p>
                            <div class="text-muted m-t-5 h6">Total Users</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            
                            <p class="m-0 text-dark counter font-600">{{number_format($totalVUsers)}}</p>
                            <div class="text-muted m-t-5 h6">Total Verified Users</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            
                            <p class="m-0 text-dark counter font-600">{{number_format($totalBUsers)}}</p>
                            <div class="text-muted m-t-5 h6">Total Blocked Users</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                           
                            <p class="m-0 text-dark counter font-600">{{number_format($totalSUsers)}}</p>
                            <div class="text-muted m-t-5 h6">Total Suspended Users</div>
                        </div>
                    </div>
                    
                </div>


                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                         
                            <p class="m-0 text-dark counter font-600">{{number_format($totalLPh)}}</p>
                            <div class="text-muted m-t-5 h6">Total Local PH</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            
                            <p class="m-0 text-dark counter font-600">{{number_format($totalETHPh)}}</p>
                            <div class="text-muted m-t-5 h6">Total ETH PH</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            
                            <p class="m-0 text-dark counter font-600">{{number_format($totalETNPh)}}</p>
                            <div class="text-muted m-t-5 h6">Total ETN PH</div>
                        </div>
                    </div>
                    
                </div>




                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                         
                            <p class="m-0 text-dark counter font-600">{{number_format($totalLGh)}}</p>
                            <div class="text-muted m-t-5 h6">Total Local GH</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            
                            <p class="m-0 text-dark counter font-600">{{number_format($totalETHGh)}}</p>
                            <div class="text-muted m-t-5 h6">Total ETH GH</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="widget-panel widget-style-2 bg-white">
                            
                            <p class="m-0 text-dark counter font-600">{{number_format($totalETNGh)}}</p>
                            <div class="text-muted m-t-5 h6">Total ETN GH</div>
                        </div>
                    </div>
                    
                </div>











               
                        

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection