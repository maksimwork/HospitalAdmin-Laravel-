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
                        <h4 class="page-title">Demo Exercise - Add</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Add Exercise</li>

                            <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Recipient:</label>
                                                    <input type="text" class="form-control" id="recipient-name"> </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </ol>
                    </div>
                </div>   
                
                <div class="row">
                    <form class=" " action="/exerciseaddaction" accept-charset="UTF-8" method="POST" enctype = "multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="white-box">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-12" for="example-text">Title</span></label>
                                        <div class="col-md-12 m-t-10">

                                                <input type="text" id="example-text" name="exercisetitle" class="form-control" placeholder="enter your name" required></input>

                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12  m-t-20" for="example-text">Exercise Category</span></label>
                                        <div class="col-sm-12  m-t-10">
                                            
                                            <div class = "text-center" style = "display:flex;">
                                                <select class="form-control selectpicker" name = "exercisecategory" data-live-search="true"  required>
                                                @foreach($category as $categoryitem)
                                                    <option>{{$categoryitem->categorytitle}}</option>
                                                @endforeach
                                                </select>
                                                <button type="button" data-toggle="modal" data-target="#exampleCategoryModal" style = "margin-left:10px;"><i class="fa fa-plus"></i></button>
                                                
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 m-t-20">Exercise Area</label>
                                        <div class="col-sm-12 m-t-10">

                                            <div style = "display:flex;">
                                                <select class="form-control selectpicker" name = "exercisearea" data-live-search="true" required>
                                                @foreach($area as $areaitem)
                                                    <option>{{$areaitem->areatitle}}</option>
                                                @endforeach
                                                </select>

                                                <button type="button" data-toggle = "modal" data-target="#exampleAreasModal" style = "margin-left:10px;"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 m-t-20">Exercise Type</label>
                                        <div class="col-sm-12 m-t-10">
                                            <div style = "display:flex;">
                                                <select class="form-control selectpicker" name = "exercisetype" data-live-search="true" required>
                                                @foreach($type as $typeitem)
                                                    <option>{{$typeitem->typetitle}}</option>
                                                @endforeach
                                                </select>
                                                <button type="button" data-toggle="modal" data-target="#exampleTypeModal" style = "margin-left:10px;"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 m-t-20">Exercise Sub Type</label>
                                        <div class="col-sm-12 m-t-10">
                                            <div style = "display:flex;">
                                                <select class="form-control selectpicker" name = "exercisesubtype" data-live-search="true" required>
                                                @foreach($subtype as $subtypeitem)
                                                    <option>{{$subtypeitem->subtypetitle}}</option>
                                                @endforeach
                                                </select>

                                                <button type="button" data-toggle = "modal" data-target = "#exampleSubtypeModal" style = "margin-left:10px;"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="col-sm-12 m-t-20">Exercise Keywords</label>
                                        <div class="col-sm-12 m-t-10">
                                            <input class = "form-control" id="keywordfield" type="text" name = "exercisekeyword" placeholder = "Enter Keywords..." style = "width : 100%;" onkeypress="return inputFunc(event)" required>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="white-box">
                                <div class="row">
                                    <label class="col-sm-12">Exercise Description</label>
                                    <div class="form-group" id="froala-editor">
                                        <!-- <label class="col-sm-12">Exercise Description</label> -->
                                        <hr/>
                                        <textarea class="textarea_editor form-control" rows="15" name = "exercisedescription" placeholder=""></textarea>
                                        <br>
                                        <span>Upload Exercise File:(Picture or Video)</span>
                                        <br>
                                        <input class = "m-t-10" type="file" name='uplode_image_file' id = "check"  required = "required"><br>
                                        <!-- <input type="button" value="Upload File" onclick="uploadFile()"> -->
                                        <progress id="progressBar" value="0" max="100" style="width:400px;"></progress>
                                        <h3 id="status"></h3>
                                        <p id="loaded_n_total"></p>
                                    </div>
                                    <!-- <div class="progress" style = "height:24px;">
                                        <div class="progress-bar progress-bar-striped active" id = "myBar" role="progressbar"
                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0px;">
                                            40%
                                        </div>
                                    </div> -->
                                    <!-- <div class="progress" style = "height:24px;">
                                        <div class="progress-bar progress-bar-success" role="progressbar" id = "myBar"  style="height:24px;width:0%;">
                                        40% Complete (success)
                                        </div>
                                    </div> -->
                                    <link href="/css/w3.css" rel="stylesheet">
                                    <!-- <div class="w3-light-grey">
                                        <div id="myBar" class="w3-green text-center" style="height:24px;width:0">0%</div>
                                    </div>
                                    <br> -->
                                    
                                    <!-- <div class="form-group">
                                        <label class="col-sm-12 m-t-10">Upload <strong>Image</strong> or <strong>Video</strong></label>
                                        <div class="col-sm-12  m-t-10">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="uplode_image_file"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label class="col-sm-12 m-t-20">Media Type</label>
                                        <div class="col-sm-12 m-t-10">
                                            <select class="form-control selectpicker" name = "exercisemediatype">
                                                <option>Picture</option>
                                                <option>Video</option>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="col-sm-12 m-t-20">Status</label>
                                        <div class="col-sm-12 m-t-10">
                                            <select class="form-control selectpicker" name = "exercisestatus">
                                                <option>Draft</option>
                                                <option>Publish</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn" style = "border-radius:2px;width:200px; background-color:#08d206; color:#fff; float:right; margin-top:30px;">Save Exercise</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </form>    
                </div>
                
                <div class="modal fade" id="exampleCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                            <form class="form-material form-horizontal" action="/categoryaddaction1" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label  class="col-md-12" style = "text-align:left;" for="example-text">Category Title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="titlefield" name="titlefield" class="form-control" placeholder="enter category title">
                                        
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn" style = "border-radius:2px;color:#fff; background-color:#08d206"style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <button type="button"class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleAreasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                            <form class="form-material form-horizontal" action="/areaaddaction1" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text" style = "text-align:left;">Area Title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="titlefield" class="form-control" placeholder="enter area title">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <button type="button"class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                            </form>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>    

                <div class="modal fade" id="exampleTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                            
                            <form class="form-material form-horizontal" action="/typeaddaction1" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" style = "text-align:left;" for="example-text" >Type Title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="titlefield" class="form-control" placeholder="enter type title">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <button type="button"class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                            </form>  
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleSubtypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                            <form class="form-material form-horizontal" action="/subtypeaddaction1" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" style = "text-align:left;" for="example-text">Sub Type Title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="titlefield" class="form-control" placeholder="enter sub type title">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" disabled>Save</button>
                                <button type="button"class="btn btn-inverse waves-effect waves-light" data-dismiss="modal">Close</button>
                            </form>
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

 <script type="text/javascript">
    function _(el) {
        return document.getElementById(el);
    }

    $(document).ready(function(){
        $("#fire-upload").click(function(){
        $('#uplode_image_file').click();
        })
        
    });
    document.getElementById('check').addEventListener('change', uploadFile, false);
    approveletter.addEventListener('change', uploadFile, false);
    function uploadFile(e) {
        _("progressBar").value = 0;
        var file = e.target.files[0];
        // alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("uplode_image_file", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "file_upload_parser.php");
        
        ajax.send(formdata);
    }

    function progressHandler(event) {
        
        _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    }

    function completeHandler(event) {
        _("status").innerHTML = event.target.responseText;
    }

    function errorHandler(event) {
        _("status").innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
        _("status").innerHTML = "Upload Aborted";
    }
    // document.getElementById('check').addEventListener('change', move, false);
    // approveletter.addEventListener('change', move, false);

    // function move(e) {
        
    //     var file_list = e.target.files;
    //     var iConvert
    //     var elem = document.getElementById("myBar");
     
    //     var width = 1;
    //     for (var i = 0, file; file = file_list[i]; i++) {
    //             var sFileName = file.name;
                
    //             var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
    //             var iFileSize = file.size;
    //             iConvert = (file.size / 10485760).toFixed(2);
    //             // alert(iConvert);
    //         }
       
    //     var id = setInterval(frame, iConvert * 1000);
    //     function frame() {
    //         if (width >= 100) {
    //         clearInterval(id);
    //         } else {
    //         width++; 
    //         elem.innerHTML = width + '%';
    //         elem.style.width = width + '%'; 
    //         }
    //     }
    // }
    function inputFunc(e){
        var input = document.getElementById('keywordfield');
        if(e.keyCode == 13){
            input.value = input.value + ',';
            e.preventDefault();
        }
    }

</script>

</html>
