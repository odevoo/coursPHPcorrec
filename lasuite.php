<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>La suite de ma première page PHP</title>
	<link rel="stylesheet" href="css/style.css" /> 
</head>
<body>
	<a href="encorelasuite.php">Encore la suite...</a>
	<?php
		$debut = microtime(true);
		echo '<h1>La boucle FOR</h1>';
		/* la boucle FOR */
		echo '<ul>';
		for($i = 0; $i <= 10; $i++)
		{
			echo '<li>'.$i .'</li>';
		}
		echo '</ul>';

		echo '<h1>La boucle WHILE</h1>';
		$i = 0;
		$maListe = '<ul class="circle">';
		while($i <= 10)
		{
			// concaténation de la ligne dans la variable $maListe 
			// $maListe .= 'contenu' = $maListe = $maListe . 'contenu';
			$maListe .= '<li>'.$i++.'</li>';
		}
		$maListe .= '</ul>';
		echo $maListe;
		unset($i); //nettoyage $i

		echo '<h1>La boucle DO...WHILE</h1>';
		$u = 0;
		/* la boucle est exécutée au moins une fois avant la vérification */
		do
		{
			echo '<h4>'.$u++.'</h4>';
		}
		while($u <= 10);
		unset($u); //nettoyage $u;

		echo '<h1>La boucle FOREACH(1)</h1>';
		$aMarques = array('Fiat', 'Peugeot', 'Renault', 'Citroen', 'VW', 'Seat', '...');
		/*
		$aMarques = array();
		$aMarques[0] = 'Fiat';
		$aMarques[1] = 'Peugeot';
		$aMarques[2] = 'renault';
		...
		 */

		// affichage du nombre d'éléments dans le tableau
		echo count($aMarques).'<br/>';
		echo '<ul>';
		// boucle de traitement
		foreach($aMarques as $sMarque)
		{
			echo '<li>'.$sMarque.'</li>';
		}
		echo '</ul>';

		echo '<h1>La boucle FOREACH(2)</h1>';
		$aMarques = array('Marque' => 'Fiat',
						  'Modèle' => '500', 
						  'Chevaux'=> 4, 
						  'Places' => 4);
		/*
		$aMarques = array();
		$aMarques['Marque'] = 'Fiat';
		$aMarques['Modèle'] = '500';
		$aMarques['Chevaux'] = 4;
		$aMarques['Places'] = 4;

		$aMarques = ['Marque' => 'Fiat', 'Modèle' => '500', ...];
		 */
		// affichage du nombre d'éléments dans le tableau
		echo count($aMarques).'<br/>';
		echo '<table class="tableau">
				<thead>
					<tr><th>Element</th><th>Valeur</th></tr>
				</thead>
				<tbody>';
		// boucle. On récupère l'élément et sa clé
		foreach($aMarques as $sIndice=>$sMarque)
		{
			echo '<tr><td>'.$sIndice.'</td><td>'.$sMarque.'</td></tr>';
		}
		echo '</tbody>
			</table>';
		// debuggage du tableau
		echo '<pre>';
		print_r($aMarques);
		echo '</pre>';
		unset($aMarques); //nettoyage du tableau

		echo '<h1>Contrôle des boucles</h1>';
		/* boucle de 10 à 0 */
		for($o = 10; $o>=0; $o--)
		{
			if($o % 2 == 1) continue; //on vire les valeurs impaires
			if($o == 0) break; // pas de division par 0
			echo $o.': '.( 10 / $o ).'<br/>';
		}
		//nettoyage de la mémoire
		echo $o;
		unset($o);

		if(isset($o)) echo 'la variable $o existe';
		else echo 'la variable $o n\'existe pas';
		echo '<hr/>';

		$indice = 'false';
		/* empty() renvoie true si NULL, false, FALSE, 0, 0.0, '' ou "" */
		if(empty($indice)) echo 'la variable $indice n\'existe pas ou est vide';
		else echo 'la variable $indice existe et n\'est pas vide';

		/* Affichage de la date et de l'heure */
		echo 'nous sommes le '.date('d/m/Y').'. Il est '.date('H:i:s');
		echo '<hr/>';

		// affichage de la date correspondant à un timestamp 
		echo date('d/m/Y H:i:s', '512345678132');
		echo '<hr/>';

		// affichage du timestamp (now())
		echo time();
		echo date('l m y W', strtotime('Monday 24 October 2016'));
		$fin = microtime(true);
		echo '<hr/>';
		echo ($fin-$debut);
		echo '<hr/>';
		/* date à partir de valeurs numériques (heure, minute, seconde, mois, jour, année) */
		echo date('d/m/Y H:i:s', mktime(25,10,10,13,32,2016));
		/* THE END FOR TODAY */
?>
</body>
</html>