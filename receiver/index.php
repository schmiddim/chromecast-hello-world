<?php	require_once '../config.php';?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/receiver.css" />
<body class="initial">
	<div class="messages">
		<h1>Waiting for Messages...</h1>
	</div>
</body>

<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="https://www.gstatic.com/cast/js/receiver/1.0/cast_receiver.js"></script>
<script>
	$(function() {
		var receiver = new cast.receiver.Receiver('<?php echo CHROME_CAST_APP_ID;?>', ['<?php echo CHROME_CAST_NAMESPACE;?>']),
			channelHandler = new cast.receiver.ChannelHandler('<?php echo CHROME_CAST_APP_ID;?>'),
			$messages = $('.messages'),
			$body = $('body');
		
		channelHandler.addChannelFactory(
			receiver.createChannelFactory('<?php echo CHROME_CAST_NAMESPACE;?>'));

		receiver.start();

		channelHandler.addEventListener(cast.receiver.Channel.EventType.MESSAGE, onMessage.bind(this));

		function onMessage(event) {
			$messages.html(event.message.type);
		}
	});
</script>

</html>