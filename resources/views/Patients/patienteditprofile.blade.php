@include('head')

<body onload = "load('{{$patient->patientcountry}}', '{{$patient->patientnationality}}')">
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
            <form class="form-material form-horizontal" action="/patientinfo"  method="POST" accept-charset="UTF-8" enctype = "multipart/form-data">
            {{ csrf_field() }}
            <!-- <form class="form-material form-horizontal" action="/patientinfo" accept-charset="UTF-8" method="POST" enctype = "multipart/form-data"> -->
                <input type="hidden" id="example-text" name="previousname" class="form-control" value='{{$patient->patientname}}'>
                <input type="hidden" id="example-text" name="previousindex" class="form-control" value={{$patient->id}}>
                <input type="hidden" id="example-text" name="previousmobile" class="form-control" value={{$patient->patientmobile}}>
                <input type="hidden" id="example-text" name="previousemail" class="form-control" value={{$patient->patientemail}}>
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
                            
                           
                            <h4 class="page-title">{{$patient->patientfirstname}} {{$patient->patientlastname}}</h4> 
                            <!-- <button type="button" class="btn btn-primary">Primary</button> -->
                            <div class="col-md-6 col-md-push-8">
                                <button type="submit" class="btn btn-success" style = "border-radius:2px;color:#fff; background-color:#08d206">Save</button>
                                <a href = "/patientprofile/{{$patient->id}}" class="btn"style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;">Cancel</a>
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
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->patientmobile}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->patientemail}}</p>
                                        </div>



                                        
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>PID</strong>
                                            <br>
                                            <p class="text-muted">{{$patient->id}}-{{$date}}</p>
                                        </div>
                                        <!-- <div class="col-md-3 col-xs-6"> <strong>Disease</strong>
                                            <br>
                                            <p class="text-muted">Fever</p>
                                        </div> -->
                                    </div>
                                    <div style = "display:flex">
                                        <div style = "width:50%;">
                                            <div style = "width:60%">
                                            <!-- <h4 class="m-t-30">Patient Profile</h4> -->
                                            
                                                <p class="m-t-5 m-r-5">Salutation:</p>
                                                <select class="form-control selectpicker" name = "salutation" style = "height:30px;" data-live-search="true">
                                                    <option @if($patient->patientsalutation == "Dr") selected @endif >Dr</option>
                                                    <option @if($patient->patientsalutation == "Mr") selected @endif >Mr</option>
                                                    <option @if($patient->patientsalutation == "Mrs") selected @endif >Mrs</option>
                                                    <option @if($patient->patientsalutation == "Miss") selected @endif >Miss</option>
                                                    <option @if($patient->patientsalutation == "Ms") selected @endif >Ms</option>
                                                    <option @if($patient->patientsalutation == "Sir") selected @endif >Sir</option>
                                                </select>
                                           
                                            
                                                <p class="m-t-5 m-r-5">First Name:</p>
                                                <input class="form-control" type="text" placeholder = "" id="firstname" name = "firstname" style="height:30px" value = {{$patient->patientfirstname}}>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Last Name:</p>
                                                <input class="form-control" type="text" placeholder = "" id="lastname" name = "lastname" style="height:30px"required value = {{$patient->patientlastname}}>
                                            
                                                <p class="m-t-5 m-r-5">File Number:</p>
                                                <input class="form-control" type="text" placeholder = "" id="filenumber" name = "filenumber" style="height:30px" value = {{$patient->patientfilenumber}}>
                                                <!-- <p class="m-t-5 m-r-5">PID:</p>
                                                <input class="form-control" type="text" placeholder = "" id="pid" style="height:30px"required> -->
                                            
                                            
                                                <p class="m-t-5 m-r-5">DOB:</p>
                                                <input class="form-control mydatepicker" type="text" id="bdate" name="DOB" tyle="height:30px" placeholder="enter date" value = {{$patient->patientDOB}}>
                                            

                                            
                                                <p class="m-t-5 m-r-5">Martial Status:</p>
                                                <select class="form-control selectpicker" name="martialstatus" style = "height:30px;" data-live-search="true" value = {{$patient->patientmartialstatus}}>
                                                    <option @if($patient->patientmartialstatus == "Married") selected @endif >Married</option>
                                                    <option @if($patient->patientmartialstatus == "Widowed") selected @endif >Widowed</option>
                                                    <option @if($patient->patientmartialstatus == "Separated") selected @endif >Separated</option>
                                                    <option @if($patient->patientmartialstatus == "Single") selected @endif >Single</option>
                                                    <option @if($patient->patientmartialstatus == "Divorced") selected @endif >Divorced</option>
                                                   
                                                </select>
                                           
                                            
                                                <p class="m-t-5 m-r-5">Gender:</p>
                                                <!-- <select style = "height:30px;"> -->
                                                <select class="form-control selectpicker" name="gender" style = "height:30px;" data-live-search="true" value = {{$patient->patientgen}}>
                                                    
                                                    <option @if($patient->patientgen == "Male") selected @endif >Male</option>
                                                    <option @if($patient->patientgen == "Female") selected @endif>Female</option>
                                                </select>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Occupation:</p>
                                                <input class="form-control" type="text" name = "occupation" placeholder = "" id="occupation" style="height:30px" value = {{$patient->patientoccupation}}>
                                          
                                            
                                                <p class="m-t-5 m-r-5">Mobile:</p>
                                                <input class="form-control" type="text" name = "mobile" placeholder = "" id="mobile" style="height:30px" value = {{$patient->patientmobile}}>
                                           
                                            
                                                <p class="m-t-5 m-r-5">Email:</p>
                                                <input class="form-control" type="text" name = "email" placeholder = "" id="email" style="height:30px"required value = {{$patient->patientemail}}>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Address:</p>
                                                <input class="form-control" type="text" name = "address" placeholder = "" id="address" style="height:30px" value = {{$patient->patientaddress}}>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Residence City:</p>
                                                <input class="form-control" type="text" name = "city" placeholder = "" id="residencecity" style="height:30px" value = {{$patient->patientcity}}>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Country:</p>
                                                <!-- <select style = "height:30px;"> -->
                                                <select class="form-control selectpicker" name = "country" id = "countrylist" style = "height:30px;" data-live-search="true" value = {{$patient->patientcountry}}>
                                                @include('countrypicker')
                                                </select>
                                            
                                            
                                                <p class="m-t-5 m-r-5">Nationality:</p>
                                                <select class="form-control selectpicker" name = "nationality" id = "nationality" style = "height:30px;" data-live-search="true" value = {{$patient->patientnationality}}>
                                                <!-- <select style = "height:30px;"> -->
                                                @include('countrypicker')
                                                </select>
                                            
                                            <!-- <div style="display:flex;"> -->
                                                <p class="m-t-5 m-r-5">Therapist:</p>
                                                <select class="form-control selectpicker" name = "therapist" style = "height:30px;" data-live-search="true" value = {{$patient->patienttherapist}}>
                                                    @foreach($employee as $item)
                                                        <option @if($patient->patienttherapist == $item->employeename) selected @endif >{{$item->employeename}}</option>
                                                    @endforeach
                                                    
                                                   
                                                </select>
                                            
                                            
                                            
                                        </div>
                                        </div>
                                        <!-- <div style = "width:40%;"> -->
                                            <!-- <h4 class="m-t-30">Exercise History</h4> -->
                                            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p> -->
                                            <!-- <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                                        <!-- </div> -->
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
                            
                            <div class="user-bg">
                                <img width="64%" height="100%" alt="user" id ="preview" style = "margin-left:17%;border-radius:100%;" src={{$patient->filelink}}> </img>                                
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
                                    <p>Registered on: March 30,2018</p>
                                </div>
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>System Role:</strong> &nbsp;Patient
                                        <!-- <p>Patient</p> -->
                                    </div>
                                </div>
                                <!-- <hr>
                                <!-- <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <a href={{URL::route('logout')}} class = "resetportal">Reset Portal Password</a> -->
                                        <!-- URL::route('logout') -->
                                    <!-- </div>
                                </div> -->
                                
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
        
        location.href= "/updateportalaccess/" + index;
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
