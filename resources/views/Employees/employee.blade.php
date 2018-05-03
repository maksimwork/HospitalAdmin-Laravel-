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
                        <h4 class="page-title">Manage Employees</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Hospital</a></li>
                            <li class="active">Employee</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            
                            <div class="table-responsive m-t-40">
                                <table class="table borderlesstable">
                                    <tbody>
                                        <tr class = "head" style = "background-color:rgb(245, 245, 245);">
                                            <td class="text-center">
                                                <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                    <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"> </label>
                                                </div>
                                            </td>
                                            <td>Employee Name</td>
                                            <td>Email</td>
                                            <td>Mobile</td>
                                            <td >
                                                <input type="text" placeholder="Search..." > <a href="javascript:void(0);">&nbsp;<i class="fa fa-search"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href = {{ URL::route('employeeadd') }} class="btn btn-block btn-success" style = "width:100px; float:right; background-color:#08d206;color:#FFF;">Add New</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" alt="alert" class="btn btn-block btn-danger" id="sa-warning" style = "width:100px;">Bulk Delete</a>
                                            </td>
                                            
                                        </tr>
                                        
                                        <tr class = "head">
                                            <td class="text-center">
                                                <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                    <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                                    <label for="inputSchedule"> </label>
                                                </div>
                                            </td>
                                            <td>Yoga Area</td>
                                            <td>vla.genya@mail.ru</td>
                                            <td>+7638360885</td>
                                            <td>                                           
                                            </td>
                                            <td class="text-center">
                                                <a href = {{ URL::route('employeeedit') }} class="btn btn-block btn-info" style = "width:100px; float:right; background-color:#0095D4; border-raidus:2px;color:#FFF;">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-block" style = "width:100px;background-color:#C4161C; color:#fff; border-radius:2px;">Delete</button>
                                            </td>
                                        </tr>
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
</html>
