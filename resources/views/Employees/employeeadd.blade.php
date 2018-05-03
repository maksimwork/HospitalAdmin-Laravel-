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
                        <h4 class="page-title">Add Employee</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Employee</a></li>
                            <li class="active">Add Employee</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class="form-material form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Employee Name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="example-text" class="form-control" placeholder="enter employee name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="example-text" class="form-control" placeholder="enter email address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Mobile</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="example-text" class="form-control" placeholder="enter mobile number">
                                    </div>
                                </div>
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
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
