@include('head')

<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel">
        </div>
    </div>

    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" role = "form" id="loginform" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div style = "display:flex;justify-content:space-between;">
                        <h3 class="box-title m-b-20" style = "margin-top:35px;">Sign In</h3>
                        
                        <img src="http://18.218.188.239/adam.png" alt="" class="logo"  style = "width:200px;height:80px;"/>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-xs-12">
                            <input class="form-control" id="email" type="email" name="email"  required autofocus>
                            
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" type="password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="{{ route('password.request') }}"  class="text-dark pull-right" ><i class="fa fa-lock m-r-5" style = "color:#08d206; "></i><label style = "color:#08d206; "> Reset pwd?</label></a> 
                            <!-- <id="to-recover"> -->
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    

                    <!-- <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div> -->
                    <footer class="text-center">Copyright@ 2018 . Admin Vital - Powered By XBS </footer>  
                </form>

                <!-- <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                    </div>
                    <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                    </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <a href="{{ route('password.request') }}" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">Reset</a>
                    </div>
                    </div>
                </form> -->
                  
            </div>
        </div>
    </section>
        
</body>

@include('script')
</html>