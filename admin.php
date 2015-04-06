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
    //REOPEN: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, 13573137
    echo $_POST['v'];
    //FP: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, a511dbc0
    echo $_POST['a'];
    //TODO: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, 3d752953
    echo $_POST['b'];
    //TODO: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, 9c679f93
    echo $_POST['c'];
    //TODO: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, 4432912b
    echo $_POST['d'];
    //TODO: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, 770d40e6
    echo $_POST['e'];
    //TODO: AI XSS issue #58, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/58, 882193eb
    echo $_POST['f'];
}


?>
