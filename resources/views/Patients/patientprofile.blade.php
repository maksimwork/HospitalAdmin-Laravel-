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

    <style>
        .wrapper {
            text-align:center;
        }
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



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Manage Patient</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Manage Patient</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box" style = "display:flex">
                            
                           
                            <h4 class="page-title">{{$patient->patientfirstname}}  {{$patient->patientlastname}}</h4> 
                            <!-- <button type="button" class="btn btn-primary">Primary</button> -->
                            <div class="col-md-6 col-md-push-8">
                                <a href = "/patienteditprofile/{{$patient->id}}" class="btn  btn-success" style = " background-color:#0095D4;border-raidus:2px;color:#FFF;">Edit Profile</a>
                                <button type="button" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;" class="btn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                
                    <div class="col-md-9 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->patientname}}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->patientmobile}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->patientemail}}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-6 b-r"> <strong>PID</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->id}}-{{$date}}</p>
                                        </div>
                                        <div class="col-md-2 col-xs-6"> <strong>File Number</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->patientfilenumber}}</p>
                                        </div>
                                        <!-- <div class="col-md-3 col-xs-6"> <strong>Disease</strong>
                                            <br>
                                            <p class="text-muted">Fever</p>
                                        </div> -->
                                    </div>
                                    <div style = "display:flex">
                                        <div style = "width:50%;">
                                            @if($patient->patientsalutation)        
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Salutation:</p>
                                                    <p class="m-t-10 ">{{$patient->patientsalutation}}</p>
                                            
                                            @endif
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">First Name:</p> 
                                                    <p class="m-t-10 ">{{$patient->patientfirstname}}</p>
                                           
                                           
                                                    <p class="m-t-10" style = "font-weight:bold">Last Name:</p>
                                                    <p class="m-t-10 ">{{$patient->patientlastname}}</p>
                                          
                                            @if($patient->patientfilenumber) 
                                           
                                                    <p class="m-t-10" style = "font-weight:bold">File Number:</p>
                                                    <p class="m-t-10 ">{{$patient->patientfilenumber}}</p>
                                          
                                            @endif
                                            @if($patient->patientDOB) 
                                           
                                                    <p class="m-t-10" style = "font-weight:bold">DOB:</p>
                                                    <p class="m-t-10 ">{{$patient->patientDOB}}</p>
                                           
                                            @endif
                                            @if($patient->patientmartialstatus) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Martial Status:</p>
                                                    <p class="m-t-10 ">{{$patient->patientmartialstatus}}</p>
                                           
                                            @endif
                                            @if($patient->patientgen) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Gender:</p>
                                                    <p class="m-t-10 ">{{$patient->patientgen}}</p>
                                           
                                            @endif
                                            @if($patient->patientoccupation) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Occupation:</p>
            
                                                    <p class="m-t-10 ">{{$patient->patientoccupation}}</p>
                                           
                                            @endif
                                            @if($patient->patientaddress) 
                                            <!-- <div style = "display:flex;">
                                                    <p class="m-t-10">Mobile:</p>
                                                    <p class="m-t-10 m-l-5">{{$patient->patientmobile}}</p>
                                            </div>
                                            <div style = "display:flex;">
                                                    <p class="m-t-10">Email:</p>
                                                    <p class="m-t-10 m-l-5">{{$patient->patientemail}}</p>
                                            </div> -->
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Address:</p>
                                                    <p class="m-t-10 ">{{$patient->patientaddress}}</p>
                                            
                                            @endif
                                            @if($patient->patientcity) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Residence City:</p>
                                                    <p class="m-t-10 ">{{$patient->patientcity}}</p>
                                            
                                            @endif
                                            @if($patient->patientcountry) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Country:</p>
                                                    <p class="m-t-10 ">{{$patient->patientcountry}}</p>
                                           
                                            @endif
                                            @if($patient->patientnationality) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Nationality:</p>
                                                    <p class="m-t-10 ">{{$patient->patientnationality}}</p>
                                            
                                            @endif
                                            @if($patient->patienttherapist) 
                                            
                                                    <p class="m-t-10" style = "font-weight:bold">Therapist:</p>
                                                    <p class="m-t-10 ">{{$patient->patienttherapist}}</p>
                                            
                                            @endif
                                                    
                                            
                                        </div>
                                        <div style = "width:50%;">
                                            <h4 class="m-t-30">Exercise History</h4>
                                            <table>
                                                <tr>
                                                    <th style = "width:32%;font-weight:bold;">Exercise Title</th>
                                                    <th style = "width:25%;font-weight:bold;">Therapist</th>
                                                    <th style = "width:25%;font-weight:bold;">Given on</th>
                                                    <th style = "width:25%;font-weight:bold;">Expire On</th>
                                                    
                                                </tr>
                                                @foreach($shareexercise as $share )
                                                <tr>
                                                        <td>{{$share->exercise}}</td>
                                                        <td>{{$share->adminname}}</td>
                                                        <td>{{$share->given_date}}</td>
                                                        <td>{{$share->expire_date}}</td>                                                    
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                            <!-- <hr>
                                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                                            <!-- <h4 class="m-t-30">Exercise History</h4> -->
                                            <!-- <hr>
                                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                                    </div>
                                    
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="white-box">
                            
                            <div class="user-bg"> <img width="66%" height="100%" style = "margin-left:17%; border-radius:100%;" alt="user" id ="preview" src={{$patient->filelink}}> </img> </div>
                            <div class="user-btm-box">
                                <!-- .row -->
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Portal Access:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="switch" style = "vertical-align: middle;">
                                            <input type="checkbox" class="portalaccess" 
                                                        @if($patient->portal == 1)
                                                            checked
                                                        @else
                                                        @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                <input type="hidden" class="portalid" value={{$patient->id}}>
                                
                                </div>

                                <hr>
                                <div class="row text-center m-t-10">
                                    <!-- <p>Access expires on: April 30,2018</p> -->
                                    <p>Registered on: March 30,2018</p>
                                </div>
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>System Role:</strong> &nbsp;Patient
                                        <!-- <p>Patient</p> -->
                                    </div>
                                </div>
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class = "resetportal">Reset Portal Password</a>
                                        <!-- URL::route('logout') -->
                                    </div>
                                </div>
                                
                                <hr>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
                <form class="form-horizontal" method="GET" action="/patientforgotpassword">
                    {{ csrf_field() }}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style = "width:380px;">
                                <div class="modal-header wrapper">
                                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                                </div>
                                
                                    <input type="hidden" id="email" type="email" class="form-control" name="email" value="{{ $patient->patientemail }}">
                                    
                                
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
    $(document).on("click", ".openModal", function () {
        var id=$(this).attr('id');
        $(".modal-body #deleteModal").attr("href", "/physiodelete/"+id);
    });
    $('.portalaccess').click(function(){
        var index = $('.portalid').val();
        
        location.href= "/updateportalaccess/" + index;
    });
   
</script>
</html>
