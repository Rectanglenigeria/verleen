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
                                    <li class="breadcrumb-item"><a href="#">Merge Remianing</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">



                             <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0"></h3>
                            <br>


                           
                           <!--news-->

                        <div class="row">

                            <!--news card-->

                            <div class="col-md-12">

                                
                           


                             <p class="h3" style="float: left;">
       <span>Gher's Name : {{ucwords($gh->user->name)}}&nbsp;|&nbsp;</span>
       <span class="RsAmount" id="RsAmount">Amount Left: {{($gh->remainance)}}</span><span>&nbsp</span>
      </p>













 <form method="POST" method="POST" action="{{route('admin.merge.remaining.merge')}}" name="gsmile_form" role="form">

            <div class="box-body table-responsive no-padding">


            {{ csrf_field() }}


           <input name="gh_id" value="{{$gh_id}}" type="hidden">






<!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover">
                <thead>
               <tr>
                   <th>Pher's Name</th>
                   <th>PH Value</th>
                   <th>Matched Amount</th>
                  <th>Left Amount</th>
                  <th>Request Age (Days)</th>
                 
                  <th>Deduct</th>
                </tr>
                </thead>

                <tbody>

            @foreach($phs as $ph)


             <?php
                                    if($ph->user->id == 3000){
                                        continue;
                                    }
                                 ?>

                <?php

                if(!isset($ph->user->id)){
                  continue;
                }

                  $phLeftAmount=$ph->reminance;

                  if($ph->user->id == 17){continue;}



                ?>

              <?php

              if($gh->user->currency != $ph->user->currency){
                continue;
              }

              //checked has paid insurance

              if($ph->user->has_blocked == 1 || $ph->user->has_suspended == 1){
                continue;
              }

              if($ph->user->id==17){
                continue;
              }


              ?>


                <tr>
                  <td>{{$ph->user->name}}</td>
                  <td>{{$ph->amount}}</td>
                  <td>{{$ph->amount - $ph->reminance}}</td>
                  <td>

                  {{$ph->reminance}}
                 
                  </td>
                  <td>
                  {{$ph->period}}
                  </td>

                 

                  <td>

                   <input name="{{$ph->id}}" type="number" class="" id="{{$ph->id}}" onclick="">
                </td>


                </tr>

                @endforeach

               


                </tbody>
                <tfoot>
                <tr>
                    <th>Pher's Name</th>
                   <th>PH Value</th>
                   <th>Matched Amount</th>
                  <th>Left Amount</th>
                  <th>Request Age (Days)</th>
                 
                  <th>Deduct</th>
                </tr>
                </tfoot>
              </table>




            </div>
            <!-- /.box-body -->








            </div>
<center>
   <button class="btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
</center>




            </form>













                            </div>
                            <!--news card-->


                           

                           

                          </div>


                         

                               
                           

                       </div>

                           <!--news-->
                            
                            
                        </div>


                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
