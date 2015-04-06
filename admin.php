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
    //TODO: AI XSS issue #47, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/47, null
    echo str_replace($_POST['v'], "\'", "");
    //TODO: AI XSS issue #48, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/48, null
    echo $_POST['a'];
    //TODO: AI XSS issue #49, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/49, null
    echo $_POST['b'];
    //TODO: AI XSS issue #50, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/50, null
    echo $_POST['c'];
    //TODO: AI XSS issue #51, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/51, null
    echo $_POST['d'];
    //TODO: AI XSS issue #52, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/52, null
    echo $_POST['e'];
    //TODO: AI XSS issue #53, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/53, null
    echo $_POST['f'];
}


?>
