@include('head')

<?php
    
?>
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
                        <h4 class="page-title">Contact Support</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Help & Support</a></li>
                            <li class="active">Contact Support</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                    <form class="" action="/contactsupportedit" accept-charset="UTF-8">    
                        <div class="white-box" style = "display:flex; justify-content:space-between;">
                            <h4 class="page-title">Get in Touch</h4> 
                            @if(Auth::user()->privillege == 1)
                            <button type = "submit" class="btn btn-block btn-info" style = "width:100px; margin-right:90px; height:32px; background-color:#0095D4;color:#FFF;">Edit</button>
                            @endif
                        </div>
                    </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <h4 class="page-title">Description</h4> -->
                            <p class="m-t-30">
                            {{$description}}
                            </p>
                           <div class = "row m-t-30">
                        
                                <div class = "col-sm-9">
                                    <h4 class="page-title m-t-30">Contact Numbers</h4>
                                    <div class = "col-sm-4 m-t-30">
                                        <!-- <p> </p> -->
                                        <p>{{$contactnumber}}</p>
                                    </div>
                                    <div class = "col-sm-4 m-t-30">
                                        <p>{{$extratext}}</p>
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                           
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
    
    <script>
        function editFunction(){
            // window.location = "/contactsupport";
            
        }
        
    </script>
</body>
</html>
