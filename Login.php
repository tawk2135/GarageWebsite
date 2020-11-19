<?php
include 'fonctions.php';
getheader('Login');
navigationBar();
include 'foncLogin.php';
login(); ?>
<form method="post">
<div class="login-reg-panel">
  
		<div class="login-info-box">
			<h2>Have an account?</h2>
			<p>Log in now and make an appointment</p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
							
		<div class="register-info-box">
			<h2>Don't have an account?</h2>
			<p></p>
                        <a href="Subscribe.php"><input class="btn btn-secondary" type="button" value="Register" name="active-log-panel" id="log-login-show"></a>
		</div>
							
		<div class="white-panel">
			<div class="login-show">
				<h2>LOGIN</h2>
                                <input type="text" name="email" placeholder="Email">
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" name="login" >Login</button>
				<a href="">Forgot password?</a>
			</div>
			<div class="register-show">
				<h2>REGISTER</h2>
				<input type="text" placeholder="Email">
				<input type="password" placeholder="Password">
				<input type="password" placeholder="Confirm Password">
				<input type="button" value="Register">
			</div>
		</div>
	</div>
    </form>
<script>
    $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});
    </script>
<?php footer();?>