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
                        <h4 class="page-title">Demo Exercise - Preview</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        
                        <ol class="breadcrumb">
                            <li>
                                <a style="color:white; border-radius: 20px; background-color:#0095D4" class = "print ti-printer btn" style="cursor: pointer;"><span></span>&nbsp; Print</a>
                            </li>
                            <!-- <li>
                                <a style="border-radius: 10px;" class="btn btn-danger icon-eye" href="" role="button"><span></span>&nbsp;Eye</a>
                            </li>    -->
                            @if($permission_result[0]->share != "2")
                            <li>
                                <a href="javascript:void(0);" class = "btn icon-share" data-toggle="modal" data-target="#responsive-modal" style="color:white;background-color:#0095D4;border-radius: 20px;">
                                    <span></span>&nbsp;Share
                                </a>
                            </li>
                            @endif
                            <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                            
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Select Patient</label>
                                                    <select class="selectpicker form-control patientlist" id="pickerlist" name="patient" data-live-search = "true">
                                                        @foreach($patient as $patientitem)
                                                            <option name="patient" id = '{{$patientitem->patientname}}'>{{$patientitem->patientfirstname}} {{$patientitem->patientlastname}}-PID:{{$patientitem->id}}-{{$patientitem->PID}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Set Expiry</label>
                                                    <input type="text" id="bdate" name="bdate" class="form-control mydatepicker" placeholder={{$currentDate}}>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button data-toggle="modal" aria-label="Close" type="button" class="btn waves-effect waves-light shareoption" style = "background-color:#0095D4;color:#FFF;">Save & Share</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                        </ol>
                    </div>
                </div>   
                
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <form class="mainform" action="/" accept-charset="UTF-8">
                                <input type="hidden" id="bdate" name="bdate" class="form-control tempdatepicker" placeholder="enter date" value="">
                                <input type="hidden" id="temppatient" name="bpatient" class="form-control temppatient" value="">
                                <input type="hidden" id="temprepeat" name="repeat" class="form-control temprepeat" value="">
                                <!-- <h3>Hospital Manage</h3> -->
                                <div style="text-align : center;">
                                    <img src="/plugins/images/adam.png" alt="home" />
                                </div>
                                @foreach($exercise as $exerciseitem)
                                    <hr></hr>
                                    <div class = "row">
                                        <div class="col-md-4"> 
                                        @if($exerciseitem->mediatype == "Picture")
                                            <img src={{$exerciseitem->filelink}} class="img-responsive thumbnail mr25"> 
                                        @else
                                            <video class="img-responsive thumbnail mr25" controls>
                                                <source  type="video/mp4" src={{$exerciseitem->filelink}}>
                                            </video>
                                        @endif
                                        </div>  

                                        <div class="col-md-8"> {{$exerciseitem->description}}</p>
                                        </div>
                                        @if(Auth::user()->privillege != 2)
                                                      
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <p>Repeat: </p>
                                            </div>
                                            
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                <button class="btn-block btn-outline btn-default minusbutton">-

                                                    <input type="hidden" class="selectTitle" name={{"exerciseindex".$exerciseitem->id}} value={{$exerciseitem->id}}>
                                                </button>
                                            </div>
                                      


                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" style="display:table;">
                                                <code style = "display:table-cell; text-align:center;" class={{$exerciseitem->title}} id="itemTitle">{{$exerciseitem->repeat}}</code>
                                            </div>
                                            
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                <button class="btn-block btn-outline btn-default plusbutton">+
                                                    <input type="hidden" class="selectTitle" value={{$exerciseitem->id}}>
                                                </button>
                                            </div>
                                            @endif
                                    </div>
                                    <input type="hidden" name={{"check" . $exerciseitem->id}} value="checked">
                                @endforeach
                                <hr/>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- <p><strong>Support Team</strong></p> -->
                                        <p>Adam Vital Physiotherapy & rehabilitation center</p>
                                        <p>T: +971 4 2515000 | F: +971 4 2515522</p>
                                        <p>Address: Index Holding Building, Nad Al Hamar Road, Dubai, UAE</p>
                                        <p>P.O. Box 76800</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style = "width:380px;">
                                <div class="modal-header wrapper">
                                    <h5 style = "text-align:center" class="modal-title" id="exampleModalLabel">Exercise Shared</h5>
                                </div>
                                
                                    
                                
                                <div class="modal-footer wrapper" style = "text-align:center;">
                                    
                                    <button type="type"  data-dismiss="modal" aria-label="Close" class="btn" style = "background-color:#0095D4;color:#fff;">Confirm</button>
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
    $(document).ready(function() {
        // function pad(s) {
        //     return (s<10 ? '0' + s : s);
        // }
        // var date = new Date("mY");
        // date.setDate(date.getDate() + 10);
        // fdate = strtotime(date);
       
        // alert(date);
        // var year = pad(date.getFullYear());
        // var month = pad(date.getMonth()+1);
        // var n = pad(date.getDate());
        // input = document.getElementById("bdate");
        // input.value = month +"/"+ n+ "/"+ year;
        var flag = <?php echo $flag ?>;
        if(flag == 1){
            $('#exampleModal1').modal('show');
        }
        
    });
    
    $('.minusbutton').click(function(event){
        var index = $(this).children(".selectTitle").val();
        var temp =  "/updateminusexercisepreview/" + index;
        $('.mainform').attr('action',temp);
        // var itemValue = $('#itemTitle').text();
        // if(itemValue > 0 ){
        //     $('#itemTitle').text(--itemValue);}
        // event.preventDefault();
        $('.mainform')[0].submit();
    });

    $('.shareoption').click(function(){
        
        var id = $('#pickerlist').children(":selected").attr("id");
        // alert(id);
        $('.mainform').attr('action','/shareoption');
        $('.tempdatepicker').attr('value',$('.mydatepicker').val());
        $('.temppatient').attr('value',id);
        $('.temprepeat').attr('value',$('#itemTitle').text());
        // alert( $('#itemTitle').text());
       
        $('.mainform')[0].submit();
    });

    $('.plusbutton').click(function(event){
        var index = $(this).children(".selectTitle").val();
        var temp =  "/updateplusexercisepreview/" + index;
        $('.mainform').attr('action',temp);
        // var itemValue = $('#itemTitle').text();
        // $('#itemTitle').text(++itemValue);
        // event.preventDefault();
        $('.mainform')[0].submit();
    });

    $('.print').click(function(){
        $('.mainform').attr('action','/generatepdf');
        $('.mainform')[0].submit();
    });

</script>
</html>
