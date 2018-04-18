

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

                  @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif
                     

             
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-themecolor"><i class="mdi mdi-credit-card"></i> Wallet </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">PH Date</th>
                                                <th class="text-primary">PH Value</th>
                                                <th class="text-primary">Total Paid</th>
                                                 <th class="text-primary">Growth</th>
                                                  <th class="text-primary">Total Value</th>
                                                  <th class="text-primary">GH Value</th>
                                                  <th class="text-primary">GH Time</th>
                                                  
                                                  <th class="text-primary">GH Merged (GH)</th>
                                                  <!--<th class="text-primary">Total received</th>-->
                                                <th class="text-primary">Status</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $count=1;?>

                                            
                                            @foreach($phs as $ph)

                                            
                                            <?php

                                             $phPeriod=$ph->period;

                                                    if(isset($ph->insurance_merge->id)){

                                                        if($ph->insurance_merge->has_confirmed_payment==1){
                                                            $insurancePaid=$ph->insurance_merge->amount;

                                                        }else{

                                                             $insurancePaid=0;

                                                        }
                                                    }else{

                                                        $insurancePaid=0;

                                                    }


                                                    if(!empty($ph->main_merge)){

                                                        $mainMergePaid=0;

                                                        foreach ($ph->main_merge as $key => $value) {

                                                            if($value->has_confirmed_payment==1){

                                                                $mainMergePaid=$mainMergePaid+$value->amount;

                                                            }else{
                                                                continue;
                                                            }

                                                            
                                                        }

                                                    }else{

                                                        $mainMergePaid=0;
                                                    }


                                                    $totalPaid=$insurancePaid+$mainMergePaid;
                                                    ?>
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$ph->created_at}}</td>
                                                <td>{{($ph->amount)}}</td>
                                                <td>{{($totalPaid)}}</td>
                                                <td>{{($ph->growth)}}</td>
                                                <td>{{($ph->growth+$ph->amount)}}</td>
                                                 <td>
                                                     
                                                    @if(isset($ph->gh->amount))
                                                     {{$ph->gh->amount}}
                                                    @else
                                                    {{'---'}}
                                                    @endif

                                                 </td>

                                                <?php
                                                    $phTime=strtotime($ph->created_at);
                                                    $roiPeriod=(($config->roi_period)*24*60*60);
                                                     $projectedRsDateInSec=$roiPeriod+$phTime;
                                                        $projectedRsDateInTimeStamp=Date('F d Y | h:i', $projectedRsDateInSec);
                                                ?>

                                                <td>{{$projectedRsDateInTimeStamp}}</td>


                                                <td>
                                                    
                                                    @if(isset($ph->gh->id))

                                                        {{$ph->gh->amount - $ph->gh->remainance}}

                                                    @else

                                                    {{"---"}}

                                                    @endif

                                                </td>



                                               <!-- <td>

                                                    {{}}
                                               
                                                </td>-->




                                                <td>

                                                    <?php


                                                    if($phPeriod >= 30 && $totalPaid==$ph->amount){



                                                    }


                                                    ?>
                                                   <!-- <span class="label label-table label-success">Matched</span>
                                                    <span class="label label-table label-info">Paid</span>-->

                                                    @if($ph->has_ghed == 1)

                                                     <span class="label label-table label-success">Requested</span>

                                                    @else

                                                    @if($phPeriod >= 30 && $totalPaid==$ph->amount)
                                                    <span class="label label-table label-primary">Available</span>

                                                    @else

                                                     <span class="label label-table label-danger">Pending</span>

                                                    @endif
                                                    @endif
                                                </td>
                                                <td>

                                                      @if($ph->has_ghed == 1)
                                                        {{null}}
                                                      @else
                                                    @if($phPeriod >= 30 && $totalPaid==$ph->amount)
                                                    
                                                    <a  href="{{route('user.help.get', ['id'=>$ph->id])}}" class="btn btn-sm btn-success">Get Help</a>

                                                    @else

                                                    <a  href="" class="disabled btn btn-sm btn-success">Get Help</a>

                                                    @endif

                                                    @endif
                                                   
                                                </td>
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
                <!-- End PAge Content -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

    

     @endsection


