<?php
$id = htmlspecialchars(mysql_real_escape_string($_REQUEST['id']));
$user_id = htmlspecialchars(mysql_real_escape_string($_REQUEST['user_id']));
if(isset($id) && isset($user_id))
{
	$res = mysql_query("SELECT * FROM messages WHERE msg_id = '$id'") or die(mysql_error());
	$res = mysql_fetch_assoc($res);
	echo "Message for user_id = $user_id and message_id = $message_id";
	echo "<div>$res[body]</div>";
}
?>
