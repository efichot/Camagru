<?php session_start(); ?>

<div class='success'>
	<h2><i class='fa fa-thumbs-up' aria-hidden='true'></i>SUCCESS !</h2>
	<p>Congratulations <?php echo $_SESSION['login']; ?>.</p>
	<p>Your registration is complete !</p>
	<p>Take a look at your mail <em><?php echo $_SESSION['email']; ?></em> to validate your account.</p>
</div>
