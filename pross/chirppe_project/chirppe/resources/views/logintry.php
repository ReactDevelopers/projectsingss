<!--- created by sl/045 11-Dec ---->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/chirppe/public/css/login.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
		@if (Session::has('message'))
   		<div class="alert alert-danger">{{ Session::get('message') }}</div>
		@endif
	     <!-- form tag open -->
        <form class="form-signin" method="POST" action="{{ url('home/')}}" novalidate> 
			{{ csrf_field() }}
            <span id="reauth-email" class="reauth-email"></span>
		 <!--Email field begins-->
		 	<div class="form-group validate-required {{ $errors->feature1->has('email') ? ' has-error' : '' }}">
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" >
			@if ($errors->feature1->has('email'))
			<span class="help-block">
			<strong>{{ $errors->feature1->first('email') }}</strong>
			</span>
			@endif 
            </div>
		 <!--Email field closed -->

		 <!--Password field begins-->
			<div class="form-group validate-required {{ $errors->feature1->has('email') ? ' has-error' : '' }}">
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
			@if ($errors->feature1->has('password'))
			<span class="help-block">
			<strong>{{ $errors->feature1->first('password') }}</strong>
			</span>
			@endif
			</div>
		 <!--Password field closed-->

            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            
        </form><!-- /form tag close -->
            <a href="{{ url('reset/')}}" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->