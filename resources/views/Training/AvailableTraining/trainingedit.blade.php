@include('head')

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        @include('topnavbar');
        @include('sidebar')
        <!-- Left navbar-header end -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Training</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Training</a></li>
                            <li class="active">Edit Training</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class="form-horizontal" action="/trainingeditaction" method="POST" accept-charset="UTF-8" enctype = "multipart/form-data"> 
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Training Title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="trainingtitle" class="form-control" value='{{$training->trainingtitle}}'>
                                        <input type="hidden" id="example-text" name="previous" class="form-control" value='{{$training->trainingtitle}}'>

                                    </div>
                                </div>

                                

                            
                                <div class="form-group ">
                                    <label class="col-sm-12">Training Description</label>
                                    <div class="col-sm-12 m-t-12">
                                        <textarea name="content" id="content" class="textarea_editor form-control" rows="15" name = "exercisedescription" >{{$training->content}}</textarea>
                                        <br><input type="file" name='uplode_image_file' required = "required"><br>
                                    </div>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label class="col-sm-12">Upload <strong>Image</strong> or <strong>Video</strong></label>
                                    <div class="col-sm-12">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                        <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    </div>
                                </div> -->

                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <a href = "{{ URL::route('availabletraining') }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                            </form>    
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center">Copyright@ 2018 . Admin Vital - Powered By XBS </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    @include('script')
</body>
</html>
