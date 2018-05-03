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
                        <h4 class="page-title">Demo Training</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Training</a></li>
                            <li class="active">Demo Training</li>
                        </ol>
                    </div>
                </div>    -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h4 class="page-title">{{$training->trainingtitle}}</h4>
                            <hr>
                            <p>{{$training->content}}</p>
                            <hr>
                                
                                <div class="row">
                                    <div class="col-sm-2 col-xs-4">
                                        <a href="#"> <img class="img-thumbnail img-responsive" alt="attachment" src={{$training->filelink}}> </a>
                                    </div>
                                    
                                </div>
                            <hr>
                            
                            <p>{{$training->content}}</p>
                            
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
