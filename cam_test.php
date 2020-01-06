<html>
<meta charset="UTF-8">
<meta name="viewport" contents="width=device-width, initial-scale=1.0">
<head>
<style type="text/css">
html, body { height:100%; margin:20; padding:0; }
div { width:100%; }
video {
	object-fit: contain;
}
.videostream, #cssfilters-video, #screenshot, #screenshot-img {
  width: 400px;
  height: 300px;
}
.videostream, #cssfilters-stream {
  background: rgba(255,255,255,0.5);
  border: 1px solid #ccc;
}
#screenshot {
  vertical-align: top;
}
</style>
</head>

<body>
	<div class="body-content">
		<!--
			<h2>1. WebRTC/getUserMedia</h2>
				<div style="text-align:center;">
					  <video id="screenshot-stream" class="videostream" autoplay=""></video>
					  <img id="screenshot">
					  <canvas id="screenshot-canvas" style="display:none;"></canvas>
					  <p><button id="screenshot-button">Capture</button> <button id="screenshot-stop-button">Stop</button></p>
				</div>
				<div style="text-align:center;">
				  <video id="cssfilters-video" class="grayscale" autoplay="" title="Click me to apply CSS Filters" alt="Click me to apply CSS Filters"></video>
				  <p><button id="cssfilters-apply">Apply CSS filter</button></p>
				</div>
		-->
		<form enctype="multipart/form-data" action="upload.php" method="post" >
			<h2>1. 브라우저 카메라 지원(WebRTC/getUserMedia)</h2>
			<ul>
				<li>브라우저에서 카메라를 지원하고, 카메라가 설치된 경우에만 작동함</li>
				<li><a href="https://www.html5rocks.com/en/tutorials/getusermedia/intro/#screenshot-video">PC/Mobile 공통 예시 확인하기</a></li>
				<li><a href="https://caniuse.com/?/#search=getusermedia">사용률: Global PC 90.32%, Mobile 89.94% Uses - 더 자세히 보기</a></li>
			</ul>

			<h2>2. 브라우저 카메라 미지원(HTML Media Capture/Input Elements)</h2>
			<ul>
				<li>브라우저 카메라를 지원하지 않을 경우 작동함</li>
				<li><a href="https://caniuse.com/#feat=html-media-capture">사용률: Global Mobile 94.5% Uses - 더 자세히 보기</a></li>
				<li>PC는 file 선택 화면 표시</li>
			</ul>
			<h4>PC 예시1) Regular file upload - 파일 선택 창 표시</h4>
			<input type="file"></input>

			<h4>Mobile 예시1) Regular file upload - 카메라+갤러리 등 모든 파일 선택 가능</h4>
			<input type="file"></input>

			<h4>Mobile 예시2) Capture Camera - 카메라가 바로 표시됨</h4>
			<input type="file" accept="image/*" capture="camera"></input>

			<h4>Mobile 예시3) Video Camera - 비디오 카메라가 바로 표시됨</h4>
			<input type="file" accept="video/*" capture></input>
			<input type="submit" value="Upload Image" name="submit">
		</form>


<script>
function handleError(error) {
  console.error('navigator.getUserMedia error: ', error);
}
const constraints = {video: true};

(function() {
  const button = document.querySelector('#screenshot-button');
  const img = document.querySelector('#screenshot-img');
  const video = document.querySelector('#screenshot-video');

  const canvas = document.createElement('canvas');

  button.onclick = video.onclick = function() {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);
    // Other browsers will fall back to image/png
    img.src = canvas.toDataURL('image/webp');
  };

  function handleSuccess(stream) {
    video.srcObject = stream;
  }

  navigator.mediaDevices.getUserMedia(constraints).
      then(handleSuccess).catch(handleError);
})();

(function() {
  var button = document.querySelector('#cssfilters-apply');
  var video = document.querySelector('#cssfilters-video');

  var filterIndex = 0;
  var filters = [
    'grayscale',
    'sepia',
    'blur',
    'brightness',
    'contrast',
    'hue-rotate',
    'hue-rotate2',
    'hue-rotate3',
    'saturate',
    'invert',
    ''
  ];

  button.onclick = video.onclick = function() {
    video.className = filters[filterIndex++ % filters.length];
  };

  function handleSuccess(stream) {
    video.srcObject = stream;
  }

  navigator.mediaDevices.getUserMedia(constraints).
      then(handleSuccess).catch(handleError);
})();
</script>
	</div>
</body>
</html>