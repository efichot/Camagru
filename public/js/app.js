/*******************
		APP
*******************/

// Grab elements, create settings, etc.
var video = document.querySelector('#camera');
// Elements for taking the snapshot
var canvas = document.querySelector('#canvas');
var context = canvas.getContext('2d');
//dimension canvas
var canvasWidth = video.offsetWidth;
var canvasHeight = Math.floor(canvasWidth / 1.33);
//hidden img
var topLeftIMG = document.querySelector('#top-left-img');
var returnIMG = document.querySelector('#return-img');
// Webcam active ou pas
var webcam = true;

// Get access to the camera!
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	if (!navigator.getUserMedia) { //Browser compatibility
		navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
	}
	// Not adding `{ audio: true }` since we only want video now
	if (navigator.getUserMedia) {
		navigator.getUserMedia({video: true}, function(stream) {
			//set canvas size
			canvas.setAttribute('width', canvasWidth);
			canvas.setAttribute('height', canvasHeight);
			//canvas.classList.remove('hidden');
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, isNoWebcam);
	}
}

var data = {
	'img' : null,
	'size' : {
		'width' : canvasWidth,
		'height' : canvasHeight
	}
};

function isNoWebcam(error) {
	webcam = false;
	console.log('An error occured:' + error);
	document.querySelector('#tab-upload').classList.remove('hidden');
	document.querySelector('#no-camera').classList.remove('hidden');
	video.classList.add('hidden');
	document.querySelector('#no-camera').addEventListener('change', function (e) {
		var imgType = (e.target.files[0].name.split('.')).pop().toLowerCase();
		var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];
		if (allowedTypes.indexOf(imgType) != -1) {
			var file = e.target.files[0];
			var reader = new FileReader();
			reader.addEventListener('load', function (e) {
				data.img = reader.result;
				topLeftIMG.classList.remove('hidden');
				topLeftIMG.src = data.img;
			});
			reader.readAsDataURL(file);
		}
	});
}

// Trigger photo take
document.querySelector("#snap").addEventListener("click", function() {
	if (webcam) {
		context.drawImage(video, 0, 0, canvasWidth, canvasHeight);
		data.img = canvas.toDataURL('image/jpeg', 1.0);
	} else {
		data.size.width = topLeftIMG.width;
		data.size.height = topLeftIMG.height;
	}
	var rootURI = '/' + location.pathname.split('/')[1]; // /camagru
	//XMLHttpRequest
	var xhr = new XMLHttpRequest();
	xhr.open('POST', rootURI + '/server/saveImage.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //because POST method
	xhr.send(JSON.stringify(data));
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) { //response ready
			//console.log(xhr.responseText);
			returnIMG.src = xhr.responseText;
			returnIMG.style.display = 'block';
		}
	};
});



/*************************
         FILTERS
**************************/


var normal = document.getElementById('Normal'),
		_1977 = document.getElementById('1977'),
		aden = document.getElementById('Aden'),
		brooklyn = document.getElementById('Brooklyn'),
		clarendon = document.getElementById('Clarendon'),
		earlybird = document.getElementById('Earlybird'),
		gingham = document.getElementById('Gingham'),
		hudson = document.getElementById('Hudson'),
		inkwell = document.getElementById('Inkwell'),
		lark = document.getElementById('Lark'),
		lofi = document.getElementById('Lo-Fi'),
		mayfair = document.getElementById('Mayfair'),
		moon = document.getElementById('Moon'),
		nashville = document.getElementById('Nashville'),
		perpetua = document.getElementById('Perpetua'),
		reyes = document.getElementById('Reyes'),
		rise = document.getElementById('Rise'),
		slumber = document.getElementById('Slumber'),
		toaster = document.getElementById('Toaster'),
		walden = document.getElementById('Walden'),
		willow = document.getElementById('Willow'),
		xpro2 = document.getElementById('X-pro-II');

	var sepia = document.getElementById('Sepia'),
		blur = document.getElementById('Blur');

	var camera = document.getElementById('camera'),
		canvas = document.getElementById('canvas'),
		returnIMG = document.getElementById('return-img'),
		topLeftIMG = document.getElementById('top-left-img');

	function removeAllClass(div) {
		classList = div.classList;
		for (var index = 0; index < classList.length; index++) {
			if (classList[index] !== 'hidden')
				div.classList.remove(classList[index]);
		}
	}

	function resetAllFilter() {
		removeAllClass(camera);
		removeAllClass(canvas);
		removeAllClass(returnIMG);
		removeAllClass(topLeftIMG);
	}

	function setNewFilter(filterClass) {
		removeAllClass(camera);
		removeAllClass(canvas);
		removeAllClass(returnIMG);
		removeAllClass(topLeftIMG);
		camera.classList.add(filterClass);
		canvas.classList.add(filterClass);
		returnIMG.classList.add(filterClass);
		topLeftIMG.classList.add(filterClass);
	}

	normal.addEventListener('click', function(e) {
		e.preventDefault();
		resetAllFilter();
	}, false);

	_1977.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('_1970');
	}, false);

	aden.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('aden');
	}, false);

	brooklyn.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('brooklyn');
	}, false);

	clarendon.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('clarendon');
	}, false);

	earlybird.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('earlybird');
	}, false);

	gingham.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('gingham');
	}, false);

	hudson.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('hudson');
	}, false);

	inkwell.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('inkwell');
	}, false);

	lark.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('lark');
	}, false);

	lofi.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('lofi');
	}, false);

	mayfair.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('mayfair');
	}, false);

	moon.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('moon');
	}, false);

	nashville.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('nashville');
	}, false);

	perpetua.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('perpetua');
	}, false);

	reyes.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('reyes');
	}, false);

	rise.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('rise');
	}, false);

	slumber.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('slumber');
	}, false);

	toaster.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('toaster');
	}, false);

	walden.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('walden');
	}, false);

	willow.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('willow');
	}, false);

	xpro2.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('xpro2');
	}, false);

	sepia.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('sepia');
	}, false);

	blur.addEventListener('click', function(e) {
		e.preventDefault();
		setNewFilter('blur');
	}, false);
