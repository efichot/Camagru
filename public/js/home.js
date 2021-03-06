var facebook = document.querySelector('#facebook');
var email = document.querySelector('#signup-email');
var login = document.querySelector('#signup-login');
var password = document.querySelector('#signup-passwd');
var passwordCheck = document.querySelector('#signup-check-password');

facebook.addEventListener('click', function (e) {
	window.location = "https://www.facebook.com/login.php?skip_api_login=1&api_key=113869198637480&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv2.9%2Fdialog%2Foauth%3Fredirect_uri%3Dhttps%253A%252F%252Fstaticxx.facebook.com%252Fconnect%252Fxd_arbiter%252Fr%252F87XNE1PC38r.js%253Fversion%253D42%2523cb%253Dfb34eb184fe9cc%2526domain%253Ddevelopers.facebook.com%2526origin%253Dhttps%25253A%25252F%25252Fdevelopers.facebook.com%25252Ff39c51b27b98228%2526relation%253Dopener%2526frame%253Df1671da3c75c148%26display%3Dpopup%26scope%26response_type%3Dnone%252Ctoken%252Csigned_request%26domain%3Ddevelopers.facebook.com%26auth_type%26ref%3DLoginButton%26origin%3D1%26client_id%3D113869198637480%26seen_revocable_perms_nux%3Dfalse%26ret%3Dlogin%26sdk%3Djoey%26logger_id%3D798e7de0-c648-1caa-be3f-810f52c1e139&cancel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F87XNE1PC38r.js%3Fversion%3D42%23cb%3Dfb34eb184fe9cc%26domain%3Ddevelopers.facebook.com%26origin%3Dhttps%253A%252F%252Fdevelopers.facebook.com%252Ff39c51b27b98228%26relation%3Dopener%26frame%3Df1671da3c75c148%26error%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%26e2e%3D%257B%257D&display=popup&locale=fr_FR&logger_id=798e7de0-c648-1caa-be3f-810f52c1e139";
});

function validateEmail(email) {
	var regex = 	/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return regex.test(email);
}

email.addEventListener('keyup', function (e) {
	if (!validateEmail(e.target.value)) {
		e.target.style.backgroundColor = '#CD3037';
		e.target.style.borderColor = '#CD3037';
	} else {
		e.target.style.backgroundColor = '#5FCF80';
		e.target.style.borderColor = '#5FCF80';
	}
});

login.addEventListener('keyup', function (e) {
	if (e.target.value.length < 3 || e.target.value.length > 32) {
		e.target.style.backgroundColor = '#CD3037';
		e.target.style.borderColor = '#CD3037';
	} else {
		e.target.style.backgroundColor = '#5FCF80';
		e.target.style.borderColor = '#5FCF80';
	}
});

password.addEventListener('keyup', function (e) {
	if (e.target.value.length < 4 || e.target.value.length > 50) {
		e.target.style.backgroundColor = '#CD3037';
		e.target.style.borderColor = '#CD3037';
	} else {
		e.target.style.backgroundColor = '#5FCF80';
		e.target.style.borderColor = '#5FCF80';
	}
});

passwordCheck.addEventListener('keyup', function (e) {
	if (e.target.value != password.value) {
		e.target.style.backgroundColor = '#CD3037';
		e.target.style.borderColor = '#CD3037';
	} else {
		e.target.style.backgroundColor = '#5FCF80';
		e.target.style.borderColor = '#5FCF80';
	}
});
