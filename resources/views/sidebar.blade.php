<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            
            <li class="user-pro">
                <a href="#" class="waves-effect"><img src={{Auth::user()->filelink}} alt="user-img" class="img-circle"> <span class="hide-menu">Welcome {{Auth::user()->firstname}}</span>
                </a>
            </li>
            <!-- <li class="user-pro">
                <a href="#" class="waves-effect"><img src="../plugins/images/users/d1.jpg" alt="user-img" class="img-circle"> Welcome
                </a>
            </li> -->
            <!-- <li class="nav-small-cap m-t-10">--- Main Menu</li> -->
            @if(Auth::user()->privillege == 1)
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-book-open"></i> <span class="hide-menu">&nbsp;Library <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <!-- <li role="separator" class="divider"></li> -->
                        <li> <a href={{ URL::route('viewexercise') }}>View Exercises</a> </li>  
                        <li> <a href={{ URL::route('myfavourite') }}>My favourites</a> </li>  
                        <li> <a href={{ URL::route('manageexercise') }}>Manage Exercise</a> </li>  
                        <li> <a href={{ URL::route('managecategory') }}>Manage Categories</a> </li>  
                        <li> <a href={{ URL::route('managearea') }}>Manage Area</a> </li>  
                        <li> <a href={{ URL::route('managetype') }}>Manage Type</a> </li>  
                        <li> <a href={{ URL::route('managesubtype') }}>Manage Sub Type</a> </li>  
                    </ul>
                </li>

                
                <li> <a href={{ URL::route('patient') }} class="waves-effect"> <i class="ti-wheelchair "></i> <span class="hide-menu">&nbsp;Patients  </span></a></li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people"></i> <span class="hide-menu">&nbsp;Therapists <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href={{ URL::route('physiotherapist') }}>Manage Therapists</a> </li> 
                         
                        <li> <a href={{ URL::route('managedepartment') }}>Manage Departments</a> </li>   
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-trophy"></i> <span class="hide-menu">&nbsp;Training <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href={{ URL::route('availabletraining') }}>Available Tranining</a> </li>
                        
                    </ul>
                </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-help-alt"></i> <span class="hide-menu">&nbsp;Help & Support <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href={{ URL::route('helptopic') }}>Help Topics</a> </li>
                        <li> <a href={{ URL::route('contactsupport') }}>Contact Support</a> </li>
                    </ul>
                </li>
                <li> <a href={{ URL::route('feedback') }} class="waves-effect"><i class="ti-comments-smiley"></i> <span class="hide-menu">&nbsp;Feedback </span></a>
                </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i><span class="hide-menu">&nbsp;System Management <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href= {{ URL::route('role') }}>Roles & Permission</a></li>
                    </ul>
                </li>
                <li> <a href={{ URL::route('logout') }} class="waves-effect"> <i class="icon-logout fa-fw"></i> <span class="hide-menu">&nbsp;Log out  </span></a></li>   
                @elseif(Auth::user()->privillege == 2)
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-book-open"></i> <span class="hide-menu">&nbsp;Library <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <!-- <li role="separator" class="divider"></li> -->
                        <li> <a href={{ URL::route('viewexercise') }}>View Exercises</a> </li>  
                        <!-- <li> <a href={{ URL::route('myfavourite') }}>My favourites</a> </li>  
                        <li> <a href={{ URL::route('manageexercise') }}>Manage Exercise</a> </li>  
                        <li> <a href={{ URL::route('managecategory') }}>Manage Categories</a> </li>  
                        <li> <a href={{ URL::route('managearea') }}>Manage Area</a> </li>  
                        <li> <a href={{ URL::route('managetype') }}>Manage Type</a> </li>  
                        <li> <a href={{ URL::route('managesubtype') }}>Manage Sub Type</a> </li>   -->
                    </ul>
                </li>

                
               
                <!-- <li> <a href={{ URL::route('patient') }} class="waves-effect"> <i class="ti-wheelchair "></i> <span class="hide-menu">&nbsp;Patients  </span></a></li> -->
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-help-alt"></i> <span class="hide-menu">&nbsp;Help & Support <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href={{ URL::route('helptopic') }}>Help Topics</a> </li>
                        <li> <a href={{ URL::route('contactsupport') }}>Contact Support</a> </li>
                    </ul>
                </li>
                <li> <a href={{ URL::route('feedback') }} class="waves-effect"><i class="ti-comments-smiley"></i> <span class="hide-menu">&nbsp;Feedback </span></a>
                </li>
                
                <li> <a href={{ URL::route('logout') }} class="waves-effect"> <i class="icon-logout fa-fw"></i> <span class="hide-menu">&nbsp;Log out  </span></a></li> 
            @else
                @if($permission_result[0]->view == "1")
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-book-open"></i> <span class="hide-menu">&nbsp;Library <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <!-- <li role="separator" class="divider"></li> -->
                            <li> <a href={{ URL::route('viewexercise') }}>View Exercises</a> </li>  
                            @if($permission_result[0]->add == "1" || $permission_result[0]->edit == "1" || $permission_result[0]->delete == "1")
                            <li> <a href={{ URL::route('manageexercise') }}>Manage Exercise</a> </li>  
                            @endif
                        </ul>
                    </li>
                @endif
                
                @if($permission_result[1]->view == "1")
                    <li> <a href={{ URL::route('patient') }} class="waves-effect"> <i class="ti-wheelchair "></i> <span class="hide-menu">&nbsp;Patients  </span></a></li>
                @endif
                @if($permission_result[2]->view == "1")
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people"></i> <span class="hide-menu">&nbsp;Therapists <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href={{ URL::route('physiotherapist') }}>Manage Therapists</a> </li>  
                        </ul>
                    </li>
                @endif
                @if($permission_result[3]->view == "1")
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-trophy"></i> <span class="hide-menu">&nbsp;Training <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href={{ URL::route('availabletraining') }}>Available Tranining</a> </li>
                        </ul>
                    </li>
                @endif
                @if($permission_result[4]->view == "1")
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-help-alt"></i> <span class="hide-menu">&nbsp;Help & Support <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href={{ URL::route('helptopic') }}>Help Topics</a> </li>
                            <li> <a href={{ URL::route('contactsupport') }}>Contact Support</a> </li>
                        </ul>
                    </li>
                @endif
                @if($permission_result[5]->view == "1")
                    <li> <a href={{ URL::route('feedback') }} class="waves-effect"><i class="ti-comments-smiley"></i> <span class="hide-menu">&nbsp;Feedback </span></a>
                    </li>
                @endif
                @if($permission_result[6]->view == "1")
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i><span class="hide-menu">&nbsp;System Management <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href= {{ URL::route('role') }}>Roles & Permission</a></li>
                        </ul>
                    </li>
                @endif
                <li> <a href={{ URL::route('logout') }} class="waves-effect"> <i class="icon-logout fa-fw"></i> <span class="hide-menu">&nbsp;Log out  </span></a></li> 
            @endif
    </div>
</div>