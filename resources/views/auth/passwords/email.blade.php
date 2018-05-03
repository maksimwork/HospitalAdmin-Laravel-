@include('head')

    <body>
        <div class="preloader">
            <div class="cssload-speeding-wheel">
            </div>
        </div>

        <section id="wrapper" class="login-register">
            <div class="login-box">
                <div class="white-box">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div style = "display:flex;justify-content:space-between;margin-bottom:10px;">
                                    <h3 class = "box-title m-b-20" style = "margin-top:35px;">Recover Password</h3>
                                    <img src="http://18.218.188.239/adam.png" alt="" class="logo"  style = "width:200px;height:80px;"/>
                                </div>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">Send Password Reset Link</button>
                                <a onclick = "back()"  class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light">Back</a>
                            </div>
                        </div>
                        <footer class="text-center">Copyright@ 2018 . Admin Vital - Powered By XBS </footer>  
                    </form>
                </div>
            </div>
        </section>
    <body>
<script>
    function back(){
        window.history.go(-1);
    }
</script>
@include('script')


</html>


