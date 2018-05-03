<?php
    $count = 0;
?>
@include('head')
<style>
video {
    object-fit: fill;
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
                        <h4 class="page-title">Available Exercise</h4> 
                    </div>
                    
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol style="" class="breadcrumb">
                            <li style = "display:flex;">
                                
                                <input style = "width:450px;border: 2px solid #ccc;border-radius: 20px;font-size: 15px;margin-right:30px;" type="text" placeholder="Search..." class="form-control" id="myInput" style="margin-top:0;" onkeyup="myFunction()">
                                @if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3)
                                <a style="color:white; height:35px; border-radius: 20px; background-color:#0095D4" class="btn" id = "previewclass" role="button"><span class=""></span>&nbsp;View & Share</a>
                                @endif
                            </li>

                            <!-- @if($permission_result[0]->share == "1")
                            <li style = "">
                                <a href="javascript:void(0);" class = "btn btn-success   icon-share" data-toggle="modal" data-target="#responsive-modal" style="border-radius: 10px;" ><span class=""></span>&nbsp;Share</a>
                            </li>
                            @endif -->
                            <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Select Patient</label>
                                                    <select class="selectpicker form-control patientlist" data-live-search="true">
                                                        @foreach($patient as $patientitem)
                                                            <option name="patient">{{$patientitem->patientname}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Set Expiry</label>
                                                    <input type="text" id="bdate"  name="bdate" class="form-control mydatepicker" placeholder="enter date">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light shareoption">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <!-- <li><a href="javascript:void(0);">Library</a></li>
                            <li class="active">Available Exercise</li> -->
                        </ol>
                    </div>
                </div>   
                
                <div class="row">
                    <form class="mainform" action="/showfilterexercise" accept-charset="UTF-8">
                        <input type="hidden" id="bdate" name="bdate" class="form-control tempdatepicker" placeholder="enter date" value="">
                        <input type="hidden" id="temppatient" name="bpatient" class="form-control temppatient" value="">
                        <div class="col-sm-4">
                            <div class="white-box">
                                
                                <div class="table-responsive" style = "overflow: auto;  display: block; max-height:465px; ">
                                    <table class="table table-hover" id = "myTable">
                                        <thead >
                                            <tr style = "height:60px;">
                                                <th>Exercise Categories</th>
                                            </tr>
                                        </thead>
                                        <tbody style="cursor: pointer;"  >
                                            @foreach ($category as $categoryitem)
                                                    <tr class="head" style = "height:60px;" id={{'cat-'.$categoryitem->id}}>
                                                        <input type ="hidden" class = "cellindex" value={{$categoryitem->id}}>
                                                        <td class="txt-oflo"><h5> <i class="ti-bookmark ">&nbsp;&nbsp; </i> {{$categoryitem->categorytitle}}</h5></td>
                                                    </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table> 
                                </div>
                                
                                    <h4 class="page-title m-t-30">Filter Exercise</h4>

                                    <!-- <h3 class="box-title m-t-20">Exercise Area -->
                                        <div class="col-xs-12 m-t-30" >
                                            <select class="form-control selectpicker" name="areatitle" placeholder ="Enter Exercise Area" data-live-search="true">
                                                <option name="areatitle" selected>All Exercise Areas</option>
                                                @foreach ($area as $areaitem)
                                                    <option name="areatitle"> {{$areaitem->areatitle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </h3>

                                    <!-- <h3 class="box-title">Exercise Type -->
                                        <div class="col-xs-12 m-t-20">
                                            <select class="form-control selectpicker" placeholder = "Enter Exercise Tpyes" name="typetitle" data-live-search="true"> 
                                                <option name="typetitle" selected>All Exercise Types</option>
                                                @foreach ($type as $typeitem)
                                                    <option name="typetitle">{{$typeitem->typetitle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </h3>

                                    <!-- <h3 class="box-title">Exercise Sub Type -->
                                        <div class="col-xs-12 m-t-20">
                                            <select class="form-control selectpicker" placeholder = "Type Exercise Sub Tpyes" name="subtypetitle"  data-live-search = "true">
                                                <option name="subtypetitle" selected>All Exercise Sub Types</option>
                                                @foreach ($subtype as $subtypeitem)
                                                    <option name="subtypetitle">{{$subtypeitem->subtypetitle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="col-xs-12 m-t-20">
                                            <select class="form-control selectpicker" placeholder = "Enter Exercise Media Tpyes" name="mediatype" data-live-search="true"> 
                                                <option name="mediatypetitle" selected>All Exercise Media Tpyes</option>
                                               
                                                        <option name="$exerciseitem->mediatype">JPEG or PNG</option>
                                                        <option name="$exerciseitem->mediatype">mp4</option>
                                                
                                            </select>
                                        </div>
                                    </h3>

                                        <!-- <div class="col-xs-12 m-t-20">
                                            <select class="form-control selectpicker" placeholder = "Search Keyword" id="myInput" name="keywordtitle"  data-live-search = "true" onchange="myFunction()">
                                                    <option name="keywordtitle" selected>All Exercise Keywords</option>
                                                    @foreach ($exercise as $exerciseitem)
                                                        <option name="$exerciseitem->keyword">{{$exerciseitem->keyword}}</option>
                                                    @endforeach
                                            </select> -->
                                            <!-- <input type="text" class="form-control" placeholder = "Search..." id="myInput" style="margin-top:0;" onkeyup="myFunction()"> -->
                                            
                                        <!-- </div> -->
                                        <div class="col-xs-12 m-t-30">
                                        </div>
                                        
                                        <button class="btn btn-block btn-outline btn-rounded btn-info m-t-30 viewclass">View Exercise</button>
                                        
                                    </h3>
                                
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="white-box">
                                @if($empty == true)
                                    No matching one!
                                @else
                                <!-- start white box -->
                                <div class="row" id = "mainDiv">
                                    @foreach($exercise as $exerciseitem)
                                        @if($exerciseitem->status == "Publish")
                                        <div class="col-lg-4 col-sm-12 col-md-6 col-xs-12" style = "width:330px;height:300px;">
                                            
                                            <input type = "hidden" id="extitle" value = {{$exerciseitem->title}} />
                                            <div class="news-slide m-b-10">
                                                <!-- Carousel inner -->
                                                <div class="carousel-inner">
                                                    <div class="active item">
                                                        <div class="overlaybg" style = "height:250px; ">
                                                            @if($exerciseitem->mediatype == "Picture")
                                                                <img src={{$exerciseitem->filelink}} style = "background-size: cover;"/>
                                                            @else
                                                            <video>
                                                                <source type="video/mp4" src={{$exerciseitem->filelink}}>
                                                                
                                                            </video>
                                                            <!-- <div style=" background-color:grey; width:100%;height:100%; z-index:999;"> -->
                                                                <span style= "margin-left:140px; margin-top:90px;position:absolute; font-size:50px;color:white;" class="glyphicon glyphicon-play"></span>
                                                            <!-- </div> -->
                                                            @endif
                                                            
                                                        </div>

                                                        

                                                        <input type="hidden" name={{"index" . $exerciseitem->id}} value={{$exerciseitem->id}}>
                                                        @if(Auth::user()->privillege == 2)
                                                            @foreach($userItem as $item)  
                                                                        @if($item->exercise == $exerciseitem->title) 
                                                                            <div style = "justify-content:space-between; display:flex;">
                                                                                <div style="display:flex;">                                                         
                                                                                    <span>Expire: </span><span href="#" class = "pull-left">{{$item->expire_date}}</span>       
                                                                                </div>
                                                                                <div style="display:flex;">                                                                                                               
                                                                                    <span>Exercise-repeat: </span><span href="#" class = "pull-left">{{$item->exerciserepeat}}</span>    
                                                                                </div>
                                                                            </div>                                                         
                                                                        @endif
                                                            @endforeach
                                                        @endif
                                                        <div class="news-content" style = "color:white; cursor: pointer;">
                                                        @if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3)
                                                            @if($exerciseitem->favourite == 0)
                                                                <span class="fa fa-star-o pull-right actionstar" style="font-size: 20px;">
                                                                    <input type ="hidden" class = "starIndex" value={{$exerciseitem->id}}>
                                                                </span>    
                                                            @else
                                                                <span class="fa fa-star text-warning pull-right actionstar" style="font-size: 20px;">
                                                                    <input type ="hidden" class = "starIndex" value={{$exerciseitem->id}}>
                                                                </span>    
                                                            @endif
                                                        @endif
                                                            <div class="imagerect" data-toggle="modal" data-target="#exampleModal" value={{$exerciseitem->id}} style = "height:175px;">
                                                                <input type ="hidden" class = "starIndex" id={{$exerciseitem->id}} content="<?=$exerciseitem->description?>" filelink={{$exerciseitem->filelink}} mediatype = {{$exerciseitem->mediatype}}>
                                                            </div> 

                                                            
                                                            
                                                            <!-- Modal -->
                                                            
                                                            
                                                            <a href="#" class = "pull-left">{{$exerciseitem->title}}</a> 
                                                            <!-- @foreach($userItem as $item)  
                                                                @if($item->exercise == $exerciseitem->title)                                                          
                                                                    <a href="#" class = "pull-left">{{$userItem[0]->expire_date}}</a>                                                             
                                                                @endif
                                                            @endforeach -->
                                                            @if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3)
                                                            <div class="checkbox checkbox-info pull-right" style = "margin : 0 0">
                                                                <input class = "checkedclass" type="checkbox" onchange="checkedFunction();" id = "check".{{$exerciseitem->id}} name={{"check" . $exerciseitem->id}} value="checked">
                                                                <label></label>
                                                            </div>
                                                            @endif
                                                                                                                         
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <!-- Carousel inner end -->
                                            
                                            </div>
                                            <!-- news slide end -->
                                        </div>
                                    @endif
                                    @endforeach
                                    
                                </div>
                                @endif
                                <ul class="pagination">
                                    <?php 
                                        for ($x = 1; $x <= $execnt; $x++) {
                                    ?>
                                            <li><a href = "#" id ={{$x}} onclick = "paginationFunction({{$x}});">{{$x}}</a></li>
                                    <?php    } 
                                ?>
                                </ul>
                            <!-- row end -->


                            </div>
                            <!-- end white box -->
                        </div>

                    </form>
                </div>
                <footer class="footer text-center">Copyright@ 2018 . Admin Vital - Powered By XBS </footer>    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">"
                            <div class="modal-content" style = "width:755px; height:770px;">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title">Modal title</h5> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                               
                                <div class="modal-body">
                                    <img  src="" style = ""/>
                                    <video id="videotag" controls controlsList="nodownload">
                                        
                                        <source id = "video" type="video/mp4" src="">
                                    </video>
                                </div>
                                <div class="modal-footer" style = "text-align: left;">
                                    <p style = "font-weight:bold;">Description</p><label>abc</label>

                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   
        
  

    
    @if($isexpired)
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach($expiredItem as $item)
                        <span>Expired Exercise : {{$item->exercise}} Expire Date:{{$item->expire_date}}</span>
                        <br>
                        <br>
                    @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal" style = "width:100px;background-color:#C4161C; color:#fff;border-radius:2px;">Close</button>
                
            </div>
            </div>
        </div>
    </div>
    @endif

    
    @include('script')
</body>
<script type = "text/javascript">
    // function myFunction() {
        
    //     var input, filter, table, tr, td, i;
    //     input = document.getElementById("myInput");
    //     filter = input.value.toUpperCase();
    //     // alert(filter);  
    //     table = document.getElementById("myTable");
    //     tb = table.getElementsByTagName("tbody");
    //     tr = tb[0].getElementsByTagName("tr");
    //     for (i = 0; i < tr.length; i++) {
    //         td = tr[i].getElementsByTagName("td")[0];
    //         if (td) {
    //             if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
    //                 tr[i].style.display = "";
    //             } else {
    //                 tr[i].style.display = "none";
    //             }
    //         }       
    //     }
    // }
    
    function myFunction() {
        var input, filter, i, div, keyword;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        // alert(filter);
        div = $("#mainDiv");
        var divs = div.children('div');
        // console.log(filter);
        // div.style.display = "none";
        for (i = 0; i < divs.length; i++) {
            keyword = $('#mainDiv div:nth-child('+(i+1)+')').find('#extitle');
            // alert(keyword.val());
            if(!keyword.val().toUpperCase().includes(filter))
                divs[i].style.display = "none";
            else
                divs[i].style.display = "";
        }
    }
    function paginationFunction($id){
        // var div = $("#mainDiv");
        // var divs = div.children('div');
        // for (i = 0; i < divs.length; i++) {
        //     divs[i].style.display = "none";
        // }
        // for (i = 12*($id-1); i < 12*($id-1)+12; i++) {
        //     divs[i].style.display = "";
        // }
    }
    function checkedFunction(){
        alert("sadfadsf");
        // alert($(".checkedclass").prop( "checked"));
        var count1 = <?php echo $count; ?>;
        
        // 
        // alert(count1);
    }
    $(document).ready(function() {
        var index = window.location.href.lastIndexOf('/');
        $("#exampleModal1").modal('show');
        if(index >= 0)
        {
            var catNum = window.location.href.slice(index+1);
            if(parseInt(catNum))
                $('#cat-'+catNum).addClass('active');
        }
        
        // var div = $("#mainDiv");
        // var divs = div.children('div');
        // for (i = 0; i < divs.length; i++) {
        //     divs[i].style.display = "none";
        // }
        // for (i = 0; i < 12; i++) {
        //     divs[i].style.display = "";
        // }
        // function pad(s) {
        //     return (s<10 ? '0' + s : s);
        // }
        // var date = new Date();
        // date.setDate(date.getDate() + 10);
        // var year = pad(date.getFullYear());
        // var month = pad(date.getMonth()+1);
        // var n = pad(date.getDate());
        // input = document.getElementById("bdate");
        // input.value = month +"/"+ n+ "/"+ year;
    });
    $('#iframe').ready(function() {
        setTimeout(function() {
            $('#iframe').contents().find('#download').remove();
        }, 100);
    });
    $('.viewclass').click(function(){
        
        $('.mainform').attr('action','/showfilterexercise');
        $('.mainform')[0].submit();
    });
    $('#previewclass').click(function(){
        $('.mainform').attr('action','/exercisepreview');
        // var div = $("#mainDiv");
        // var divs = div.children('div');
        // for (i = 0; i < divs.length; i++) {
        //     alert(divs[i].children(".checkedclass").attr("id"));
        // }
        
        $('.mainform')[0].submit();
    });

    $('.shareoption').click(function(){
        $('.mainform').attr('action','/shareoption');
        $('.tempdatepicker').attr('value',$('.mydatepicker').val());
        $('.temppatient').attr('value',$('.patientlist').val());

        $('.mainform')[0].submit();
    });

    $('.imagerect').click(function(){
        
        var starID = $(this).children(".starIndex").attr("id");
        var filelink = $(this).children(".starIndex").attr("filelink");
        var mediatype = $(this).children(".starIndex").attr("mediatype");
        var content = $(this).children(".starIndex").attr("content");
        // var vid = $(".modal-body").children("iframe");
        
        if(mediatype == 'Picture'){
            
            $(".modal-body").children("img").attr("src", filelink);
            $("#video").attr("src", "");
            $(".modal-body").children("img").attr("style", "width:725px; height:500px; visibility: none;");
            $("#videotag").attr("style", "width:0px; height:0px; visibility: hidden;");
        }
        else{
            $(".modal-body").children("img").attr("src", "");
            $("#video").attr("src", filelink);
            $("#videotag").load();
            $(".modal-body").children("img").attr("style", "width:0px;height:0px;visibility: hidden;");
            $("#videotag").attr("style", "width:725px; height:500px; visibility: none;");
        }
       
        $(".modal-footer").children("label").html(content);
        // location.href =  "/exerciseoneview/" + starID;
    })
    $('.head').on('click', function (event) {
        // alert($(this).children('.patientname').text());
        
        var nameText = $(this).children('.cellindex').val();
 
        location.href =  "/showfiltercategoryexercise/" + nameText;
    });

    $('.actionstar').on('click', function (event){
        // $(this).hasClass('active')
        // var debug = $(this).addClass('active');
        if($(this).hasClass('fa-star text-warning'))
        {
            $(this).removeClass('fa-star text-warning');
            $(this).addClass('fa-star-o');
        }else if($(this).hasClass('fa-star-o')){
            $(this).removeClass('fa-star-o');
            $(this).addClass('fa-star text-warning');
        }
        
        var starID = $(this).children(".starIndex").val();

        location.href = "/updatefavouriteexercise/" + starID;
        
    });
   
</script>
</html>
