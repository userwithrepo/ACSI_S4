<?php

session_start();
//Si le mec n'est pas connecté et est arrivé un peu par hasard sur cette
//page, autant le faire partir tout de suite, il n'a pas le droit
if (empty($_SESSION['mail'])){
	//header('Location: gerer.php');
}else{
	$utilisateur = $_SESSION['mail'];
}

if (isset($_POST['v']))
{
    $val = $_POST['v']."php";
    //TODO: AI XSS issue #27, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/27
    echo $val;
}


?>
