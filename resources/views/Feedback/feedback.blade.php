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
             <form class = "" action="/submitfeedback" accept-charset="UTF-8" method="POST">
             {{ csrf_field() }}
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Contact Support</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Hospital</a></li>
                            <li class="active">Feedback</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h4 class="page-title" >Please Give Feedback</h4> 
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class = "row">
                                <h4 class="page-title">Write feedback here ... </h4>

                                <div class="form-group m-t-30 ">
                                    
                                    <textarea class="textarea_editor form-control"  name="content" id="content" rows="15"></textarea>
                                </div>
                                <!-- <div class="form-group">
                                        <label class="col-md-12" for="example-text">Email</span></label>
                                        <div class="col-md-12">
                                            <input type="email" id="example-text" name="emailfield" class="form-control" placeholder="enter email address">
                                        </div>
                                    </div> -->
                                <div class="col-lg-2 col-sm-4 col-xs-12 pull-right m-t-30">
                                    
                                    <button type = "submit" class="btn btn-block btn-outline btn-rounded btn-success pull-right" >Submit Feedback</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style = "width:380px;">
                                <div class="modal-header wrapper">
                                    <h5 class="modal-title" id="exampleModalLabel" style = "text-align:center">Receive Feedback Successfully</h5>
                                </div>
                                
                                    
                                
                                <div class="modal-footer wrapper" style = "text-align:center;">
                                    
                                    <button type="type"  data-dismiss="modal" aria-label="Close" class="btn" style = "background-color:#0095D4;color:#fff;">Confirm</button>
                                </div>
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
</body>
</html>

<script>
$(document).ready(function() {
        var temp = <?php echo $temp ?>;
        // alert(temp);
        if(temp == 1){
            $('#exampleModal1').modal('show');
        }
        
    });
</script>