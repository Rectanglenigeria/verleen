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
                                    <li class="breadcrumb-item"><a href="#">Merge Downpayment</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">



                             <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0">Select who to merge with</h3>
                            <br>


                           
                           <!--news-->

                        <div class="row">

                            <!--news card-->

                            <div class="col-md-12">

                                 <form class="form-horizontal" method="POST" action="{{route('admin.merge.downpayment.merge')}}">

                                     {{ csrf_field() }}


                        <input name="ph_id" value="{{$ph_id}}" type="hidden">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Select receiver</label>

                            <div class="col-md-12". >

                                <select class="form-control" name="gh_id">



                                    <option selected="selected" disabled="disabled">Select a receiver</option>

                                    @if($ph->user->currency == 'lc')

                                    @foreach($ghs as $gh)

                                        @if($gh->user->is_lcdpr==1)
                                     
                                    <option value="{{$gh->id}}">{{$gh->user->name}}</option>

                                        @endif
                                   

                                    @endforeach


                                     @endif






                                     @if($ph->user->currency == 'eth')

                                    @foreach($ghs as $gh)

                                        @if($gh->user->is_ethdpr==1)
                                     
                                    <option value="{{$gh->id}}">{{$gh->user->name}}</option>

                                        @endif
                                   

                                    @endforeach


                                     @endif








                                     @if($ph->user->currency == 'etn')

                                    @foreach($ghs as $gh)

                                        @if($gh->user->is_etndpr==1)
                                     
                                    <option value="{{$gh->id}}">{{$gh->user->name}}</option>

                                        @endif
                                   

                                    @endforeach


                                     @endif



                                    
                                </select>
                             

                                                            </div>
                        </div>


                      



                        

                        



                      

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Merge
                                </button>

                                
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




              

                    </div> <!-- container -->

                </div> <!-- content -->





@endsection
