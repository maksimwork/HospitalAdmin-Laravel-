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
                        <h4 class="page-title">My Favourite Exercises</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li>
                                <button style="height:35px;border-radius: 20px; border-width:0px; background-color:#0095D4;color:white;" class="btn" id="previewclass" role="button"><span class=""></span>&nbsp;View & Share</button>
                            </li>
                        </ol>
                    </div>
                </div>   
                
                <div class="row">
                    
                    <div class="col-sm-11">
                        <div class="white-box">

                            <!-- start white box -->
                            
                            <div class="row">
                                <form class="mainform" action="/exercisepreview" accept-charset="UTF-8">
                                    <input type="hidden" id="bdate" name="bdate" class="form-control tempdatepicker" placeholder="enter date" value="">
                                    <input type="hidden" id="temppatient" name="bpatient" class="form-control temppatient" value="">
                                <!-- bootstrap start -->
                                    @foreach($exercise as $exerciseitem)
                                        <div class="col-lg-3 col-sm-12 col-xs-12"style="width:350px;height:300px;"> 
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
                                                        <div class="news-content" style = "color:white; cursor: pointer;">
                                                            @if($exerciseitem->favourite == 0)
                                                                @if(Auth::user()->privillege == 1)
                                                                    <span class="fa fa-star-o pull-right actionstar" style="font-size: 20px;">
                                                                        <input type ="hidden" class = "starIndex" value={{$exerciseitem->id}}>
                                                                    </span>    
                                                                @endif
                                                            @else
                                                                @if(Auth::user()->privillege == 1)
                                                                <span class="fa fa-star text-warning pull-right actionstar" style="font-size: 20px;">
                                                                    <input type ="hidden" class = "starIndex" value={{$exerciseitem->id}}>
                                                                </span>    
                                                                @endif
                                                            @endif
                                                            <div class="imagerect" data-toggle="modal" data-target="#exampleModal" value={{$exerciseitem->id}} style = "height:175px;">
                                                                    <input type ="hidden" class = "starIndex" id={{$exerciseitem->id}} content="<?=$exerciseitem->description?>" filelink={{$exerciseitem->filelink}} mediatype = {{$exerciseitem->mediatype}}>
                                                            </div> 

                                                            <a href="#" class = "pull-left">{{$exerciseitem->title}}</a>                                                             
                                                            <div class="checkbox checkbox-info pull-right" style = "margin : 0 0">
                                                                <input type="checkbox" name={{"check" . $exerciseitem->id}} value="checked">
                                                                <label > </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <!-- Carousel inner end -->
                                            
                                            </div>
                                            <!-- news slide end -->
                                        </div>
                                    @endforeach

                                </form>
                                <!-- boot strap end -->

                               

                                
                            </div>
                           <!-- row end -->


                        </div>
                         <!-- end white box -->
                         
                        


                    </div>
                    <footer class="footer text-center">Copyright@ 2018 . Admin Vital - Powered By XBS </footer>
                </div>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">"
                            <div class="modal-content" style = "width:755px; height:770px;">
                                <div class="modal-body">
                                    <img  src="" style = ""/>
                                    <iframe  src="" style = ""></iframe>
                                </div>
                                <div class="modal-footer" style = "text-align: left;">
                                    <p>Content</p><label>abc</label>
                                    
                                    

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
    
    @include('script')
</body>
<script>
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
        
    })
    $(document).ready(function() {
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth()+1;
        var n = date.getDate()  +10;
        input = document.getElementById("bdate");
        input.value = month.toString() +"/"+ n.toString()+ "/"+ year.toString();
    });
    $('#previewclass').click(function(){
        $('.mainform').attr('action','/exercisepreview');
        $('.mainform')[0].submit();
    });
    

    $('.imagerect').click(function(){
        var starID = $(this).children(".starIndex").val();
        
        var filelink = $(this).children(".starIndex").attr("filelink");
        var mediatype = $(this).children(".starIndex").attr("mediatype");
        var content = $(this).children(".starIndex").attr("content");
        if(mediatype == 'Picture'){
            
            $(".modal-body").children("img").attr("src", filelink);
            $(".modal-body").children("iframe").attr("src", "");
            $(".modal-body").children("img").attr("style", "width:725px; height:500px; visibility: none;");
            $(".modal-body").children("iframe").attr("style", "width:0px; height:0px; visibility: hidden;");
        }
        else{
            $(".modal-body").children("img").attr("src", "");
            $(".modal-body").children("iframe").attr("src", filelink);
            $(".modal-body").children("img").attr("style", "width:0px;height:0px;visibility: hidden;");
            $(".modal-body").children("iframe").attr("style", "width:725px; height:500px; visibility: none;");
        }
        // alert(content);
        $(".modal-footer").children("label").html(content);
    })
    

</script>
</html>
