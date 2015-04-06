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
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, af3f56d6
    echo str_replace($_POST['v'], "\'", "");
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, 800d0fb8
    echo $_POST['a'];
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, 70f2870d
    echo $_POST['b'];
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, d02ea6bb
    echo $_POST['c'];
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, e88a83fa
    echo $_POST['d'];
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, 61d1e4d7
    echo $_POST['e'];
    //TODO: AI XSS issue #55, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/55, b242a27c
    echo $_POST['f'];
}


?>
