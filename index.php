<?php
/********************************************
*	Premier script PHP 						*
*	Formation WF3 le perray en Yvelines		*
*	Le 24/10/2016							*
*	Bruno TAVERNIER							*
* 											*
* ******************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Ma première page PHP</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/index.js"></script> 
</head>
<body>
	<h1>Ma première page PHP</h1>
	
	<a href="lasuite.php">La suite</a>

	<?php
		/* on commence un bloc PHP */

		$sTexte = "<p>Hello World! </p>";
		echo $sTexte;

		$iNombre = 55;
		$sNombre = "45";
		echo $iNombre + $sNombre; // addition d'un nombre et d'une chaine de caractères!!!!!
		echo '<hr/>';

		$fNombre = 5.6;
		echo $fNombre;
		echo '<hr/>';

		/* une constante pour la météo */
		define('TVA', 1.2);
		define('METEO', 'pluie');
		echo METEO.'<br/>';
		echo ($iNombre * TVA).'<br/>';

		echo ($iNombre += 2).'<br/>'; // equivalent à $iNombre = $iNombre + 2;
		echo ($iNombre -= 2).'<br/>'; // equivalent à $iNombre = $iNombre - 2;
		echo ($iNombre / 2) .'<br/>';
		echo ($iNombre % 2) .'<br/>';

		echo "la variable iNombre est définie à $iNombre. <br/>";
		echo 'la variable iNombre est définie à $iNombre. <br/>';
		echo 'la variable iNombre est définie à '.$iNombre.'. <br/>';
		echo '<h1 style="color: red;" id="aaa" class="toto">Titre</h1>';
		/* le style dans la balise c'est MAL!!! */

		$iNote = 10;
		if($iNote == 10){
			echo 'Tout juste la moyenne.';
		}
		else if($iNote < 10){
			echo 'Peut mieux faire.';
		}
		else print 'Bien.';

		/* équivalent à beaucoup de if/elseif/else ... */ 
		$sCommentaire = '';
		switch($iNote)
		{
			case 0: 	$sCommentaire = 'Etes vous venu en cours? ';
						break; // sortir du switch/case
			case 1:
			case 2:
			case 3:
			case 4: 	$sCommentaire = '<span class="null">NULL!</span>';
						break;
			case 5: 	$sCommentaire = '<span class="pNull">presque NULL</span>';
						break;
			case 6:		/* else if($iNote >= 6 && $iNote <= 9) */
			case 7:
			case 8:
			case 9: 	$sCommentaire = '<span class="pmf">Peut mieux faire</span>';
						break;
			case 10: 	$sCommentaire = '<span class="moyen">tout juste</span>';
						break;
			default: 	$sCommentaire = '<span class="bien">Bien</span>';
		}
		echo $sCommentaire;

		/* fonction de debuggage */
		echo '<hr/>';
		print_r($sCommentaire); // débuggage sans les types
		echo '<hr/>';
		var_dump($sCommentaire); //debuggage avec les types
		echo '<hr/>';
		
		$aTableau = array('Bruno', 'TAVERNIER', 10, 5.6);
		echo '<pre>';
		print_r($aTableau); // débuggage sans les types
		echo '<hr/>';
		var_dump($aTableau); //debuggage avec les types
		echo '</pre>';
		/* fin du bloc PHP */
		/* BON APPETIT */
	?>
	<p><?php echo "Lorem Ipsum..."; ?></p>

	<p><?= $sCommentaire; /* raccourci pour un echo */ ?></p>
</body>
</html>