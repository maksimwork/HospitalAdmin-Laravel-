<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 300px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header" style = "background-color:#0095d4"> 

        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="ti-menu"></i>
        </a>

        <div class="top-left-part">
            
            <a class="logo" href={{ URL::route('home') }}><b><img src="/plugins/images/Logo1.png" width="30px" alt="home" /></b>
                        <span class="hidden-xs"><strong>Adam&nbsp;</strong>Vital</span>
                        <!-- <span class="hidden-xs"><strong>{{Auth::user()->name}}</span> -->

            </a>
        </div>

        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <form role="search" class="app-search hidden-xs">
                    <input type="hidden" placeholder="Search..." class="form-control"> <a href=""><i style = "display:none;" class="fa fa-search"></i></a> </form>
            </li>
            
            <!-- Account Profile -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                    <img src={{Auth::user()->filelink}} alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{Auth::user()->firstname}}</b> 
                </a>
                <div class="dropdown-content">
                        
                        <a role = "button" onclick = "edit()">Edit Profile</a>
                        
                </div>
            </li>
        </ul>

    </div>
</nav>

<script>
function edit(){
    // alert();
    location.href = "/editprofile";
    return;
}
</script>