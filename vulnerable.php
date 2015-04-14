<?php
$id = htmlspecialchars(mysql_real_escape_string($_REQUEST['id']));
$user_id = htmlspecialchars(mysql_real_escape_string($_REQUEST['user_id']));
if(isset($id) && isset($user_id))
{
	//FIXED: AI SQL issue #162, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/162, 3fe65cbb
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-19a3a67/vulnerable.php?user_id=1&id=%27+or+sleep%285%29+%3D+%271 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	$res = mysql_query("SELECT * FROM messages WHERE msg_id = '$id'") or die(mysql_error());
	$res = mysql_fetch_assoc($res);
	//FIXED: AI XSS issue #163, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/163, 1504a08d
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-19a3a67/vulnerable.php?user_id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	echo "Message for user_id = $user_id and message_id = $message_id";
	//REOPEN: AI XSS issue #163, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/163, 5fbb627b
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-e325a05/vulnerable.php HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	echo "<div>$res[body]</div>";
}
?>
