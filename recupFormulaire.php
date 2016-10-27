<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>La suite de la suite de ma première page PHP</title>
	<link rel="stylesheet" href="css/style.css" /> 
</head>
<body>
<pre>
<?php
/* TOUJOURS NETTOYER LA SAISIE DE L'UTILISATEUR */
$sLogin = htmlentities(strip_tags($_POST['login']));
$sPassSecurise = htmlentities(strip_tags($_POST['motPasse']));

var_dump($_POST);

//transformation d'un tableau en chaine de caractère
echo implode(', ', $_POST);

// détection que le bouton a été cliqué
if(isset($_POST['btnSub'])){
	echo 'le bouton a été cliqué<br/>';
}
else echo 'vous devez passer par le formulaire!<br/>';
// login de + de 5 caractères
if(strlen($_POST['login']) >= 5) echo 'le login est conforme<br/>';
else echo 'Login incorrect<br/>';
// mot de passe de plus de 8 caractères
if(strlen($_POST['motPasse']) >= 8) echo 'le mdp est conforme<br/>';
else echo 'mdp incorrect<br/>';
// afficher le login avec la première lettre en majuscule
echo ucfirst($_POST['login']).'<br/>';
// remplacer h par homme et f par femme dans le résultat des boutons radio 
$from = array('h', 'f', 'a');
$to = array('homme', 'femme', 'autre');
$sSexe = str_replace($from, $to, $_POST['sexe']); 
echo '<img src="images/'.$sSexe.'.png" class="imgSexe" />';

// mot de passe = 1MAJ + 2INT + 8 caract mini
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
//<strong> &lt;strong&gt;
/* !!! TOUJOURS NETTOYER LES INFOS DES FORMULAIRES !!! */
echo htmlentities(strip_tags($_POST['commentaire']));

// à la place de && on peut mêtre and ou AND
if($iCptMaj >= 1 && $iCptNb >= 2) echo 'Mot de Passe OK!<br/>';
else echo 'ouppppssssss<br/>';
echo $iCptMaj.'#'.$iCptNb.'#'.$iCptSpec;


?>
</pre>
<a href="formulaire.html">Retour au formulaire</a>
</body>
</html>