<?php
$id = $_GET['id'];
$user_id = $_GET['user_id'];
if(isset($id) && isset($user_id))
{
    // XSS 1 Fixed
    echo "Dialog: ".htmlspecialchars($id);
    $res = mysql_query("SELECT msg FROM dialogs WHERE user_id='$user_id'") or dir(mysql_error());
    $res = mysql_fetch_assoc($res);
    echo $res['msg'];
}
?>
