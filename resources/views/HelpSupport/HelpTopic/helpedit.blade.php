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
                        <h4 class="page-title">Edit Help Topic</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Help & Support</a></li>
                            <li class="active">Edit Help Topic</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class="form-horizontal" action="/helpeditaction" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Topic title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="topictitle" class="form-control" value='{{$topic->topictitle}}'>
                                        <input type="hidden" id="example-text" name="previous" class="form-control" value='{{$topic->topictitle}}'>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Client Access</span></label>
                                    <div class="col-md-12">
                                        <!-- <input type="text" id="example-text" name="topicaccess" class="form-control" value={{$topic->topicaccess}}> -->
                                        <!-- <input type="checkbox" checked data-toggle="toggle" data-size="normal"> -->
                                        <label class="switch" style = "vertical-align: middle;">
                                            <input type="checkbox" name = "topicaccess"
                                                        @if($topic->topicaccess == 1)
                                                            checked
                                                        @endif
                                                       >
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label class="col-sm-12">Content </label>
                                    <hr/>
                                    <textarea class="textarea_editor form-control"  name="content" id="content" rows="15" name = "exercisedescription">{{$topic->content}}</textarea>
                                </div>

                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <a href = "{{ URL::route('helptopic') }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                            </form>    
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

   
</script>
</html>
