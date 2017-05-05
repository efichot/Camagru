/*******************
       ACTIONS
********************/

var actions = document.querySelectorAll('.action');
var snap = document.querySelector('#snap');

[].forEach.call(actions, function (single) {
	single.addEventListener('click', function (e) {
		snap.classList.remove('disabled');
		snap.disabled = false;
	})
});
