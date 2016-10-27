<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>La suite de la suite de ma première page PHP</title>
	<link rel="stylesheet" href="css/style.css" /> 
</head>
<body>
<?php
/* TOUJOURS NETTOYER LA SAISIE DE L'UTILISATEUR */
$sLogin = htmlentities(strip_tags($_POST['login']));
$sPassSecurise = htmlentities(strip_tags($_POST['motPasse']));
$sSexe = htmlentities(strip_tags($_POST['sexe']));
$sNews = htmlentities(strip_tags($_POST['news']));
$sChaine = htmlentities(strip_tags($_POST['chaine']));
$sComment = htmlentities(strip_tags($_POST['comment']));

// controle login
if(strlen($sLogin) > 5)
{
	if(strlen($sPassSecurise) >= 8)
	{
		// controle complexité mdp
		// // mot de passe = 1MAJ + 2INT + 8 caract mini
		$iCptMaj = $iCptNb = $iCptSpec = 0;
		$mdp = $_POST['motPasse'];
		$aSpec = array('#', '@', '$', '&'); //tableau des caract spéciaux
		$iLongueurMdp = strlen($mdp);
		for($i = 0; $i < $iLongueurMdp; $i++)
		{
			if(is_numeric($mdp[$i])) $iCptNb++;
			// in_array() vérifie qu'une valeur est dans un tableau
			else if(in_array($mdp[$i], $aSpec)) $iCptSpec++;
			else if(strtoupper($mdp[$i]) == $mdp[$i]) $iCptMaj++;	
		}
		if($iCptMaj >= 1 && $iCptNb >= 2 AND $iCptSpec >= 1)
		{
			echo 'partie sécurisée...<br/>';	
		} 
		else echo 'Mot de passe bidon!<br/>';
		
	}
	else echo 'mot de passe trop court <br/>';
}
else echo 'login incorrect <br/>';

?>
</body>
</html>