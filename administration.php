<?php

include_once 'Famille.php';
session_start();
//Si le mec n'est pas connecté et est arrivé un peu par hasard sur cette
//page, autant le faire partir tout de suite, il n'a pas le droit
if (empty($_SESSION['mail'])){
	header('Location: gerer.php');
}else{
	$utilisateur = $_SESSION['mail'];
}









?>




<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A layout example that shows off a responsive pricing table.">

	<title>CLSH</title>

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



    	<div class="l-content">
    		<div class="contenu">
    			<div class="contenumoi">
    				<?php
//var_dump(Famille::findByMail($_SESSION['mail']));
    				$code = '<h3>Panneau d\'administration de '. Famille::findByMail($utilisateur)->getAttr("nom_resp") .' '. Famille::findByMail($utilisateur)->getAttr("pre_resp") .' <span class="right">[<a href="logout.php">DÉCONNEXION</a>]</span></h3><br/>';
	//$code = '<h3>Bonjour</h3>';
    				echo $code;


    				?>	
<!-- <div class="infohiddena">-</div>			

</div>



</div>
    <div class="information pure-g">
    	<div class="pure-u-1 pure-u-med-1-2"> -->

    		<?php


    		if (sizeof($_GET)==0)
    		{
    			$code = '

    			<div class="toutbrun">

    			<div class="information pure-g">
        <div class="pure-u-1 pure-u-med-1-2">
            <div class="l-box">
                <h3 class="information-head">Avant de commencer</h3>
                <p>
                <a class="brunlien" href="administration.php?a=maj">
                    Si c\'est votre première connexion sur notre site, nous vous invitons à compléter le reste de votre profil en cliquant ici-même. Sans ces quelques renseignements complémentaires nous ne pourrons garantir une place dans nos centre pour vos enfants.
                </a>
                </p>
               
            </div>
        </div>


        

        <div class="pure-u-1 pure-u-med-1-2">
            <div class="l-box">
                <h3 class="information-head">Ses réservations</h3>
                <p>
                <a href="administration.php?a=etat" class="brunlien">
                    Vous avez déjà inscris un ou plusieurs de vos enfants. Vous voulez voir un récapitulatif de vos réservations ou vous souhaitez en annuler une ? Venez par là !
                </a>
                </p>
                
            </div>
        </div>

        <div class="pure-u-1 pure-u-med-1-2">
            <div class="l-box">
                <h3 class="information-head">Inscrire un enfant</h3>
                <p>
                <a class="brunlien" href="administration.php?a=inscription">
                    Vous avez trouvé la destination vers laquelle votre enfant souhaite partir ? Inscrivez-le dès maintenant ici, et recevez tous les renseignements nécessaires au séjour.
                </a>
                </p>
                
            </div>
        </div>

        <div class="pure-u-1 pure-u-med-1-2">
            <div class="l-box">
                <p>
                    
                    <img style="height: 160px; width: 160px; margin-left: 30%;" src="http://bob.vos.net/images/doge.png"/>
                </p>
                
            </div>
        </div>



        </div> <!-- tout brun -->
    			</div>	<!-- info pure -->		

    		</div> <!-- contenu moi-->	



    	</div> <!-- l-content -->	
    	<div class="information pure-g">
    		<div class="pure-u-1 pure-u-med-1-2">

    		</div>
    	</div>




    			';

    			echo $code;


    		}





    		if ((sizeof($_GET)!=0) && $_GET['a']=='maj')
    		{

    			$utilisateur = Famille::findByMail($_SESSION['mail']);
    			$adresse = $utilisateur->getAttr("adr_resp");
    			$telephone = $utilisateur->getAttr("tel_resp");
    			$ville = $utilisateur->getAttr("en_ville");
    			$alloc = $utilisateur->getAttr("noalloc_caf_resp");
    			$bons = $utilisateur->getAttr("bons_vac");

    			$code = '<div class="infohiddena">-</div>			

    		</div>



    	</div>
    	<div class="information pure-g">
    		<div class="pure-u-1 pure-u-med-1-2">


    			<div class="l-box"><h4>Mise à jour de son profil : </h4></div><form method="post" class="pure-form pure-form-aligned">
    			<fieldset>
    				<div class="pure-control-group">
    					<label for="adresse">Adresse</label>
    					<input name="adresse" id="adresse" type="text" placeholder="Adresse" value="'.$adresse.'" required>
    				</div>

    				<div class="pure-control-group">
    					<label for="ville">Ville</label>
    					<input name="ville" id="ville" type="text" placeholder="Ville" value="'.$ville.'" required>
    				</div>

    				<div class="pure-control-group">
    					<label for="telephone">Téléphone</label>
    					<input name="telephone" id="telephone" type="text" placeholder="Téléphone" value="'.$telephone.'" required>
    				</div>

    				<div class="pure-control-group">
    					<label for="alloc">Numéro d\'allocataire</label>
    					<input name="alloc" id="alloc" type="text" placeholder="Numéro d\'allocataire" value="'.$alloc.'" required>
    				</div>



    				<div class="pure-control-group">
    					<label for="bons_vac">Montant bons vacances</label>
    					<input name="bons_vac" id="bons_vac" type="text" placeholder="Montant bons" value="'.$bons.'" required>
    				</div>



    				<div class="pure-controls">


    					<button type="submit" name="action" value="update" class="pure-button pure-button-primary">Submit</button>
    				</div>
    			</fieldset>';

    			if (isset($_POST["action"]) && $_POST["action"] === "update") {
    				$code .= "Mise-à-jour réussie, merci !";
    				$utilisateur->setAttr("adr_resp", htmlspecialchars($_POST['adresse']));
    				$utilisateur->setAttr("en_ville", htmlspecialchars($_POST['ville']));
    				$utilisateur->setAttr("tel_resp", htmlspecialchars($_POST['telephone']));
    				$utilisateur->setAttr("noalloc_caf_resp", htmlspecialchars($_POST['alloc']));
    				$utilisateur->setAttr("bons_vac", htmlspecialchars($_POST['bons_vac']));

    				$utilisateur->save();

    			}
    			$code .='
    		</form>

    	</div>

    	<div class="pure-u-1 pure-u-med-1-2">
    		<div class="l-box">
    			<h3 class="information-head">Pourquoi éditer mon profil ?</h3>
    			<p>
    				Nous avons besoin de certains renseignements pour nous assurer que votre enfant sera bien inscrit dans la colonie de votre choix.
    				Aussi, ces renseignements seront utilisés afin de calculer le montant total que vous devrez débourser, le prix changeant en fonction du quotient familial.

    			</p>

    			<a style="margin-left: 12%" class="button-choose pure-button" href="gerer.php">Retour au panel d\'administration</a>

    		</div>
    	</div>
    </div> <!-- end information -->
</div> <!-- end l-content -->







</body>



';



echo $code;	
}else{

		// $code = '<a href="administration.php?a=maj">maj</a>';
		//echo $code;
}





?>





</html>
