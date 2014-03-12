<?php

include_once 'Site.php';
include_once 'Unite.php';
include_once 'Offre.php';
include_once 'Semaine.php';

$liste = Site::findAll();

$tag = 0;

$code ='';




?>


<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A layout example that shows off a responsive pricing table.">

	<title>Disponibilités</title>

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
    			<li class="pure-menu-selected"><a href="dispo.php">Disponibilités</a></li>
    			<li><a href="gerer.php">Gestion</a></li>
    			<li><a href="#">Factures</a></li>
    			<li><a href="#">Contact</a></li>
    		</ul>
    	</div>


    	<div class="contenu">
    		<div class="contenumoi">
    			<br/><br/>
 	<div class="infohiddenv">-</div>
     			<div class="information pure-g">
        <div class="pure-u-1 pure-u-med-1-2">
            <div class="l-box">
                <h3 class="information-head">Regardez les disponibilités</h3>
                <p>
                	Grâce au menu déroulant, sélectionnez le lieu où vous aimeriez que votre enfant fasse sa colonie. Nous irons voir pour vous le nombre de places encore disponibles. Nos colonies sont ouvertes à plusieurs tranches d'âges. Vous pouvez donc faire partir tous vos enfants vers le même lieu.
                </p>
            </div>
        </div>

        <div class="pure-u-1 pure-u-med-1-2">
            <div class="l-box">
                <h3 class="information-head">Choisissez une destination</h3>
                <p>
                	Vous avez fait votre choix ? Vous avez trouvé le lieu qui correspondra le plus à votre ou vos enfants. Un lieu paradisiaque bien au calme, ou au contraire une colonie sportive remplie de rebondissements. N'attendez plus une seule seconde pour aller l'inscrire dans l'onglet Gestion !</p>
            </div>
        </div>
        </div>

		
        

<!-- <table class="pure-table pure-table-horizontal">
    <thead>
        <tr>
            <th>Tableau exemple</th>
            <th>Du xx-xx-xxxx au xx-xx-xxxx</th>
            <th>Du xx-xx-xxxx au xx-xx-xxxx</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Grands</td>
            <td>Honda</td>
            <td>Accord</td>
        </tr>

        <tr>
            <td>Petits</td>
            <td>Toyota</td>
            <td>Camry</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Hyundai</td>
            <td>Elantra</td>
        </tr>
    </tbody>
</table>
-->




<?php
if (!empty($liste)) {


	

	$code .= '<form class="pure-form" action="">';
	$code .= '<fieldset>';
	$code .= '<legend></legend>';


		//$code ='<div class="pure-u-2-3"> <div class="pure-u-1 pure-u-med-1-3">';
	$code .= '<span class"decal"="" style="margin-left: 10%;"><label for="state">Site : </label></span>';
	//$code .= '<span class"decal"><label for="state">Site : </label></span>';
	$code .= '<select name ="state" id="state" class="pure-input-1-8">';
		//$code .= '<option></option>';
	foreach ($liste as $key) {
		if (isset($_GET["state"]) && ($key->getAttr("nom_site")==$_GET["state"])) {
			$code .= '<option value="'.$key->getAttr("nom_site").'" selected="selected">'. $key->getAttr("nom_site") .'</option>'; 
			$tag = $key->getAttr("no_site");
		} else
		$code .= '<option value="'.$key->getAttr("nom_site").'">'. $key->getAttr("nom_site") .'</option>';
	}
	$code .= '</select> ';
	$code .= '<button name="action" value="show" id="submit" type="submit" class="pure-button pure-button-primary">Valider</button>';



	$code .= '</fieldset>';
	$code .= '</form>';
		//echo $code;
} else {
	$code = 'Pas de site disponible';
}

echo $code;

