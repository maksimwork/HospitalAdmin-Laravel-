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
                        <h4 class="page-title">Dashboard</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Hospital</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div> -->
                </div>

                <!--row 4 Main Items-->
                <div class="row">
                    @if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3)
                    <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                        <i class="ti-user bg-megna"></i>
                        <div class="bodystate">
                            <h4>{{$patient}}</h4>
                            <span class="text-muted">Patients</span>
                        </div>
                        </div>  
                    </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                        <i class="ti-wand bg-info"></i>
                        <div class="bodystate">
                            <h4>{{$exercise}}</h4>
                            <span class="text-muted">Exercises</span>
                        </div>
                        </div>  
                    </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                        <i class="ti-wallet bg-success"></i>
                        <div class="bodystate">
                            <h4>{{$category}}</h4>
                            <span class="text-muted">Categories</span>
                        </div>
                        </div>  
                    </div>
                    </div>
                    
                    
                    <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                        <i class="ti-control-shuffle bg-inverse"></i>
                        <div class="bodystate">
                            <h4>{{$training}}</h4>
                            <span class="text-muted"> Traings</span>
                        </div>
                        </div>  
                    </div>
                    </div>
                    @endif
                    @if(Auth::user()->privillege == 2)
                    <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                        <i class="ti-wand bg-info"></i>
                        <div class="bodystate">
                            <h4>{{$exercise}}</h4>
                            <span class="text-muted">My Exercises</span>
                        </div>
                        </div>  
                    </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                        <i class="ti-wallet bg-success"></i>
                        <div class="bodystate">
                            <h4>{{$tempname}}</h4>
                            <span class="text-muted">My Therapist</span>
                        </div>
                        </div>  
                    </div>
                    </div>@endif
                </div>

                <!--row -->
                <!-- <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Patients Created</h3>
                        <!-- <ul class="list-inline text-center">
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>OPD</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>ICU</h5>
                        </li>
                        </ul> -->
                        <!-- <div id="morris-area-chart1" style="height: 370px;"></div>
                    </div>
                </div>  
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Exercise Created</h3>
                       

                        <div id="morris-area-chart2" style="height: 370px;"></div>
                    </div>
                    </div>
                        
                </div> --> 
                
               
                
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
