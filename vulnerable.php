<?php
$id = $_GET['id'];
$user_id = $_GET['user_id'];
if(isset($id) && isset($user_id))
{
    //TODO: AI XSS issue #197, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/197, e4e5a9f4
    //AI exploit:
    //GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-b9b00de/vulnerable.php?user_id=1&id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    echo "Dialog: $id";
    //TODO: AI SQL issue #198, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/198, ce8228ca
    //AI exploit:
    //GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-b9b00de/vulnerable.php?user_id=%27+or+sleep%285%29+%3D+%271&id=1 HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    $res = mysql_query("SELECT msg FROM dialogs WHERE user_id='$user_id'") or dir(mysql_error());
    $res = mysql_fetch_assoc($res);
    //FP: AI XSS issue #197, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/197, 186cd75e
    //AI exploit:
    //GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-b9b00de/vulnerable.php?user_id=1&id=1 HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    echo $res['msg'];
}
?>
