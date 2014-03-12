<?php
	include_once 'Famille.php';
	$log = '';
	session_start();

	//si déjà connecté, on l'emène sur son espace d'administration
    if(isset($_SESSION['mail']))
    	header("Location: administration.php");
    

	if (isset($_POST["action"]) && $_POST["action"] === "login") {
			if(isset($_POST["email"]) && (!empty($_POST["email"])) && isset($_POST["pwd"]) && (!empty($_POST["pwd"]))){
				$mail = htmlentities($_POST['email']);
				$user = Famille::findByMail($mail);
				//var_dump($user);
				if($user==false){
					$log = 'Cet utilisateur n\'existe pas.<br/>';
				} else {
					$mdp = $user->getAttr("password");
					$salt = $user->getAttr("mail");
					if($mdp != sha1(sha1($_POST['pwd']).$salt)){
						$log = 'Mot de passe incorrect.<br/>';
					}else{
						//tout va bien on peut le connecter
						$log = 'Connexion en cours.<br/>';
						$_SESSION['mail'] = $_POST['email'];
						header("Refresh: 2; url=administration.php");
					}
				}
			} else {
				$log = 'Veuillez remplir tous les champs.';
			}
		} else if (isset($_POST["action"]) && $_POST["action"] === "signin") {
			if(isset($_POST["email"]) && (!empty($_POST["email"])) && 
				isset($_POST["pwd"]) && (!empty($_POST["pwd"])) && 
				isset($_POST["cpwd"]) && (!empty($_POST["cpwd"])) &&
				isset($_POST["nom"]) && (!empty($_POST["nom"])) &&
				isset($_POST["prenom"]) && (!empty($_POST["prenom"])) &&
				isset($_POST["type"]) && (!empty($_POST["type"])) &&
				isset($_POST["adresse"]) && (!empty($_POST["adresse"])) &&
				isset($_POST["ville"]) && (!empty($_POST["ville"])) &&
				isset($_POST["tel"]) && (!empty($_POST["tel"]))){
				
				if($_POST["pwd"] == $_POST["cpwd"]){
					
					$user = Famille::findByMail($_POST["email"]);

					if($user!=false)
						$log = 'Utilisateur déjà enregistré dans la base<br>';
					else {
						
						//On créé et lie à la famille
						$famille = new Famille();
						$famille->setAttr("nom_resp", htmlspecialchars($_POST['nom'])); 
						$famille->setAttr("pre_resp", htmlspecialchars($_POST['prenom']));
						$famille->setAttr("type_resp", htmlspecialchars($_POST['type']));
						$famille->setAttr("adr_resp", htmlspecialchars($_POST['adresse']));
						$famille->setAttr("en_ville", htmlspecialchars($_POST['ville']));
						$famille->setAttr("tel_resp", htmlspecialchars($_POST['tel']));
						$famille->setAttr("mail", htmlspecialchars($_POST['email']));
						$famille->setAttr("password", htmlspecialchars($_POST['pwd']));

						$famille->insert();

						$log = 'Inscription prise en compte. Merci. ';
						$log .= 'Connexion en cours. <br>';
						$_SESSION['mail'] = $_POST['email'];
						header("Refresh: 2; url=administration.php");
						//On le redirige vers l'accueil
				
						$_SESSION['login'] = $_POST['email'];

						
					}

				}else
					$log = 'Les mot de passes sont différents.';
			}else
				$log =  'Veuillez remplir tous les champs.';
		}
?>


<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A layout example that shows off a responsive pricing table.">

	<title>Administration Famille</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">




    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/main-grid-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/main-grid.css">
        <!--<![endif]-->



    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/pricing-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/pricing.css">
        <!--<![endif]-->

    </head>
    <body>

    	<div class="pure-menu pure-menu-open pure-menu-horizontal">
    		<a href="#" class="pure-menu-heading">Your Logo</a>
    		<ul>
    			<li><a href="index.html">Home</a></li>
    			<li><a href="dispo.php">Disponibilités</a></li>
    			<li class="pure-menu-selected"><a href="gerer.php">Gestion</a></li>
    			<li><a href="#">Factures</a></li>
    			<li><a href="#">Contact</a></li>
    		</ul>
    	</div>


    	<div class="contenu">
    		<div class="contenumoi">
    			<br/><br/>
    			<div class="infohiddenb">-</div>
    			<div class="information pure-g">
    				<div class="pure-u-1 pure-u-med-1-2">
    					<div class="l-box">
    						<h3 class="information-head">Déjà inscrit ?</h3>
    						<p>
    							Vous avez déjà inscrit un de vos enfants dans une de nos colonies et vous voulez modifier les modalités d'inscription ? Vous souhaitez ajoutez un autre enfant ? Vous souhaitez annuler une inscription ? C'est par-ici que ça se passe !
    						</p>
    						<form class="pure-form" action="">
    							<button style="margin-left: 35%" name="choix" value="connexion" id="submit" type="submit" class="button-choose pure-button">Connexion</button>
    						</form>
    					</div>

    				</div>

    				<div class="pure-u-1 pure-u-med-1-2">
    					<div class="l-box">
    						<h3 class="information-head">Nouveau par ici ?</h3>
    						<p>
    							Votre enfant n'a pas encore eu la chance de partir avec nous ? Ça ne saurait tarder. Inscrivez-le sans plus attendre dans un de nos nombreux centre afin qu'il passe des vacances inoubliables ! Seul ou à plusieurs, il s'amusera.
    						</p>
    						<form class="pure-form" action="">
    							<button style="margin-left: 35%" name="choix" value="inscription" id="submit" type="submit" class="button-choose pure-button">Inscription</button>
    						</form>
    					</div>
    				</div>
    			</div>



    			<?php
    			$code = '<br/><br/><br/><div class="infohiddenb">-</div><br/>

				

    			';




    			if(isset($_GET['choix']))
    				if($_GET['choix']=='connexion'){
    					$code .= '
    				
    				<form method="post" class="pure-form">
    					<fieldset>
    						<legend>Veuillez vous connecter</legend>

    						<input class="test" name="email" type="email" placeholder="Email" required>
    						<input class="test" name="pwd" type="password" placeholder="Password" required>

    						<button type="submit" name="action" value="login" class="pure-button pure-button-primary">Log in</button>
    					</fieldset>
    				</form>

    				';

    			


    				}else if ($_GET['choix']=='inscription')
    					$code .= '
    				<form method="post"><span class="pure-form">
    					<fieldset>
    						<legend>Veuillez vous enregistrer</legend>

    						<input class="test" name="email" type="email" placeholder="Email" required>
    						<input class="test" name="pwd" type="password" placeholder="Password" required>
    						<input class="test" name="cpwd" type="password" placeholder="Vérification Password" required>

    						<input class="test" name="nom" type="text" placeholder="Nom" required>
    						<input class="test" name="prenom" type="text" placeholder="Prénom" required>
    						<input class="test" name="type" type="text" placeholder="Type : Père/Mère" required>
							<input class="test" name="adresse" type="text" placeholder="Adresse" required>
    						<input class="test" name="ville" type="text" placeholder="Ville" required>
    						<input class="test" name="tel" type="text" placeholder="Téléphone" format="NNNNNNNNNN" required>
							

							<button type="submit" name="action" value="signin" class="pure-button pure-button-primary">Sign in</button>
							
    					</fieldset>
    				</span></form>


    				';

    				echo $code;

		
					echo $log;
?>