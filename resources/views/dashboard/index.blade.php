

@extends('layouts.dashboard')

@section('content')


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
                        <h3 class="text-themecolor">Dashboard</h3>
                        <!--<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Dashboard</li>
                        </ol>-->
                    </div>
                </div>


                  @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif
                           


                @if(!empty($ggps))
                <div class="row page-titles">
                    <div class="col-md-12 col-12 align-self-center">
                        <h3 class="text-themecolor">GGPs</h3>

                        <marquee>
                            <?php $count=1;?>
                            @foreach($ggps as $ggp)

                            <?php

                                if($ggp->gh_user->id==Auth::user()->id || $ggp->ph_user->id==Auth::user()->id){
                                    continue;
                                }
                            ?>


                         

                                @if($ggp->gh_user->currency==Auth::user()->currency)
                          
                            <label>{{$count}}.&nbsp;</label>
                            <label><b>Gher</b> : {{$ggp->gh_user->name}}&nbsp;</label>
                            <label>, <b>Amount</b> : {{$ggp->amount}}&nbsp;</label>
                            <label>, <b>Currency</b> : {{$ggp->gh_user->currency}}&nbsp;</label>
                            <a href="{{route('user.ggp.pick',['id'=>$ggp->id])}}" class="btn btn-sm btn-primary">Pick</a>
                            &nbsp;
                            <?php $count++;?>
                            @endif
                            
                            @endforeach
                        </marquee>
                        
                    </div>
                </div>
                @endif


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

                    <div class="col-md-12 col-12">
                            <a href="{{route('user.help.provide')}}" class="btn btn-sm btn-primary">Provide Help</a>
                            <a href="{{route('user.wallet')}}" class="btn btn-sm btn-success">Receive Help</a>
                     
                    </div>
                    <br><br>
                    
                </div>


                <div>

 
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Insurance Merges </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Pher</th>
                                                <th class="text-primary">Gher</th>
                                                <th class="text-primary">Currency</th>
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Time Left</th>
                                                <th class="text-primary">Status</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        	<?php $count=1;?>
                                        	@foreach($insurance_merges as $merge)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$merge->ph_user->name}}</td>
                                                <td>{{$merge->gh_user->name}}</td>
                                                <td>{{$merge->ph_user->currency}}</td>
                                                <td>{{$merge->amount}}</td>
                                                <td>

                                                    <span class="text-muted">

                                                        <i class="fa fa-clock-o"></i>


                                                        <?php

                                                            //getting payment time value 

                                                            if($merge->ph_user->currency=='lc'){
                                                                $paymentTime=$LcPhConfig->payment_time;
                                                            }elseif($merge->ph_user->currency=='eth'){
                                                                $paymentTime=$EthPhConfig->payment_time;
                                                            }else{
                                                                $paymentTime=$EtnPhConfig->payment_time;
                                                            }





                    if($merge->has_extended_time == 1){
                      $timeLeft="Unlimited";

                      echo $timeLeft;
                    }elseif($merge->has_uploaded_teller==1){

                         $timeLeft="----";

                      echo $timeLeft;

                    }else{




                        $timLeftInSecs=($paymentTime*60*60)-(time()-strtotime($merge->created_at));


                        if($timLeftInSecs > 0){



                       $secondsLeft = $timLeftInSecs;
$days = floor($secondsLeft / (60*60*24));
$hours = floor ( ($secondsLeft - ($days*60*60*24)) / (60*60) );
$mins =  floor(  ($secondsLeft-($days*60*60*24) - ($hours*60*60))/60);


 echo $days."D : ".$hours."H : ".$mins."M";

}else{

    $timeLeft="---";

     echo $timLeftInSecs;
}
                       
                    }

                   







                 







                                                 

 ?>

                                                </span> 


                                                </td>

                                                <td>

                                                     @if($merge->has_uploaded_teller == 0)

                                                      <label class="label label-table label-info">Pending</label>

                                                    @endif


                                                    @if($merge->has_uploaded_teller == 1 && $merge->has_confirmed_payment == 0)

                                                      <label class="label label-table label-info">Uploaded teller</label>

                                                    @endif


                                                    @if($merge->has_uploaded_teller == 1 && $merge->has_confirmed_payment == 1 )

                                                      <label class="label label-table label-info">Confirmed</label>

                                                    @endif




                                                    @if($merge->has_uploaded_teller == 1 && $merge->has_fake_pop == 1)

                                                      <label class="label label-table label-danger">Flagged</label>

                                                    @endif



                                                      <!-- <label class="label label-table label-primary">Matched</label>-->
                                                   <!--<label class="label label-table label-info">Paid</label>-->
                                                  

                                                    <!-- <label class="label label-table label-success">Confirmed</label>-->
                                                </td>
                                                <td>



                                                	@if(Auth::user()->id==$merge->ph_user->id)
                                                    <a class="btn btn-xs btn-primary" href="{{route('user.merges.imergedetailsgher',['id'=>$merge->id])}}">View</a>
                                                    @endif

                                                    @if(Auth::user()->id==$merge->gh_user->id)

                                                    <a class="btn btn-xs btn-info" href="{{route('user.merges.imergedetailspher',['id'=>$merge->id])}}">View</a>

                                                    @endif
                                                </td>
                                            </tr>

                                            <?php $count++; ?>
                                         @endforeach
                                        </tbody>
                                    </table>

                                    <center>
                                        {{$insurance_merges->links()}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





               <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Remaining Merges </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Pher</th>
                                                <th class="text-primary">Gher</th>
                                                <th class="text-primary">Currency</th>
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Time Left</th>
                                                <th class="text-primary">Status</th>
                                                <th class="text-primary">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $count=1;?>
                                            @foreach($main_merges as $merge)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$merge->ph_user->name}}</td>
                                                <td>{{$merge->gh_user->name}}</td>
                                                <td>{{$merge->ph_user->currency}}</td>
                                                <td>{{$merge->amount}}</td>
                                                <td>

                                                    <span class="text-muted">

                                                        <i class="fa fa-clock-o"></i>


                                                        <?php

                                                            //getting payment time value 

                                                            if($merge->ph_user->currency=='lc'){
                                                                $paymentTime=$LcPhConfig->payment_time;
                                                            }elseif($merge->ph_user->currency=='eth'){
                                                                $paymentTime=$EthPhConfig->payment_time;
                                                            }else{
                                                                $paymentTime=$EtnPhConfig->payment_time;
                                                            }





                    if($merge->has_extended_time == 1){
                      $timeLeft="Unlimited";

                      echo $timeLeft;
                    }elseif($merge->has_uploaded_teller==1){

                         $timeLeft="----";

                      echo $timeLeft;

                    }else{




                        $timLeftInSecs=($paymentTime*60*60)-(time()-strtotime($merge->created_at));


                        if($timLeftInSecs > 0){



                       $secondsLeft = $timLeftInSecs;
$days = floor($secondsLeft / (60*60*24));
$hours = floor ( ($secondsLeft - ($days*60*60*24)) / (60*60) );
$mins =  floor(  ($secondsLeft-($days*60*60*24) - ($hours*60*60))/60);


 echo $days."D : ".$hours."H : ".$mins."M";

}else{

    $timeLeft="---";

     echo $timLeftInSecs;
}
                       
                    }

                   







                 







                                                 

 ?>

                                                </span> 


                                                </td>

                                                <td>

                                                     @if($merge->has_uploaded_teller == 0)

                                                      <label class="label label-table label-info">Pending</label>

                                                    @endif


                                                    @if($merge->has_uploaded_teller == 1 && $merge->has_confirmed_payment == 0)

                                                      <label class="label label-table label-info">Uploaded teller</label>

                                                    @endif


                                                    @if($merge->has_uploaded_teller == 1 && $merge->has_confirmed_payment == 1 )

                                                      <label class="label label-table label-info">Confirmed</label>

                                                    @endif




                                                    @if($merge->has_uploaded_teller == 1 && $merge->has_fake_pop == 1)

                                                      <label class="label label-table label-danger">Flagged</label>

                                                    @endif



                                                      <!-- <label class="label label-table label-primary">Matched</label>-->
                                                   <!--<label class="label label-table label-info">Paid</label>-->
                                                  

                                                    <!-- <label class="label label-table label-success">Confirmed</label>-->
                                                </td>
                                                <td>



                                                    @if(Auth::user()->id==$merge->ph_user->id)
                                                    <a class="btn btn-xs btn-primary" href="{{route('user.merges.rimergedetailsgher',['id'=>$merge->id])}}">View</a>
                                                    @endif

                                                    @if(Auth::user()->id==$merge->gh_user->id)

                                                    <a class="btn btn-xs btn-info" href="{{route('user.merges.rimergedetailspher',['id'=>$merge->id])}}">View</a>

                                                    @endif
                                                </td>
                                            </tr>

                                            <?php $count++; ?>
                                         @endforeach
                                        </tbody>
                                    </table>

                                    <center>
                                        {{$main_merges->links()}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction History </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary"><i class="mdi mdi-basket-fill"></i> Pher</th>
                                                <th class="text-primary"><i class="mdi mdi-basket-unfill"></i> Gher</th>
                                                <th class="text-primary">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        	<?php $count=1;?>
                                        	@foreach($local_trans as $trans)

                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$trans->ph_user->name}}</td>
                                                <td>{{$trans->gh_user->name}}</td>
                                                <td>{{$trans->amount}}</td>
                                            </tr>
                                            <?php $count++;?>
                                            @endforeach


                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Pher</th>
                                                <th>Gher</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <center>
                                        {{$local_trans->links()}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Global Transaction History </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Pher</th>
                                                <th class="text-primary">Gher</th>
                                                 
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Currency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $count=1;?>
                                        	@foreach($global_trans as $trans)

                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$trans->ph_user->name}}</td>
                                                <td>{{$trans->gh_user->name}}</td>
                                                <td>{{$trans->amount}}</td>
                                                 <td style="text-transform: uppercase;">{{$trans->ph_user->currency}}</td>
                                            </tr>
                                            <?php $count++;?>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Pher</th>
                                                <th>Gher</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                    </table>

                                      <center>
                                        {{$global_trans->links()}}
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>










   <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Global PH List </h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Name</th>

                                                <th class="text-primary">Number</th>
                                                <th class="text-primary">Currency</th>
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $count=1;?>
                                                @foreach($global_phs as $ph)

                                                <?php
                                                        if($ph->user->currency=='lc'){
                                                                $currency="Naira";
                                                        }elseif($ph->user->currency=='eth'){
                                                                $currency="ETH";
                                                        }else{
                                                                $currency="ETN";
                                                        }
                                                ?>

                                                <?php

                                                    if($ph->user->is_ethdpr==1  || $ph->user->is_etndpr==1 ||$ph->user->is_lcdpr==1 || $ph->user->id==3000){
                                                        continue;
                                                    }
                                                ?>

                                                <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$ph->user->name}}</td>
                                                <td>{{$ph->user->phone}}</td>
                                                <td>{{$currency}}</td>
                                                <td>{{$ph->amount}}</td>
                                                 <td>{{$ph->created_at}}</td>
                                            </tr>
                                            <?php $count++;?>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-primary">S/N</th>
                                                <th class="text-primary">Name</th>

                                                <th class="text-primary">Number</th>
                                                <th class="text-primary">Currency</th>
                                                <th class="text-primary">Amount</th>
                                                <th class="text-primary">Date</th>
                                            </tr>
                                        </thead>
                                    </table>


                                      <center>
                                        {{$global_phs->links()}}
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>





                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Testimonies</h4>
                                <h6 class="card-subtitle">Latest Testmonies from participant</h6> </div>
                            <!-- ============================================================== -->
                            <!-- Comment widgets -->
                            <!-- ============================================================== -->
                            <div class="comment-widgets">
                                <!-- Comment Row -->

                                 @foreach($testimonies as $testimony)
                                <div class="d-flex flex-row comment-row">
                                
                                    <div class="comment-text w-100">
                                        <h5>{{$testimony->name}}</h5>
                                        <p class="m-b-5">
                                        	{{$testimony->body}}
                                        </p>
                                        <div class="comment-footer"> <span>{{$testimony->created_at}}</span> </div>
                                    </div>
                                </div>

                                @endforeach

                                 

                                

                                
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <h4 class="card-title">News Timeline</h4>


                            @foreach($NewsFeeds as $news)


                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="card card-inverse card-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">{{$news->created_at}}</h4></div>
                                    <div class="card-body">
                                    	<h3>{{$news->title}}</h3>
                                       
                                        <a href="{{route('user.news.view',['id'=>$news->id])}}" class="btn btn-inverse">Read More</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach



                            <center>
                                {{$NewsFeeds->links()}}
                                    </center>



                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
        
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

                        @endsection


