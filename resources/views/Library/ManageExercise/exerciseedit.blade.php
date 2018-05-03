@include('head')

<body onload = "load('{{$category->count()}}', '{{$area->count()}}', '{{$type->count()}}', '{{$subtype->count()}}', '{{$exercise->category}}', '{{$exercise->area}}', '{{$exercise->type}}', '{{$exercise->subtype}}')">
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
                        <h4 class="page-title">Edit Exercises</h4> 
                    </div>
                    <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Edit Exercise</li>
                        </ol>
                    </div> -->
                </div>   
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form class=" form-horizontal" action="/exerciseeditaction" enctype = "multipart/form-data" method="POST" accept-charset="UTF-8" >
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Exercise Title</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="exercisetitle" class="form-control" value={{$exercise->title}}>
                                        <input type="hidden" id="example-text" name="previous" class="form-control" value={{$exercise->title}}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Exercise Category</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker" id = "categorylist" name="exercisecategory" data-live-search="true">
                                            @foreach($category as $categoryitem)
                                                <option id = {{$categoryitem->id}}>{{$categoryitem->categorytitle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Exercise Area</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker" id = "arealist" name="exercisearea" data-live-search="true">
                                            @foreach($area as $areaitem)
                                                <option id = {{$areaitem->id}}>{{$areaitem->areatitle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Exercise Type</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker" id = "typelist" name="exercisetype" data-live-search="true">
                                                @foreach($type as $typeitem)
                                                    <option id = {{$typeitem->id}}>{{$typeitem->typetitle}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Exercise Type</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker" id = "subtypelist" name="exercisesubtype" data-live-search="true">
                                            @foreach($subtype as $subtypeitem)
                                                <option id = {{$subtypeitem->id}}>{{$subtypeitem->subtypetitle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Exercise Type</span></label>
                                    <div class="col-md-12">
                                        <select class="form-control selectpicker" name="exercisestatus" data-live-search="true">
                                            
                                                <option>Publish</option>
                                                <option>Draft</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-12" for="example-text">Upload Exercise File:(Picture or Video)</label>
                                        <br>
                                        <input class = "col-md-12" type="file" name='uplode_image_file' required = "required"><br>
                                </div>
                                <button type="submit" class="btn "  style = "border-radius:2px;color:#fff; background-color:#08d206" >Save</button>
                                <a href = "{{ URL::route('manageexercise') }}" class="btn btn-inverse waves-effect waves-light">Cancel</a>
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
function load($temp, $temp1, $temp2, $temp3, $category,$area, $type, $subtype){
    // alert($category);
       for($i = 0; $i < $temp; $i++){
           
        if(document.getElementById('categorylist').getElementsByTagName('option')[$i].id == $category)
        {
            document.getElementById('categorylist').selectedIndex = $i;
        }
        
       }

       for($i = 0; $i < $temp1; $i++){
           
           if(document.getElementById('arealist').getElementsByTagName('option')[$i].id == $area)
           {
               document.getElementById('arealist').selectedIndex = $i;
           }
           
          }

          for($i = 0; $i < $temp2; $i++){
           
           if(document.getElementById('typelist').getElementsByTagName('option')[$i].id == $type)
           {
               document.getElementById('typelist').selectedIndex = $i;
           }
           
          }

          for($i = 0; $i < $temp3; $i++){
           
           if(document.getElementById('subtypelist').getElementsByTagName('option')[$i].id == $subtype)
           {
               document.getElementById('subtypelist').selectedIndex = $i;
           }
           
          }
   }
</script>
</html>