if (isset($_GET["state"])) {
	$state = $_GET["state"];
	$code = '';
		//echo $tag;
	$site = Site::findById($tag);
	$unite = Unite::findAllById($tag);
	$tableau_unite = Array();
	$tableau_numero = Array();
	$tableau_total = Array();
	foreach ($unite as $data) {
		$nom =  $data->getAttr("nom_unite");
		$numero = $data->getAttr("no_unite");
		array_push($tableau_unite, $nom);
		array_push($tableau_numero, $numero);

		$tableau_total[$numero] = $nom;	
	}
		// echo 'DUMP TOTAL : <br/>';
		// var_dump($tableau_total);



		/* Pour chaque valeurs du tableau_numero
		   On va dans la table Offre pour calculer 
		   le nombre de places restantes */
		   $tableau_bla = Array();

		   foreach ($tableau_numero as $num) {
		   	$bla = Offre::findByUnit($num);
		   	array_push($tableau_bla, $bla);
		   }

		  // echo '<br/><br/>DUMP BLA : <br/>';
		  // var_dump($tableau_bla);
		  // echo '<br/>';
		   $tab_places = Array();
		   $tab_semaine = Array();
		   foreach ($tableau_bla as $unite) {
		   	$nbp = $unite->getAttr("nb_places_offertes");
		   	$nbpo = $unite->getAttr("nb_places_occupees");
		   	$nb_restant = $nbp - $nbpo;
		   	$num_semaine = $unite->getAttr("sem_sej");
		   	array_push($tab_semaine, $num_semaine);

		  	//echo $nbp . ' - '. $nbpo . ' =  ' .$nb_restant . '<br/>';
		   	array_push($tab_places, $nb_restant);
		   }

		  // echo '<br/><br/>';

		  // var_dump($tab_semaine);

		   $test = array_unique($tab_semaine);
		  // var_dump($test);

		   $sem = Array();
		   $delais = Array();
		   foreach ($test as $num) {
		   	$semaine = Semaine::findById($num);	
		   	$chaine = "Du ".$semaine->getAttr("du_sem")." au ".$semaine->getAttr("au_em");
		   	array_push($sem, $semaine);
		   	array_push($delais, $chaine);
		   }


		  // echo 'DUMP : <br/>';
		  // var_dump($sem);




		   if(sizeof($tableau_unite)>0) {



		   	$code .= '<table class="pure-table pure-table-horizontal">
		   	<thead>
		   		<tr>
		   		<th>'.$state.'</th>';
		   			$i = 1;
		   			while ($i <= sizeof($test)) {
		   				$code .= '<th>'.$delais[$i-1].'</th>';
		   				$i++;
		   			}
		   			$code .= 	'</thead>

		   			<tbody>';
		   				$j = 1;
		   				while ($j <= sizeof($tableau_total)) {
		   					$code .= '<tr>';
		   					$code .= '<th>'.$tableau_total[$j].'</th>';
		   					$code .= '<td>'.$tab_places[$j-1].' place(s) disponible(s)</td>';
		   					$code .= '</tr>';
		   					$j++;
		   				}



		   				$code .='</tbody>
		   			</table><br/><br/>';



		   	$code .='

		

			<div class="infohiddenv">
				-
			</div>



		   	';



// 		<table class="pure-table pure-table-horizontal">
//     <thead>
//         <tr>
//             <th>Tableau exemple</th>
//             <th>Du xx-xx-xxxx au xx-xx-xxxx</th>
//             <th>Du xx-xx-xxxx au xx-xx-xxxx</th>
//         </tr>
//     </thead>

//     <tbody>
//         <tr>
//             <td>Grands</td>
//             <td>Honda</td>
//             <td>Accord</td>
//         </tr>

//         <tr>
//             <td>Petits</td>
//             <td>Toyota</td>
//             <td>Camry</td>
//         </tr>

//         <tr>
//             <td>3</td>
//             <td>Hyundai</td>
//             <td>Elantra</td>
//         </tr>
//     </tbody>
// </table>
		   		}
		   	} else 
		   	$code = '';

		   	echo $code

		   	?>









		   </div>
		</div>



	</body>

	</html>