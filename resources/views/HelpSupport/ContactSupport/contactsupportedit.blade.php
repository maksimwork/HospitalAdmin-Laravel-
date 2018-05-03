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
                <form class="form-material form-horizontal" action="/contactsupportsave"  method="POST" accept-charset="UTF-8" enctype = "multipart/form-data">
                {{ csrf_field() }}
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
                        <div class="white-box" style = "display:flex; justify-content:space-between;">
                            <h4 class="page-title">Get in Touch</h4> 
                            <div style = "display:flex;">
                            <button type = "submit"  class="btn btn-block btn-info m-r-10" style = "width:100px; height:32px;  background-color:#08d206; color:#FFF;">Save</button>
                            <!-- <a href = "/contactsupport" class="btn btn-inverse waves-effect waves-light" style = "text-align:center; line-height:20px; height:40px; margin-right:100px;">Cancel</a> -->
                            <a href = "/contactsupport" class="btn"style = "width:100px; height:32px; margin-right:90px; background-color:#C4161C; color:#fff;border-radius:2px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <h4 class="page-title">Description</h4> -->
                            <textarea class="m-t-30 form-control" name = "descriptionarea" style = "height:200px;">{{$description}}</textarea>
                           <div class = "row m-t-30">
                        
                                <div class = "col-sm-9">
                                    <h4 class="page-title m-t-30">Contact Numbers</h4>
                                    <div class = "col-sm-4 m-t-30">
                                        <!-- <p> </p> -->
                                        <textarea class = "form-control" name = "numberarea" style = "height:100px;">{{$contactnumber}}</textarea>
                                    </div>
                                    <div class = "col-sm-4 m-t-30">
                                    <textarea class = "form-control" name = "text" style = "height:100px;">{{$extratext}}</textarea>
                                        
                                    </div>
                                </div>
                                
                                <!-- <div class = "col-sm-2 m-t-30 pull-right">
                                    
                                    <button class="btn btn-block btn-outline btn-rounded btn-info pull-right">Get Support</button>
                                    
                                </div> -->
                            </div>
                            
                           
                        </div>    
                    </div>
                   
                </div>
               
                </form>
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
            <?php $isEdit = true;?>
           
            // window.location = "/contactsupport";
            
        }
    </script>
</body>
</html>
