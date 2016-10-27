<?php
$titrePage = "Includes et compagnie";

// affichage des entêtes HTML, JS, CSS
include "includes/entete.php";

// le super menu
//include "includes/menu.php";

echo 'Hello World!';
$aLangages = array(
			0 =>	array('langage'=>'PHP', 'age' => 20, "utilisateurs" =>"a200000", 'note' => 20),
			1 =>	array('langage'=>'C', 'age' => 20, "utilisateurs" =>"a200000", 'note' => 20),
			2 =>	array('langage'=>'COBOL', 'age' => 20, "utilisateurs" =>"a200000", 'note' => 20),
			3 =>	array('langage'=>'C++', 'age' => 20, "utilisateurs" =>"a200000", 'note' => 20),
			4 =>	array('langage'=>'C#', 'age' => 20, "utilisateurs" =>"a200000", 'note' => 20),
			5 =>	array('langage'=>'JAVA', 'age' => 20, "utilisateurs" =>"a200000", 'note' => 20)
			);
echo $aLangages[0]['langage'];

/* pour les classes bootstrap http://getbootstrap.com */
echo '<table class="table table-striped table-bordered">
		<thead>';
foreach($aLangages as $id=>$aTableauInterne)
{
	//cas de la première ligne => récupération entetes
	if($id == 0)
	{
		$enteteTableau = '<tr>';
		$contenuTableau = '<tr>';
		foreach($aTableauInterne as $entete=>$valeur)
		{
			$enteteTableau .= '<th>'.strtoupper($entete).'</th>';
			//alignement des valeurs numériques à droite de la colonne
			if(is_numeric($valeur)) $contenuTableau .= '<td class="text-right">'.$valeur.'</td>';
			else $contenuTableau .= '<td>'.$valeur.'</td>';
		}
		echo $enteteTableau.'</tr></thead><tbody>';
		echo $contenuTableau.'</tr>';
	}
	// pour les autres lignes seul le contenu importe
	else
	{
		echo '<tr>';
		foreach($aTableauInterne as $valeur)
		{
			//alignement des valeurs numériques à droite de la colonne
			if(is_numeric($valeur)) echo '<td class="text-right">'.$valeur.'</td>';
			else echo '<td>'.$valeur.'</td>';
		}
		echo '</tr>';
	}
}
echo '</tbody>
	</table>';

$sDate1 = "26/10/2016";
$sDate2 = "2016-10-26";
echo dateUS($sDate1).'<br/>';
echo dateFR($sDate2);

/* function qui convertit une date jj/mm/aaaa en aaaa-mm-jj */
function dateUS($dte)
{
	// transformation chaine en tableau
	$tDte = explode('/', $dte);
	return $tDte[2].'-'.$tDte[1].'-'.$tDte[0];
}
/* fonction qui convertit une date aaaa-mm-jj en jj/mm/aaaa */
function dateFR($dte)
{
	// substr($var, debut, longueur) découpe une chaine
	return substr($dte, 8, 2).'/'.substr($dte,5,2).'/'.substr($dte,0,4);
}

$aTab1 = array(1,2,3,4,5,6,7,8,9);
$aTab2 = array('a'=>1, 'b'=>2, 'c'=>3, 'd'=>4, 'e'=>5);

/* pour savoir si une valeur est impaire */
function impaire($val)
{
	return ($val & 1);
}
/* pour savoir si une valeur est paire */
function paire($val)
{
	return !($val & 1);
}
echo '<pre>';
print_r(array_filter($aTab1, 'paire'));
print_r(array_filter($aTab2, 'impaire'));


/* calcul du double */
function double($val)
{
	return $val * 2;
}
function cube($val)
{
	return $val**3; //pow($val, 3); //$val * $val * $val;
}

print_r(array_map('double', $aTab2));
print_r(array_map('cube', $aTab1));
echo '</pre>';

// affichage pied de page et fermeture structure HTML
include 'includes/piedPage.php';
?>