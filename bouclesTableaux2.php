<?php
$titrePage = "Includes et compagnie";

// affichage des entêtes HTML, JS, CSS
include "includes/entete.php";

$aTableau = array(
				array('PHP', 20),
				array('JAVA', 30),
				array('COBOL', 70),
				array('C', 50)
	);
// première chose à faire avec un tableau...
/*echo '<pre>';
print_r($aTableau);
echo '</pre>';*/

/* AVEC UNE BOUCLE FOR */

$iCptLignes = count($aTableau);
$iCptColonnes = count($aTableau[0]);
// boucle sur les lignes
echo '<ul>';
for($i = 0; $i < $iCptLignes; $i++)
{
	echo '<li><ul>';
	// boucle sur les colonnes de chaque ligne
	for($u = 0; $u < $iCptColonnes; $u++)
	{
		echo '<li>'.$aTableau[$i][$u].'</li>';
	}
	echo '</ul></li>';
}
echo '</ul>';

/* AVEC UNE BOUCLE FOREACH */
// boucle sur les lignes
foreach($aTableau as $aLigne)
{
	echo '<div class="alert alert-info">';
	// boucle sur les colonnes
	foreach($aLigne as $colonne)
	{
		echo '<p class="label label-primary">'.$colonne.'</p> ';
	}
	echo '</div>';
}
/* PAUSE KAWA */

// affichage pied de page et fermeture structure HTML
include 'includes/piedPage.php';