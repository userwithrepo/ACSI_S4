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
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //v=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, 4abc1abe
    echo $_POST['v'];
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //a=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, 3785e7e8
    echo $_POST['a'];
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //b=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, 777eed21
    echo $_POST['b'];
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //c=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, f7fb5493
    echo $_POST['c'];
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //d=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, f03a2f2d
    echo $_POST['d'];
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //e=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, f2d69e05
    echo $_POST['e'];
    //AI exploit:
    //POST /../../../../../../PHP_Repos/userwithrepo.ACSI_S4/userwithrepo-ACSI_S4-09a585a/admin.php HTTP/1.1
    //Host: localhost
    //Accept-Encoding: identity
    //Connection: close
    //Content-Type: application/x-www-form-urlencoded
    //Content-Length: 41
    //
    //f=%3Cscript%3Ealert%281%29%3C%2Fscript%3E
    //TODO: AI XSS issue #69, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/69, 00712c74
    echo $_POST['f'];
}


?>
