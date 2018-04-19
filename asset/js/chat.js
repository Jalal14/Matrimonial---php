$(document).ready(function () {
	var timer = 10;
	inTime();
	function inTime() {
		/**$("#message-body").html("loading..."+timer);**/
		setTimeout(inTime, 1000);
		if (timer<=8) {
			/**$("#message-body").html("loaded..."+timer);**/
			timer=15;
		}
		timer--;
	}
	$("#send").on("click",function() {
		var sender = $("#userId").val();
		var send_to = $("#friendId").val();
		var message = $("#message").val();
		$.ajax({
			url		: "?conversation_conversation&send_to="+send_to+"&sender="+sender+"&message="+message,
			type	: "post",
			success	: function (data) {
				setInterval(function() {cache_clear() }, 3000);
			},
			error	: function (xhr) {
				alert(xhr.status);
			}
		});
	});
});