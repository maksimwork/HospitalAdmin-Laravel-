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
                        <h4 class="page-title">Edit Role</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">System Management</a></li>
                            <li class="active">Edit Role</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                        <div class="table-responsive m-t-40">
                            <table class="table borderlesstable">
                                <thead>
                                    <tr style = "background-color:rgb(245, 245, 245);">
                                        <td style = "padding-left:30px">Module</td>
                                        <td>View</td>
                                        <td>Add</td>
                                        <td>Edit</td>
                                        <td >Delete</td>
                                        <td>Share</td>
                                    </tr>
                                </thead>
                                <tbody style="cursor: pointer;" >
                                    <input type="hidden" class="priv" value={{$roletype}}>

                                    @for($i = 0; $i < 7; $i ++)
                                        <tr class="head">
                                            @if($i == 0)
                                                <td style = "padding-left:30px">Library</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($library->view == 1) {{"checked"}} 
                                                                @elseif($library->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($library->add == 1) {{"checked"}} 
                                                                    @elseif($library->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($library->edit == 1) {{"checked"}} 
                                                                    @elseif($library->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($library->delete == 1) {{"checked"}} 
                                                                    @elseif($library->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($library->share == 1) {{"checked"}} 
                                                                    @elseif($library->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                            @elseif($i == 1)
                                                <td style = "padding-left:30px">Patients</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($patients->view == 1) {{"checked"}} 
                                                                @elseif($patients->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($patients->add == 1) {{"checked"}} 
                                                                    @elseif($patients->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($patients->edit == 1) {{"checked"}} 
                                                                    @elseif($patients->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($patients->delete == 1) {{"checked"}} 
                                                                    @elseif($patients->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($patients->share == 1) {{"checked"}} 
                                                                    @elseif($patients->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                            @elseif($i == 2)
                                                <td style = "padding-left:30px">Physiotherapists</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($physio->view == 1) {{"checked"}} 
                                                                @elseif($physio->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($physio->add == 1) {{"checked"}} 
                                                                    @elseif($physio->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($physio->edit == 1) {{"checked"}} 
                                                                    @elseif($physio->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($physio->delete == 1) {{"checked"}} 
                                                                    @elseif($physio->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($physio->share == 1) {{"checked"}} 
                                                                    @elseif($physio->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                            @elseif($i == 3)
                                                <td style = "padding-left:30px">Training</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($training->view == 1) {{"checked"}} 
                                                                @elseif($training->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($training->add == 1) {{"checked"}} 
                                                                    @elseif($training->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($training->edit == 1) {{"checked"}} 
                                                                    @elseif($training->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($training->delete == 1) {{"checked"}} 
                                                                    @elseif($training->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($training->share == 1) {{"checked"}} 
                                                                    @elseif($training->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                            @elseif($i == 4)
                                                <td style = "padding-left:30px">Help & Support</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($help->view == 1) {{"checked"}} 
                                                                @elseif($help->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($help->add == 1) {{"checked"}} 
                                                                    @elseif($help->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($help->edit == 1) {{"checked"}} 
                                                                    @elseif($help->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($help->delete == 1) {{"checked"}} 
                                                                    @elseif($help->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($help->share == 1) {{"checked"}} 
                                                                    @elseif($help->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                            @elseif($i == 5)
                                                <td style = "padding-left:30px">Feedback</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($feedback->view == 1) {{"checked"}} 
                                                                @elseif($feedback->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($feedback->add == 1) {{"checked"}} 
                                                                    @elseif($feedback->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($feedback->edit == 1) {{"checked"}} 
                                                                    @elseif($feedback->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($feedback->delete == 1) {{"checked"}} 
                                                                    @elseif($feedback->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($feedback->share == 1) {{"checked"}} 
                                                                    @elseif($feedback->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                            @elseif($i == 6)
                                                <td style = "padding-left:30px">System Management</td>
                                                <td >
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="view" type="checkbox" value={{$i}} 
                                                                @if($system->view == 1) {{"checked"}} 
                                                                @elseif($system->view == 0) {{""}} 
                                                                @endif>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="add" type="checkbox" value={{$i}}
                                                                    @if($system->add == 1) {{"checked"}} 
                                                                    @elseif($system->add == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="edit" type="checkbox" value={{$i}}
                                                                    @if($system->edit == 1) {{"checked"}} 
                                                                    @elseif($system->edit == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="delete" type="checkbox" value={{$i}}
                                                                    @if($system->delete == 1) {{"checked"}} 
                                                                    @elseif($system->delete == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="checkbox checkbox-info" style = "margin : 0 0;">
                                                        <input class="share" type="checkbox" value={{$i}}
                                                                    @if($system->share == 1) {{"checked"}} 
                                                                    @elseif($system->share == 0) {{""}} 
                                                                    @endif>
                                                        <label> </label>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endfor
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
    $('.view').on('click', function (event) {
        var priv = $('.priv').val();
        location.href =  "/roleupdateview/" + priv +"/" + (parseInt($(this).val()) + 1);
    });
    $('.add').on('click', function (event) {
        var priv = $('.priv').val();
        location.href =  "/roleupdateadd/" + priv +"/" + (parseInt($(this).val()) + 1);
    });
    $('.edit').on('click', function (event) {
        var priv = $('.priv').val();
        location.href =  "/roleupdateedit/" + priv +"/" + (parseInt($(this).val()) + 1);
    });
    $('.delete').on('click', function (event) {
        var priv = $('.priv').val();
        location.href =  "/roleupdatedelete/" + priv +"/" + (parseInt($(this).val()) + 1);
    });
    $('.share').on('click', function (event) {
        var priv = $('.priv').val();
        location.href =  "/roleupdateshare/" + priv +"/" + (parseInt($(this).val()) + 1);
    });
</script>
</html>
