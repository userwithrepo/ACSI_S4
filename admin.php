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
    echo $_POST['v'];
    echo $_POST['a'];
    echo $_POST['b'];
    echo $_POST['c'];
    echo $_POST['d'];
    echo $_POST['e'];
    echo $_POST['f'];
}


?>
