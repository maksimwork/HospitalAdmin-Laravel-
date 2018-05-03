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
                        <h4 class="page-title">Edit Patient</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Edit Patient</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class="form-material form-horizontal" action="/patienteditaction" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Patient First Name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="namefield1" class="form-control" value={{$patient->patientfirstname}} required>
                                        <input type="hidden" id="example-text" name="previousname" class="form-control" value='{{$patient->patientname}}'>
                                        <input type="hidden" id="example-text" name="index" class="form-control" value={{$patient->id}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Patient Last Name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="namefield2" class="form-control" value={{$patient->patientlastname}} required>
                                        <!-- <input type="hidden" id="example-text" name="previousname" class="form-control" value={{$patient->patientname}}> -->
                                        <input type="hidden" id="example-text" name="index" class="form-control" value={{$patient->id}}>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Email</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="emailfield" class="form-control" value={{$patient->patientemail}} required>
                                        <input type="hidden" id="example-text" name="previousemail" class="form-control" value={{$patient->patientemail}}>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Mobile</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="mobilefield" class="form-control" value={{$patient->patientmobile}} required>
                                        <input type="hidden" id="example-text" name="previousmobile" class="form-control" value={{$patient->patientmobile}}>
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
