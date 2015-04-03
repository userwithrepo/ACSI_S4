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
    $val = $_POST['v'];
    $val = $_POST['a'];
    $val = $_POST['b'];
    $val = $_POST['c'];
    $val = $_POST['d'];
    $val = $_POST['e'];
    $val = $_POST['f'];
}


?>
