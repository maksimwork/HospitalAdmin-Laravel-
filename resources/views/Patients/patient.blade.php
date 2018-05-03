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
                        <h4 class="page-title">Manage Patients</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Hospital</a></li>
                            <li class="active">Patients</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">

                            <div class="table table-responsive m-t-40">
                                
                                <form role="search" class="app-search hidden-xs" style = "width:300px;margin-bottom:25px;">
                                    <input type="text" placeholder="Search..." class="form-control" id="myInput" style="margin-top:0; background-color:rgb(245, 245, 245);" onkeyup="myFunction()">
                                </form>
                                
                                <table class="table borderlesstable table-hover" id="myTable">
                                    <thead>
                                        <tr style = "background-color:rgb(245, 245, 245);">
                                            <th class="text-center">
                                                <!-- <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                    <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"> </label>
                                                </div> -->
                                            </th>
                                            <th>Patient Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>PID</th>
                                            <th>File Number</th>
                                            <th class="text-center">
                                                @if($permission_result[1]->add == "1")
                                                <button type="button" class="btn btn-block btn-success text-center"  data-toggle="modal" data-target="#exampleModal" style = "width:120px; background-color:#08d206;color:#FFF; float:right;">
                                                Add Patient
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-body">
                                                            
                                                            <form class="form-material form-horizontal" action="/patientaddaction" accept-charset="UTF-8">
                                                                <div class="form-group">
                                                                    <label class="col-md-12" style = "text-align:left;" for="example-text">First Name</span></label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" id="example-text" name="namefield1" class="form-control" placeholder="enter first name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-12" style = "text-align:left;" for="example-text">Last Name</span></label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" id="example-text" name="namefield2" class="form-control" placeholder="enter last name" required ="required">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-12" style = "text-align:left;" for="example-text">Email</span></label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" id="example-text" name="emailfield" class="form-control" placeholder="enter email address" required ="required">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-12" style = "text-align:left;" for="example-text">Mobile</span></label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" id="example-text" name="mobilefield" class="form-control" placeholder="enter mobile number">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-12" for="example-text" style = "text-align:left;">File Number</span></label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" id="example-text" name="filenum" class="form-control" placeholder="enter file number">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <label class="col-md-12" for="example-text" style = "text-align:left;">Therapist</span></label>
                                                                    <select class="col-md-12  selectpicker form-material" name = "therapist"  data-live-search="true">
                                                                        @foreach($employee as $item)
                                                                            <option>{{$item->employeename}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn m-t-30"  style = "border-radius:2px;color:#fff; background-color:#08d206;" >Save</button>
                                                                <button type="button"class="btn m-t-30 btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                                            </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </th>
                                            <th class="text-center">
                                                <!-- <a href="#" alt="alert" class="btn btn-block btn-danger" id="sa-warning" style = "width:100px;">Bulk Delete</a> -->
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        
                                        @foreach ($patient->reverse() as $patientitem)

                                            <tr @if($permission_result[1]->edit == "1") class = "head" @endif style="cursor: pointer;">
                                                <td class="text-center">
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <!-- <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                        <label for="inputSchedule"> </label> -->
                                                    </div>
                                                </td>
                                                
                                                <input type ="hidden" class = "cellindex" value={{$patientitem->id}}>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif >{{$patientitem->patientname}}</td>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$patientitem->patientemail}}</td>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$patientitem->patientmobile}}</td>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$patientitem->id}}-{{$patientitem->PID}}</td>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$patientitem->patientfilenumber}}</td> 
                                                                                          
                                                <td class="text-center">
                                                    @if($permission_result[1]->edit == "1")
                                                    <a href = "/patientedit/{{$patientitem->id}}" class="btn btn-block btn-info" style = "width:100px; float:right; background-color:#0095D4; border-raidus:2px;color:#FFF;">Edit</a>
                                                    @endif
                                                </td>
                                                <td class="text-center extra" id = "1">
                                                    @if($permission_result[1]->delete == "1")
                                                    <a data-toggle="modal" data-target="#exampleCategoryModal" id = {{$patientitem->id}} class="openModal btn btn-block" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;" >Delete</a>
                                                    @endif
                                                </td>                                                                                            
                                            </tr>
                                            
                                        @endforeach
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class = "modal-header">
                                                            <div class="form-group">
                                                                <label  class="col-md-12" style = "text-align:center;" for="example-text">Are you sure to delete?</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                    
                                                            
                                                            <!-- <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button> -->
                                                            <div style = "display:flex; justify-content:space-between;">
                                                                <a href = "#" id = "deleteModal" class="btn btn-block btn-danger" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;">Yes</a>
                                                                <button type="button" style = "width:100px;" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal" >No</button>
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
</body>

<script>
    $('.clickable').on('click', function (event) {
       
       
        var nameText = $(this).siblings('.cellindex').val();
        
        location.href =  "/patientprofile/" + nameText;
        
    });
    $(document).on("click", ".openModal", function () {
        var id=$(this).attr('id');
        // alert(id);
        $(".modal-body #deleteModal").attr("href", "/patientdelete/"+id);
    });
    function keypress(idTxt){
        
   
    }
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            td1 = tr[i].getElementsByTagName("td")[2];
            td2 = tr[i].getElementsByTagName("td")[3];
            td3 = tr[i].getElementsByTagName("td")[4];
            td4 = tr[i].getElementsByTagName("td")[5];
            if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }

    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

</html>
