<?php
//TODO: AI XSS issue #149, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/149, 69899d4e
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-2ecc773/vulnerable.php?id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo $_REQUEST['id'];
$id = $_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
//TODO: AI XSS issue #149, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/149, 0af3d4a2
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-2ecc773/vulnerable.php?user_id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo "Message for user_id = $user_id and message_id = $message_id";
if(isset($id) && isset($user_id))
{
	//TODO: AI SQL issue #150, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/150, be925d49
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-2ecc773/vulnerable.php?user_id=%27+or+sleep%285%29+%3D+%271&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	//TODO: AI SQL issue #150, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/150, a3ece265
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-2ecc773/vulnerable.php?id=%27+or+sleep%285%29+%3D+%271 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	//TODO: AI SQL issue #152, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/152, 1f0328cc
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-a6077b1/vulnerable.php?user_id=%27+or+sleep%285%29+%3D+%271&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	$res = mysql_query("SELECT * FROM messages WHERE msg_id = '$id' AND user_id = '$user_id'") or die(mysql_error());
	$res = mysql_fetch_assoc($res);
	//TODO: AI XSS issue #149, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/149, 2a717743
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-2ecc773/vulnerable.php?user_id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	echo "Message for user_id = $user_id and message_id = $message_id";
	//TODO: AI XSS issue #149, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/149, f68b727d
	//AI exploit:
	//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-2ecc773/vulnerable.php?user_id=1&id=1 HTTP/1.1
	//Host: localhost
	//Accept-Encoding: identity
	//Connection: close
	echo "<div>$res[body]</div>";
}
?>
