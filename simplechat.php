<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://jslib.dpush.co.kr:9000"></script>
<script>
var client = new DPClient('f3509c81f8494447859ad2');
var group = client.openGroup('chat-group',{'sendevent':true});
group.onReceive('chat-action', function(data, userid, custinfo) {
	var chatscreen = document.getElementById("chatscreen");
	chatscreen.innerHTML += "관리자 : " + data + "<br>";
	chatscreen.scrollTop = chatscreen.scrollHeight; 
});
function talk() {
	var txt = document.getElementById("chatinput").value;
	document.getElementById("chatinput").value = '';
	group.send('chat-action', txt);
}
</script>
</head>
<body>
	<form name="chatform" onsubmit="return false;">
		<div style="width:1020px; height:500px;">
			<div id="chatscreen" style="width:90%;height:90%;border:1px solid green;overflow:auto; float:left"></div>
			<input type="text" name="chatinput" id="chatinput" style="width:80%" onKeyPress="javascript:(event.keyCode == 13) ? talk(): null;"/>
			<input type="button" value="입 력" onclick="talk()" style="width:10%">
		</div>
	</form>
</body>
</html>
