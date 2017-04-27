<div class='home'>
	<div class='left img-home'>
		<img src='https://s-media-cache-ak0.pinimg.com/originals/58/27/9e/58279e7fa9fee54c4791282642e586ef.jpg' alt='home picture' />
	</div>
	<div class='right home-right'>
		<div class='form'>
			<h1>C<span class='bold'>A</span>M<span class='bold'>A</span>G<span class='bold'>R</span>U</h1>

			<!-- Subsription form -->
			<form id='subscription' method='post' action='./server/subscription.php'>
				<h4>Sign up</h4>
				<button type='button' name='facebook connect'><i class='fa fa-facebook-official' aria-hidden='true'></i>Log in with Facebook</button>

				<span class='hr'><p class='or'>OR</p></span>

				<input id='signup-email' type='email' name='email' value='' placeholder='Email' autocomplete='off' required/>
				<input id='signup-login' type='text' name='login' value='' placeholder='Login (3 - 32)' autocomplete='off' required/>
				<input id='signup-passwd' type='password' name='password' value='' placeholder='Password (4 - 50)' autocomplete='off' required/>
				<input id='signup-check-password' type='password' name='password-check' value='' placeholder='Type your password again' autocomplete='off' required/>
				<button id='signup-button' type='submit' name='subscribe'><i class='fa fa-sign-in' aria-hidden='true'></i>Sign up</button>
			</form>

			<!-- Connection form -->
			<form id='connection' method='post' action='./server/login.php'>
				<h4>Sign-in</h4>
				<input id='login-login' type='text' name='login' value='' placeholder='Login' autocomplete='off' required/>
				<input id='login-passwd' type='password' name='password' value='' placeholder='Password' autocomplete='off' required/>
				<span id='forgot'><a href='forgot-password'>Forgot your account?</a></span>
				<button id='login-button' type='submit' name='connect'><i class='fa fa-sign-in' aria-hidden='true'></i>Log in</button>
			</form>

			<p>By signing up, you agree to our Terms & Privacy Policy.</p>
		</div>
	</div>
</div>
