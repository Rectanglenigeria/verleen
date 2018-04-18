
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
                                    <li class="breadcrumb-item"><a href="#">Merges</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">


                        	@if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h5 class="portlet-title text-dark text-uppercase">
                                           Filter By  Downpayment
                            </h5>

                            <br>


                            <!--data table-->

                             <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                   <th>Date</th>
                                    <th>Pher</th>
                                    <th>Gher</th>
                                    <th>Amount</th>
                                    <th>Time Left</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                @foreach($merges as $merge)



                                 <?php
                                    if($merge->ph_user->id == 3000 || $merge->gh_user->id == 3000){
                                        continue;
                                    }
                                 ?>

                             
                                                    <tr>
                                                        <td>{{$merge->created_at}}</td>
                                                        <td>{{$merge->ph_user->name}} <hr> {{$merge->ph_user->phone}} </td>
                                                         <td>{{$merge->gh_user->name}} <hr> {{$merge->gh_user->phone}} </td>
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
                                                        </td>






                                                        <td>



                                                            @if($merge->has_confirmed_payment ==0)
                                                        	<a class="btn btn-xs btn-primary" href="{{route('admin.unmergeinsurance',['id'=>$merge->id])}}">Unmerge</a>

                                                            <hr>

                                                         
                                                            <a class="btn btn-xs btn-primary" href="{{route('admin.merge.confirminsurance',['id'=>$merge->id])}}">Confirm</a>
                                                 

                                                            @endif

                                                        
                                                        </td>



                                                    </tr>

                                @endforeach
                          
                                </tbody>
                            </table>

                            <!--data table-->
                            
                            
                        </div>

                        {{$merges->links()}}
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
