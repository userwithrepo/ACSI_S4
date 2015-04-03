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
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, 44d8d4db
    echo $_POST['v'];
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, ac065e1c
    echo str_replace($_POST['a'], "\"", "");
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, 7ba9d68a
    echo $_POST['b'];
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, cd9d0936
    echo $_POST['c'];
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, 0bca84e7
    echo $_POST['d'];
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, 5c9cc2ed
    echo $_POST['e'];
    //TODO: AI XSS issue #41, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/41, a5a7f4e8
    echo $_POST['f'];
}


?>
