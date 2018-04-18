
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
                                    <li class="breadcrumb-item"><a href="#">News</a></li>
                                     <li class="breadcrumb-item"><a href="#">Create</a></li>


                                </ol>

                            </div>
                        </div>



                       




                        <div class="row">


                             @if(Session::has('notification'))
          <p class="alert alert-success alert-sm alert-dismissable">{{Session::get('notification')}}</p>
        @endif




                    <div class="col-lg-12 col-md-12 col-xl-12">
                        <div class="card-box">
                            <h3 class="text-dark header-title m-t-0">News</h3>
                            <br>


                           
                           <!--news-->

                        <div class="row">

                            <!--news card-->

                            <div class="col-md-12">

                                 <form action="{{route('admin.news.create.submit')}}" method="POST" role="form" enctype="multipart/form-data">

                                         {{ csrf_field() }}
                                    
                                    <div class="form-body">




                                        


               
                                        
                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{$errors->has('title') ? ' has-error' : '' }}">
                                                    <label>Title</label>
                                                    <input class="form-control"   value="{{old('title')}}" type="text" name="title" id="title">

                                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>


                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{$errors->has('sub_title') ? ' has-error' : '' }}">
                                                    <label>Sub-title</label>
                                                    <input class="form-control"   value="{{old('sub_title')}}" type="text" name="sub_title" id="sub_title">

                                                    @if ($errors->has('sub_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_title') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group{{$errors->has('file') ? ' has-error' : '' }}">
                                                    <label>Cover</label>
                                                    <input class="form-control"  name="file" id="file" value="{{old('cover')}}" type="file">

                                                       @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                                                </div>

                                            </div>
                                    </div>

                                    <br><br>


                                    <div class="row">

                                         

                                            <div class="col-md-12 ">


                                                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                                    <label for="body" class="control-label">Body</label>

                           

                                                    <div id="summernote"></div>

                                                    <input id="body" type="hidden" name="body" type="hidden">


                                

                                                    @if ($errors->has('body'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('body') }}</strong>
                                                        </span>
                                                    @endif
                            
                                                 </div>



                                            </div>
                                    </div>


                                    <hr>
                                     <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <button id="create" type="button" class="btn btn-primary btn-sm">Submit</button>
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


                 <script type="text/javascript">
                  window.onload=function(){



                    //initializion script
                    $('#summernote').summernote({

                        placeholder: 'Type your html based message here',
                        tabsize: 2,
                        height: 300
                    });

                    //html form submit script
                    $('#create').click(function(){

                      //sumernote api to get strinf version of the html code
                      var html_form_content = $('#summernote').summernote('code');

                      document.getElementById('body').value=html_form_content;

                   

                      document.getElementById('create').type='submit';

                      var queryObject=document.querySelector("form[name=form]");

                      //submiting sign in form
                      queryObject.submit();


                    });


                  }
                </script>

@endsection