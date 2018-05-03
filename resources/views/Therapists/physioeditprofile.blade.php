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
<body onload = "load('{{$physio->employeecountry}}', '{{$physio->employeenationality}}')">
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
                <form class="form-material form-horizontal" action="/physioinfo"  method="POST" accept-charset="UTF-8" enctype = "multipart/form-data">
                {{ csrf_field() }}

                    <input type="hidden" id="example-text" name="previousname" class="form-control" value={{$physio->employeename}}>
                    <input type="hidden" id="example-text" name="previousindex" class="form-control" value={{$physio->id}}>
                    <input type="hidden" id="example-text" name="previousmobile" class="form-control" value={{$physio->employeemobile}}>
                    <input type="hidden" id="example-text" name="previousemail" class="form-control" value={{$physio->employeeemail}}>
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
                                    <button type="submit" class="btn btn-success" style = "border-radius:2px;color:#fff; background-color:#08d206">Save</button>
                                    <a href = "/physioprofile/{{$physio->id}}" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;"  class="btn">Cancel</a>
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
                                        <div style = "width:60%">
                                            <!-- <h4 class="m-t-30">Patient Profile</h4> -->
                                            
                                                <p class="m-t-5 m-r-5">Salutation:</p>
                                                <select class="form-control selectpicker" name="salutation"   style = "height:30px;" data-live-search = "true">
                                                    <option @if($physio->employeesalutation == "Dr") selected @endif>Dr</option>
                                                    <option @if($physio->employeesalutation == "Mr") selected @endif>Mr</option>
                                                    <option @if($physio->employeesalutation == "Mrs") selected @endif>Mrs</option>
                                                    <option @if($physio->employeesalutation == "Miss") selected @endif>Miss</option>
                                                    <option @if($physio->employeesalutation == "Ms") selected @endif>Ms</option>
                                                    <option @if($physio->employeesalutation == "Sir") selected @endif>Sir</option>
                                                </select>
                                        
                                            
                                                <p class="m-t-5 m-r-5">First Name:</p>
                                                <input class="form-control" type="text" placeholder = "" name = "firstname" id="firstname" style="height:30px" value = {{$physio->employeefirstname}}>
                                        
                                                <p class="m-t-5 m-r-5">Last Name:</p>
                                                <input    class="form-control" type="text" placeholder = "" id="lastname" name = "lastname" style="height:30px"required="required"value = {{$physio->employeelastname}}>
                                            
                                                <p class="m-t-5 m-r-5">DOB:</p>
                                                <input   class="form-control mydatepicker"  type="text" id="bdate" name="DOB" style="height:30px" placeholder="enter date" value = {{$physio->employeeDOB}}>
                                        
                                                <p class="m-t-5 m-r-5">Gender</p>
                                                <select class="form-control selectpicker" style = "height:30px;" name = "gen" data-live-search="true">
                                                    <option @if($physio->employeegen == "Male") selected @endif>Male</option>
                                                    <option @if($physio->employeegen == "Female") selected @endif>Female</option>
                                                    
                                                
                                                </select>
                                        
                                        
                                                <p class="m-t-5 m-r-5">Martial Status:</p>
                                                <select class="form-control selectpicker" name = "martialstatus"  style = "height:30px;"data-live-search="true">
                                                    <option @if($physio->employeemartialstatus == "Married") selected @endif>Married</option>
                                                    <option @if($physio->employeemartialstatus == "Widowed") selected @endif>Widowed</option>
                                                    <option @if($physio->employeemartialstatus == "Separated") selected @endif>Separated</option>
                                                    <option @if($physio->employeemartialstatus == "Single") selected @endif>Single</option>
                                                    <option @if($physio->employeemartialstatus == "Divorced") selected @endif>Divorced</option>
                                                
                                                </select>
                                            
                                            
                                            
                                        
                                                <p class="m-t-5 m-r-5">Mobile:</p>
                                                <input class="form-control" type="text" placeholder = "" name = "mobile" id="mobile" style="height:30px" value = {{$physio->employeemobile}}>
                                        
                                                <p class="m-t-5 m-r-5">Email:</p>
                                                <input class="form-control" type="text" placeholder = "" name = "email" id="email" style="height:30px" value = {{$physio->employeeemail}} required="required">
                                            
                                            
                                                <p class="m-t-5 m-r-5">Address:</p>
                                                <input class="form-control"  type="text" placeholder = "" name="address" id="address" style="height:30px" value = {{$physio->employeeaddress}}>
                                        
                                        
                                                <p class="m-t-5 m-r-5">City:</p>
                                                <input class="form-control"  type="text" placeholder = "" name = "city" id="city" style="height:30px" value = {{$physio->employeecity}}>
                                        
                                            
                                                <p class="m-t-5 m-r-5">Country:</p>
                                                <select  class="form-control selectpicker" name = "country" id = "countrylist"  style = "height:30px;"data-live-search="true">
                                                @include('countrypicker')
                                                </select>
                                            
                                                <p class="m-t-5 m-r-5">Nationality:</p>
                                                <select class="form-control selectpicker" name = "nationality" id = "nationality" style = "height:30px;"data-live-search="true">
                                                @include('countrypicker')
                                                </select>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Department:</p>
                                                <select class="form-control selectpicker" name = "department" style = "height:30px;"data-live-search="true">
                                                    <option @if($physio->employeedepartment == "Physiotherapy") selected @endif>Physiotherapy</option>
                                                    <option @if($physio->employeedepartment == "Rehabilitation") selected @endif>Rehabilitation</option>
                                                    <option @if($physio->employeedepartment == "Occupational therapy") selected @endif>Occupational therapy</option>
                                                
                                                </select>
                                                                                    
                                        
                                            
                                                
                                            
                                                <p class="m-t-5 m-r-5">DHA License NO</Li>:</p>
                                                <input class="form-control" type="text" placeholder = "" name = "DHA" id="license" style="height:30px" value = {{$physio->employeeDHA}}>
                                        
                                            
                                                <p class="m-t-5 m-r-5">Specialization:</p>
                                                <input class="form-control" type="text" placeholder = ""  id="specialization" name = "specialization" style="height:30px" value = {{$physio->employeespecialization}}>
                                            
                                                <p class="m-t-5 m-r-5">Experience:</p>
                                                <input  class="form-control" type="text" placeholder = "" id="experience" name = "experience" style="height:30px" value = {{$physio->employeeexperience}}>
                                            
                                                <p class="m-t-5 m-r-5">Education:</p>
                                                <input   class="form-control"  type="text" placeholder = "" id="education" name = "education" style="height:30px" value = {{$physio->employeeeducation}}>
                                                </div>
                                            
                                            
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
                                    
                                    <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light" >Cancel</button>
                                </div>
                                <!-- /.tabs 3 -->                          
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="white-box">
                                <div class="user-bg"> 
                                    <img width="65%" height="100%" style = "margin-left:18%; border-radius:50%;" alt="user" id ="preview" src={{$physio->filelink}}> </img>
                                    <!-- <img width="100%" alt="user" src="../plugins/images/big/d2.jpg">  -->
                                </div>
                                <div class="user-btm-box">
                                    <!-- .row -->
                                    <hr>
                                    <input id = "filetag"  type = "file" name = "uplode_image_file"  onchange="myFunction()"  required="required">
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
                                    <!-- <hr> -->
                                    <!-- <div class="row text-center m-t-10"> -->
                                        <!-- <div class="col-md-12"> -->
                                            <!-- <a href={{ URL::route('logout') }}>Reset Portal Password</a> -->
                                        <!-- </div> -->
                                    <!-- </div> -->

                                    <!-- <hr> -->
                                    
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
     var fileTag = document.getElementById("filetag"),
        preview = document.getElementById("preview");
        
    fileTag.addEventListener("change", function() {
    myFunction(this);
    });
    function myFunction(input){
        var reader;

        if (input.files && input.files[0]) {
            reader = new FileReader();

            reader.onload = function(e) {
            preview.setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.portalaccess').click(function(){
        var index = $('.portalid').val();
        
        location.href= "/updatephysioaccess/" + index;
    });
    function load($temp, $temp1){
       
       for($i = 0; $i <= 248; $i++){
        if(document.getElementById('countrylist').getElementsByTagName('option')[$i].value == $temp)
        {
            // alert(document.getElementById('countrylist').value);
            document.getElementById('countrylist').selectedIndex = $i;
            // alert(document.getElementById('countrylist').getElementsByTagName('option')[182].selected);
        }
        if(document.getElementById('nationality').getElementsByTagName('option')[$i].value == $temp1)
        {
            // alert(document.getElementById('countrylist').value);
            document.getElementById('nationality').selectedIndex = $i;
            // alert(document.getElementById('countrylist').getElementsByTagName('option')[182].selected);
        }
       }
   }
</script>
</html>
