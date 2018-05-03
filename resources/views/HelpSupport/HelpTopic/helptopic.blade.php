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
                        <h4 class="page-title">Help Topic</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Help & Support</a></li>
                            <li class="active">Help Topic</li>
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
                                                <!-- <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                    <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"> </label>
                                                </div> -->
                                            </th>
                                            <th>Topic</th>
                                            @if(Auth::user()->privillege == 1)
                                            <th>Patient Access</th>
                                            @endif
                                            <th>
                                                <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">&nbsp;<i class="fa fa-search"></i> -->
                                                <form role="search" class="app-search hidden-xs">
                                                    <input type="text" placeholder="Search..." class="form-control" id="myInput" style="margin-top:0;" onkeyup="myFunction()">
                                                </form>
                                            </th>
                                            <th class="text-center">
                                                @if($permission_result[4]->add == "1")
                                                <a href = {{ URL::route('helpadd') }} class="btn btn-block btn-success" style = "width:100px; float:right; background-color:#08d206;color:#FFF;">Add New</a>
                                                @endif
                                            </th>
                                            <th class="text-center">
                                                <!-- <a href="#" alt="alert" class="btn btn-block btn-danger" id="sa-warning" style = "width:100px;">Bulk Delete</a> -->
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($topic->reverse() as $topicitem)

                                        <tr class = "head" style="cursor: pointer;">
                                            <td class="text-center">
                                                <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                    <!-- <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"> </label> -->
                                                </div>
                                            </td @if($permission_result[1]->edit == "1") class = "clickable" @endif>
                                            <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>{{$topicitem->topictitle}}</td>
                                            @if(Auth::user()->privillege == 1)
                                                @if($topicitem->topicaccess == 0)
                                                    <td>No</td>
                                                @elseif($topicitem->topicaccess == 1)
                                                    <td>Yes</td>
                                                @endif
                                            @endif
                                            <input type ="hidden" class = "cellindex" value={{$topicitem->id}}>
                                            <td @if($permission_result[1]->edit == "1") class = "clickable" @endif>
                                                
                                            </td>
                                            <td class="text-center">
                                                @if($permission_result[4]->edit == "1")
                                                <a href = "/helpedit/{{$topicitem->id}}" class="btn btn-block btn-info" style = "width:100px; float:right; background-color:#0095D4; border-raidus:2px;color:#FFF;">Edit</a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($permission_result[4]->delete == "1")
                                                <a href = "#" id = {{$topicitem->id}} data-toggle="modal" data-target="#exampleCategoryModal" class="openModal btn btn-block" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;" >Delete</button>
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
       
       location.href =  "/helpview/" + nameText;
       
   });
$(document).on("click", ".openModal", function () {
        var id=$(this).attr('id');
        
        $(".modal-body #deleteModal").attr("href", "/helpdelete/"+id);
    });
    $(document).ready(function () {
        $('#myTable').DataTable();
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

// $('.head').on('click', function (event) {
//     // alert($(this).children('.patientname').text());
//     var nameText = $(this).children('.cellindex').val();
//     location.href =  "/helpview/" + nameText;
// });
</script>

</html>
