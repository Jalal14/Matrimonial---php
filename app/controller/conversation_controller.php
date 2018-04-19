<?php
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	//$indexUrl = APP_ROOT."/index.php?{controller}_index";
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\user_service.php";
?>
<?php
	switch ($action) {
		case 'conversation':
			/**session_start();
			if ($_SERVER['REQUEST_METHOD']=="POST") {
				$message['sender'] = $_GET['sender'];
				$message['send_to'] = $_GET['send_to'];
				$message['time'] = date('Y-m-d h:m:s');
				$message['message'] = $_GET['message'];
				if(sendMessage($message)==1) {
					foreach ($messages as $message) {
						if ($message['message']!=null) {
							if ($message['sender']==$_SESSION['loggedUser']['uid']) {
								echo "<span style='float:right'><b><img style='height :20px; width :20px; border-radius: 20px;' src=".APP_ROOT."/asset/".$_SESSION['loggedUser']['propic']."></b></span>";
								echo "<span style='float:right'>".$message['message']."&nbsp;</span><br><br>";
							}else{
								echo "<span style='float:left'><b><img style='height :20px; width :20px; border-radius: 20px;' src=".APP_ROOT."/asset/".$searchedUser['propic']."></b></span>";
								echo "<span style='float:left'>&nbsp;".$message['message']."</span><br><br>";
							}
						}
					}
				}else{
					//echo "Failed";
				}
			}
			die();**/
			break;
		default:
			# code...
			break;
	}
?>