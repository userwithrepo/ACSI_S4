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
    //REOPEN: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, 8417ad2b
    echo str_replace($_POST['v'], "\"", "");
    //FP: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, 444f81be
    echo $_POST['a'];
    //TODO: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, 8985def8
    echo $_POST['b'];
    //TODO: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, a035f6a6
    echo $_POST['c'];
    //TODO: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, cf274d35
    echo $_POST['d'];
    //TODO: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, 196c1d16
    echo $_POST['e'];
    //TODO: AI XSS issue #61, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/61, 2a62f047
    echo $_POST['f'];
}


?>
