@include('head')
    <style>
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input {display:none;}

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>
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
                        <h4 class="page-title">Manage Physio</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Manage Physio</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div style = "display:flex;" class="white-box">                            
                            <h4 class="page-title">{{$physio->employeefirstname}} {{$physio->employeelastname}}</h4> 

                            <div class="col-md-6 col-md-push-8">
                                <a href = "/physioeditprofile/{{$physio->id}}" class="btn"style = " background-color:#0095D4;border-raidus:2px;color:#FFF;">Edit Profile</a>
                                <button type="button" class="btn" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                
                    <div class="col-md-9 col-xs-12">
                        <div class="white-box">
                          
                            <div class="tab-content">
                                
                                <!-- .tabs 2 -->
                                <div class="tab-pane active" id="biography">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-6 b-r"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">{{$physio->employeename}}</p>
                                        </div>
                                        <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted">{{$physio->employeemobile}}</p>
                                        </div>
                                        <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{$physio->employeeemail}}</p>
                                        </div>
                                       
                                    </div>
                                    <hr>
                                    <div style = "width:60%;">
                                            <!-- <h4 class="m-t-30">Patient Profile</h4> -->
                                            @if($physio->employeesalutation)        
                                            
                                            <p class="m-t-10"  style = "font-weight:bold;">Salutation:</p>
                                            <p class="m-t-10 m-l-5">{{$physio->employeesalutation}}</p>
                                           
                                            @endif
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">First Name:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeefirstname}}</p>
                                           
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Last Name:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeelastname}}</p>
                                            
                                            @if($physio->employeeDOB)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">DOB:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeeDOB}}</p>
                                            
                                            @endif
                                            @if($physio->employeemartialstatus)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Martial Status:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeemartialstatus}}</p>
                                           
                                            @endif
                                            @if($physio->employeegen)    
                                           
                                                <p class="m-t-10"  style = "font-weight:bold">Gender:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeegen}}</p>
                                            
                                            @endif
                                            @if($physio->employeeoccupation)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Occupation:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeeoccupation}}</p>
                                           
                                            @endif
                                            @if($physio->employeemobile)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Mobile:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeemobile}}</p>
                                            
                                            @endif
                                            @if($physio->employeeemail)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Email:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeeemail}}</p>
                                            
                                            @endif
                                            @if($physio->employeeaddress)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Address:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeeaddress}}</p>
                                            
                                            @endif
                                            @if($physio->employeecity)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Residence City:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeecity}}</p>
                                            
                                            @endif
                                            @if($physio->employeecountry)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Country:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeecountry}}</p>
                                            
                                            @endif
                                            @if($physio->employeenationality)    
                                            
                                                <p class="m-t-10" style = "font-weight:bold">Nationality:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeenationality}}</p>
                                            
                                            @endif
                                            @if($physio->employeedepartment)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Department:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeedepartment}}</p>
                                            
                                            @endif
                                            @if($physio->employeeDHA)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">DHA License NO:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeeDHA}}</p>
                                                
                                                @endif
                                                @if($physio->employeespecialization)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Specialization:</p>   
                                                <p class="m-t-10 m-l-5">{{$physio->employeespecialization}}</p>
                                          
                                            @endif
                                            @if($physio->employeeexperience)                                            
                                            
                                            <p class="m-t-10"  style = "font-weight:bold">Experience:</p>

                                            <p class="m-t-10 m-l-5">{{$physio->employeeexperience}}</p>
                                            
                                            @endif
                                            @if($physio->employeeeducation)    
                                            
                                                <p class="m-t-10"  style = "font-weight:bold">Education:</p>
                                                <p class="m-t-10 m-l-5">{{$physio->employeeeducation}}</p>
                                            
                                            @endif
                                            
                                        </div>
                                    
                                </div>
                                <!-- /.tabs2 -->
                                <!-- .tabs 3 -->
                                <div class="tab-pane" id="update">
                                    <form class="form-material form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-12" for="example-text">Name</span></label>
                                        <div class="col-md-12">
                                            <input type="text" id="example-text" name="example-text" class="form-control" placeholder="enter your name" value="Evgeny">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12" for="bdate">Date of Birth</span></label>
                                        <div class="col-md-12">
                                            <input type="text" id="bdate" name="bdate" class="form-control mydatepicker" placeholder="enter your birth date" value="12/10/2017">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Gender</label>
                                        <div class="col-sm-12">
                                            <select class="form-control">
                                                <option>Select Gender</option>
                                                <option selected="selected">Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Profile Image</label>
                                        <div class="col-sm-12">
                                            <img class="img-responsive" src="../plugins/images/big/d2.jpg" alt="" style="max-width:120px;">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="special">Speciality</span></label>
                                        <div class="col-md-12">
                                            <input type="text" id="special" name="special" class="form-control" placeholder="e.g. Dentist" value="Neurosurgeon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Description</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn"  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                </form>
                                </div>
                                <!-- /.tabs 3 -->                          
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="white-box">
                        <div class="user-bg"> <img width="64%" height="100%" style = "margin-left:18%; border-radius:50%;" alt="user" id ="preview" src={{$physio->filelink}}> </img> </div>
                            <div class="user-btm-box">
                                <!-- .row -->
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Portal Access:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="switch" style = "vertical-align: middle;">
                                            <input type="checkbox" class="portalaccess" 
                                                        @if($physio->portal == 1)
                                                            checked
                                                        @else
                                                        @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" class="portalid" value={{$physio->id}}>

                                </div>

                                <hr>
                                
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>System Role:</strong> &nbsp;Physiotherapist
                                        <!-- <p>Patient</p> -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class = "resetportal">Reset Portal Password</a>
                                    </div>
                                </div>

                                <hr>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <form class="form-horizontal" method="GET" action="/physioforgotpassword">
                    {{ csrf_field() }}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style = "width:380px;">
                                <div class="modal-header wrapper">
                                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                                </div>
                                
                                    <input type="hidden" id="email" type="email" class="form-control" name="email" value="{{ $physio->employeeemail }}">
                                    
                                
                                <div class="modal-footer wrapper" style = "text-align:center;">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    
                                    <button type="submit" class="btn btn-primary">Confirm & Send Reset Password</button>
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
<script>
    $('.portalaccess').click(function(){
        var index = $('.portalid').val();
        
        location.href= "/updatephysioaccess/" + index;
    });
</script>
</html>
