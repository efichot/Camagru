var page = document.querySelector('.gallery');
var images = document.querySelectorAll('.gallery-single');
var rootURI = '/' + location.pathname.split('/')[1];

[].forEach.call(images, function(image) {
	var heart = image.querySelector('.likes-nb i');
	var likesNB = parseInt(heart.nextSibling.data);
	var imgID = image.id;
	heart.addEventListener('mouseover', function () {
		this.classList.remove('fa-heart-o');
		this.classList.add('fa-heart');
	});
	heart.addEventListener('mouseout', function () {
		//console.log(typeof(likesNB));
		if (parseInt(likesNB) == 0) {
			this.classList.remove('fa-heart');
			this.classList.add('fa-heart-o');
		}
	});

	heart.addEventListener('click', function (e) {
		e.target.classList.remove('fa-heart');
		e.target.classList.add('fa-heart-o');
		xhr = new XMLHttpRequest();
		xhr.open('POST', rootURI + '/server/addNewLike.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.send(imgID);
		xhr.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) { //document ready
				//console.log(xhr.responseText);
				likesNB = xhr.responseText;
				//console.log(typeof(e.target.nextSibling.data));
				e.target.nextSibling.data = likesNB;
				//update heart
				if (likesNB > 0) {
					e.target.classList.remove('fa-heart-o');
					e.target.classList.add('fa-heart');
				}
			}
		}
	});
});
