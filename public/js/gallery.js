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

	//pagination
	var index = 0;
	var body = document.querySelector('.body');
	var  nb = 10;
	var wrap = document.querySelector('.gallery');
	var yFooter = (wrap.scrollWidth > 800 ? 200 : -240); //mobile version
	window.addEventListener('scroll', function (e) {
		//console.log(scrollHeight);
		var yOffset = this.pageYOffset;
		var yWrap = wrap.scrollHeight;
		if (yOffset >= (yWrap + yFooter) && index < nb) {
			index++;
			var xhr = new XMLHttpRequest();
			xhr.open('POST', rootURI + '/server/ajaxNewImage.php', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send(index);
			xhr.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) { //document ready
					if (xhr.responseText) {
						//console.log(xhr.responseText);
						response = JSON.parse(xhr.responseText);
						nb = response.nb;
						if (response.id) { // delete parasites
							if (response.likes == 0) {
										likes = '<li class="likes-nb"><i class="fa fa-4x fa-heart-o" aria-hidden="true"></i>' + response.likes + '</li>';
							} else {
										likes = '<li class="likes-nb"><i class="fa fa-4x fa-heart" aria-hidden="true"></i>' + response.likes + '</li>';
							}
							if (response.comments_nb == 0) {
										comments = '<li class="likes-nb"><i class="fa fa-4x fa-comment-o" aria-hidden="true"></i>' + response.comments_nb + '</li>';
							} else {
										comments = '<li class="likes-nb"><i class="fa fa-4x fa-comment" aria-hidden="true"></i>' + response.comments_nb + '</li>';
							}
							wrap.innerHTML += '<a href="' + '/camagru/single/' + response.id + '"><img class= "' + response.filter + '" src="' + response.base_64 + '"/></a><ul>' + likes + comments + '</ul>';
						}
					}
				}
			}
		}
	})
});
