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
                        <h4 class="page-title">Manage Exercise Category</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Manage Categories</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                        
                            <div class="table-responsive m-t-40">
                                <table class="table borderlesstable" id="myTable">
                                    <thead>
                                        <tr class = "head" style = "background-color:rgb(245, 245, 245);">
                                            <th class="text-center">
                                                <!-- <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                    <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"> </label>
                                                </div> -->
                                            </th>
                                            <th>Category Title</th>    
                                            <th>
                                                <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> &nbsp;<i class="fa fa-search"></i> -->
                                                <form role="search" class="app-search hidden-xs">
                                                    <input type="text" placeholder="Search..." class="form-control" id="myInput" style="margin-top:0;" onkeyup="myFunction()">
                                                </form>
                                            </th>
                                            <th class="text-center">
                                                <!-- <a href = {{ URL::route('categoryadd') }} class="btn btn-block btn-success" style = "width:100px; float:right;">Add New</button> -->
                                                <button type="button" class="btn btn-block btn-success"  data-toggle="modal" data-target="#exampleModal" style = "width:120px; background-color:#08d206; color:#FFF; float:right;">
                                                Add Category
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-body">
                                                            <form class="form-material form-horizontal" action="/categoryaddaction" accept-charset="UTF-8">
                                                                <div class="form-group">
                                                                    <label  class="col-md-12" style = "text-align:left;" for="example-text">Category Title</span></label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" id="titlefield" name="titlefield" class="form-control" placeholder="enter category title">
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                                                <button type="button"class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                                                            </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </th>
                                            <th class="text-center">
                                                <!-- <a href="#" alt="alert" class="btn btn-block btn-danger" id="sa-warning" style = "width:100px;">Bulk Delete</a> -->
                                            </th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($category->reverse() as $categoryitem)
                                            
                                            <tr class = "head">
                                                <td class="text-center">
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <!-- <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                        <label for="inputSchedule"> </label> -->
                                                    </div>
                                                </td>
                                                <td>{{$categoryitem->categorytitle }}</td>
                                                
                                                <td ></td>
                                                <td class="text-center">
                                                    <a href = "/categoryedit/{{$categoryitem->id}}" class="btn btn-block btn-info" style = "width:100px; float:right; background-color:#0095D4; border-raidus:2px;color:#FFF;"    >Edit</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href = "/categorydelete/{{$categoryitem->id}}" class="btn btn-block" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;">Delete</a>
                                                </td>
                                            
                                            </tr>
                                        @endforeach
                                        
                                        
                                        </tbody>
                                </table>
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
