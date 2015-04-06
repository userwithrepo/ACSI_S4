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
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 39c3bf13
    echo str_replace($_POST['v'], "\'", "");
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 30cb91c6
    echo $_POST['a'];
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 8d9a26d7
    echo $_POST['b'];
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 020f0d86
    echo $_POST['c'];
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 3afca672
    echo $_POST['d'];
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 42faa7e4
    echo $_POST['e'];
    //TODO: AI XSS issue #56, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/56, 49e55a1e
    echo $_POST['f'];
}


?>
