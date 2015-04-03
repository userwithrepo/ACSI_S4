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
    //FP: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, ed0ff580
    echo $_POST['v'];
    //TODO: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, 0b2bb647
    echo str_replace($_POST['a'], "\"", "");
    //TODO: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, 453477dc
    echo $_POST['b'];
    //TODO: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, 585ce7ca
    echo $_POST['c'];
    //TODO: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, 344b1248
    echo $_POST['d'];
    //TODO: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, c0dbc9fd
    echo $_POST['e'];
    //TODO: AI XSS issue #39, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/39, 4f31cd61
    echo $_POST['f'];
}


?>
