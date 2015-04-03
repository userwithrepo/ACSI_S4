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
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, 87c0b1dc
    echo $_POST['v'];
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, c5f06e04
    echo $_POST['a'];
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, 990ba466
    echo $_POST['b'];
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, 222af8e1
    echo $_POST['c'];
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, f4325005
    echo $_POST['d'];
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, ea4b5a80
    echo $_POST['e'];
    //TODO: AI XSS issue #38, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/38, 8ded9b9c
    echo $_POST['f'];
}


?>
