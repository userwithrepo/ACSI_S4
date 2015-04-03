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
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['v'];
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['a'];
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['b'];
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['c'];
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['d'];
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['e'];
    //TODO: AI XSS issue #31, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/31, null
    //TODO: AI XSS issue #33, Medium, Cross-site Scripting, https://github.com/userwithrepo/ACSI_S4/issues/33, null
    echo $_POST['f'];
}


?>
