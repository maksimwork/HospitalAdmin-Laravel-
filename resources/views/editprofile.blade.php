@include('head')

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        

        <!-- Left navbar-header -->
       
        @include('topnavbar');
        @include('sidebar')
       
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile Edit</h4> 
                    </div>
                </div>
                <div class="white-box">
                            <form class="form-material form-horizontal" action="/saveprofileinfo" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">First Name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="namefield1" class="form-control" value={{Auth::user()->firstname}} required>
                                        <input type="hidden" id="example-text" name="prevnamefield1" class="form-control" value={{Auth::user()->firstname}}>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Last Name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="namefield2" class="form-control" value={{Auth::user()->lastname}} required>
                                        <input type="hidden" id="example-text" name="prevnamefield2" class="form-control" value={{Auth::user()->lastname}}>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="emailfield" class="form-control" value={{Auth::user()->email}} required>
                                        <input type="hidden" id="example-text" name="previousemail" class="form-control" value={{Auth::user()->email}}>
                                    </div>
                                </div>

                              
                              <div class="form-group">
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <a href = "{{ URL::previous() }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                                </div>
                            </form>    
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
