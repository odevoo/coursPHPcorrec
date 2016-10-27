<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>La suite de ma seconde page PHP</title>
	<link rel="stylesheet" href="css/style.css" /> 
</head>
<body>
	<a href="formulaire.html">Mon formulaire</a>
	<?php
	$a2Dim = array(
					array('Buire', 880),
					array('Hirson', 9348),
					array('Reims', 181893),
					array('Paris', 2240621)
			      );
	// Affichage du premier élément du premier tableau
	echo $a2Dim[0][0].'<hr/>';
	// compter le nombre d'éléments du tableau
	$iNbElem = count($a2Dim);
	// boucle sur le premier tableau
	for($i = 0; $i<$iNbElem; $i++)
	{
		//boucle sur les tableaux intérieurs
		foreach($a2Dim[$i] as $iIndice=>$infoVille)
		{
			echo $infoVille.' ';
			// si l'indice est impair...
			if($iIndice % 2 == 1) echo '<br/>';
		}
	}
	// nettoyage...
	unset($a2Dim);

	$a2Dim2 = array(
					array('Ville' => 'Buire', 'Population' => 880),
					array('Ville' => 'Hirson', 'Population' => 9348),
					array('Ville' => 'Reims', 'Population' => 181893),
					array('Ville' => 'Paris', 'Population' => 2240621)
			      );
	//affichage du premier élément du premier tableau
	echo $a2Dim2[0]['Ville'].'<hr/>';

	$iCptElem = count($a2Dim2);
	for($u = 0; $u < $iCptElem; $u++)
	{
		foreach($a2Dim2[$u] as $cle=>$valeur)
		{
			echo '<strong>'.$cle.'</strong>: '.$valeur.'<br/>';
		}
	}

	?>
</body>
</html>