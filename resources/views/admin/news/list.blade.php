
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
                                    <li class="breadcrumb-item"><a href="#">News</a></li>
                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">

                            @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0">Achived news &nbsp; <label class="badge">{{$totalNews}}</label></h3>

                            <br>


                            <!--data table-->

                             <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                   
                                   <th>Date</th>
                                   <th>Title</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>

                                           <?php $count=1;?>
                                                          @foreach($news as $new)

                                <tr>
                                                        
                                                        <td>{{$new->created_at}}</td>
                                                        <td>{{$new->title}}</td>
                                                        
                                                        <td>

                                                            <a href="{{route('admin.news.view',['id'=>$new->id])}}" class="btn btn-sm btn-primary">view</a>

                                                           
                                                              <a class="btn btn-sm btn-danger" href="{{route('admin.news.delete',['id'=>$new->id])}}">Delete</a>
                                                        </td>
                                </tr>

                                <?php
                                    $count++;
                                ?>

                                @endforeach


                                 

                                
                                
                          
                                </tbody>
                            </table>

                            <!--data table-->

                            <center>
                                {{$news->links()}}
                            </center>
                            
                            
                        </div>
                    </div>






                   


                </div>




              

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection