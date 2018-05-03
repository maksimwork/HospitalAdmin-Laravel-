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
                        <h4 class="page-title">Manage Therapists</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Hospital</a></li>
                            <li class="active">Therapists</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            
                            <div class="table-responsive m-t-40">
                                <table class="table borderlesstable table-hover" id="myTable">
                                    <thead>
                                        <tr style = "background-color:rgb(245, 245, 245);">
                                            <th class="text-center">
                                            
                                            </th>
                                            <th>Physio Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th >
                                                <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> &nbsp;<i class="fa fa-search"></i> -->
                                                <form role="search" class="app-search hidden-xs">
                                                    <input type="text" placeholder="Search..." class="form-control" id="myInput" style="margin-top:0;" onkeyup="myFunction()">
                                                </form>
                                            </th>
                                            <th class="text-center">
                                                @if($permission_result[2]->add == "1")

                                               <button type="button" class="btn btn-block btn-success text-center"  data-toggle="modal" data-target="#exampleModal" style = "width:140px;background-color:#08d206;color:#FFF; float:right;">
                                                Add Therapists
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-body">
                                                            <form class="form-material form-horizontal" action="/physioaddaction" accept-charset="UTF-8">
                                                                    <div class="form-group">
                                                                        <label class="col-md-12" style = "text-align:left;" for="example-text">Physio First Name</span></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="example-text" name="namefield1" class="form-control" placeholder="enter  first name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-12" style = "text-align:left;" for="example-text">Physio Last Name</span></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="example-text" name="namefield2" class="form-control" placeholder="enter  last name" required = "required">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label class="col-md-12" style="text-align:left;" for="example-text">Email</span></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="example-text" name="emailfield" class="form-control" placeholder="enter email address" required = "required">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-12" style = "text-align:left;" for="example-text">Mobile</span></label>
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="example-text" name="mobilefield" class="form-control" placeholder="enter mobile number">
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                                                <button type="button"class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                                                </form>    
                                                            
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
                                        @foreach ($physio->reverse() as $physioitem)

                                            <tr @if($permission_result[2]->edit == "1") class = "head" @endif style="cursor: pointer;">
                                                <td class="text-center">
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                       
                                                    </div>
                                                </td>
                                                <input type ="hidden" class = "cellindex" value={{$physioitem->id}}>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$physioitem->employeename}}</td>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$physioitem->employeeemail}}</td>
                                                <td @if($permission_result[1]->edit == "1") class = "clickable" @endif> {{$physioitem->employeemobile}}</td>
                                                <td  
                                                    @if($permission_result[1]->edit == "1") class = "clickable" @endif>                                           
                                                </td>
                                                <td class="text-center">
                                                    @if($permission_result[2]->edit == "1")
                                                    <a href = "/physioedit/{{$physioitem->id}}" class="btn btn-block btn-info" style = "width:100px; float:right; background-color:#0095D4; border-raidus:2px;color:#FFF;">Edit</a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($permission_result[2]->delete == "1")
                                                    <a href = "#"  id = {{$physioitem->id}}  class="openModal btn btn-blockr"  style = "float:left; width:100px;background-color:#C4161C; color:#fff;border-radius:2px;" data-toggle="modal" data-target="#exampleCategoryModal">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                        </tbody>
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
       
       location.href =  "/physioprofile/" + nameText;
       
   });
   $(document).on("click", ".openModal", function () {
        var id=$(this).attr('id');
        $(".modal-body #deleteModal").attr("href", "/physiodelete/"+id);
    });
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
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
