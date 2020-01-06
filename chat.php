<script>
  var wSocket = new WebSocket("ws://ccit.cafe24.com/chat.php");
  
  wSocket.onmessage = function(e){  alert(e.data);  }  

  wSocket.onopen = function(e){ alert("OK"); } 
  wSocket.onclose = function(e){ alert("Close"); }  

  function send(){ //서버로 데이터를 전송하는 메서드
    wSocket.send("Hello");
  }
</script>
zzzzzz
