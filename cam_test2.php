<!DOCTYPE html>
 
<html>
 <meta charset="UTF-8">
<head>
 
    <title>Take or select photo(s) and upload</title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.1.0/exif.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-load-image/2.12.2/load-image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-load-image/2.12.2/load-image-scale.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-load-image/2.12.2/load-image-orientation.min.js"></script>
    <script type="text/javascript">
 
      function fileSelected() {
 
        var count = document.getElementById('fileToUpload').files.length;
 
              document.getElementById('details').innerHTML = "";
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById('fileToUpload').files[index];
 
                     var fileSize = 0;
 
                     if (file.size > 1024 * 1024)
 
                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
 
                     else
 
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
 
                     document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
 
                     document.getElementById('details').innerHTML += '<p>';
 					document.getElementById('frame').src = URL.createObjectURL(file);

					var file2;
					resetOrientation(file, 2, file2);

					document.getElementById('frame').src = URL.createObjectURL(file);
 
              }
 
      }
 
      function uploadFile() {
 
        var fd = new FormData();
 
              var count = document.getElementById('fileToUpload').files.length;
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById('fileToUpload').files[index];
 
                     fd.append('myFile', file);
 
              }
 
        var xhr = new XMLHttpRequest();
 
        xhr.upload.addEventListener("progress", uploadProgress, false);
 
        xhr.addEventListener("load", uploadComplete, false);
 
        xhr.addEventListener("error", uploadFailed, false);
 
        xhr.addEventListener("abort", uploadCanceled, false);
 
        xhr.open("POST", "upload.php");
 
        xhr.send(fd);
 
      }
 
      function uploadProgress(evt) {
 
        if (evt.lengthComputable) {
 
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
 
          document.getElementById('progress').innerHTML = percentComplete.toString() + '%';
 
        }
 
        else {
 
          document.getElementById('progress').innerHTML = 'unable to compute';
 
        }
 
      }
 
      function uploadComplete(evt) {
 
        /* This event is raised when the server send back a response */
 
        alert(evt.target.responseText);
 
      }
 
      function uploadFailed(evt) {
 
        alert("There was an error attempting to upload the file.");
 
      }
 
      function uploadCanceled(evt) {
 
        alert("The upload has been canceled by the user or the browser dropped the connection.");
 
      }

 
		function resetOrientation(srcBase64, srcOrientation, callback) {
		  var img = new Image();    

		  img.onload = function() {
			var width = img.width,
				height = img.height,
				canvas = document.createElement('canvas'),
				ctx = canvas.getContext("2d");

			// set proper canvas dimensions before transform & export
			if (4 < srcOrientation && srcOrientation < 9) {
			  canvas.width = height;
			  canvas.height = width;
			} else {
			  canvas.width = width;
			  canvas.height = height;
			}

			// transform context before drawing image
			switch (srcOrientation) {
			  case 2: ctx.transform(-1, 0, 0, 1, width, 0); break;
			  case 3: ctx.transform(-1, 0, 0, -1, width, height ); break;
			  case 4: ctx.transform(1, 0, 0, -1, 0, height ); break;
			  case 5: ctx.transform(0, 1, 1, 0, 0, 0); break;
			  case 6: ctx.transform(0, 1, -1, 0, height , 0); break;
			  case 7: ctx.transform(0, -1, -1, 0, height , width); break;
			  case 8: ctx.transform(0, -1, 1, 0, 0, width); break;
			  default: break;
			}

			// draw image
			ctx.drawImage(img, 0, 0);

			// export base64
			callback(canvas.toDataURL());
		  };

		  img.src = srcBase64;
		};

    </script>
 
</head>
 
<body>
 
  <form id="form1" enctype="multipart/form-data" method="post" action="upload.php">
 
    <div>

      <label for="fileToUpload">Take or select photo(s)</label><br />

      <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();" accept="image/*" capture="camera" />
 
    </div>
 
    <div id="details"></div>
	
	<img id="frame" width="300px">

	<img id="frame2">

    <div>
 
    <input type="button" onclick="uploadFile()" value="Upload" /><br>

    <input type="button" onclick="resetOrientation()" value="Upload" />

    </div>
 
    <div id="progress"></div>
 
  </form>
 
</body>
 
</html>