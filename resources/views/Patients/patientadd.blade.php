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
                        <h4 class="page-title">Add Patient</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Add Patient</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class="form-material form-horizontal" action="/patientaddaction" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Patient Name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="namefield" class="form-control" placeholder="enter patient name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="emailfield" class="form-control" placeholder="enter email address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Mobile</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="mobilefield" class="form-control" placeholder="enter mobile number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">File Number</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="filenum" class="form-control" placeholder="enter mobile number">
                                    </div>
                                </div>
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <a href = "{{ URL::route('patient') }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
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
