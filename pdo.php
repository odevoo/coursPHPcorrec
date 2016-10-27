<?php
$titrePage = 'SQL avec PDO';
include 'includes/entete.php';

/*
Connexion à la base "leperray" sur la machine locale
utilisateur root sans mot de passe (c'est mal)
 */
$cnx = new PDO('mysql:host=localhost;dbname=leperray;charset=utf8', 'root', '');
// vérification connexion
print_r($cnx);

/* suppression d'un article et vérification */
$iCount = $cnx->exec("DELETE from articles 
					  WHERE codeArticle = 83 
					  OR codeArticle = 10");
echo $iCount.' enregistrements effacés<br/>';

/* Ajout d'un article */
$iCount2 = $cnx->exec("INSERT INTO articles(designation, puht, quantiteStock)
					    VALUES('SuperProduit', 15.5, 10),
					    ('SuperProduit 2', 12.3, 5)");
echo $iCount2.' enregistrements ajoutés<br/>';

/* Modification d'un article */
$iCount3 = $cnx->exec("UPDATE articles
					   SET quantiteStock = quantiteStock - 2 
					   WHERE codeArticle = 84");
echo $iCount3.' articles modifiés<br/>';

/* lecture */
$req = "SELECT nom, prenom, email
		FROM clients";
echo '<ol>';
foreach($cnx->query($req) as $aEnregistrement)
{
	echo '<li>'.$aEnregistrement['nom'].' '
			   .$aEnregistrement['prenom'].': '
			   .$aEnregistrement['email'].'</li>';
	/*
	echo '<li>';
	echo $aEnregistrement['nom'];
	echo ' ';
	echo $aEnregistrement['prenom'];
	echo ' :';
	echo $aenregistrement['email'];
	echo '</li>';
    */
}
echo '</ol>';

$stmt = $cnx->query($req);
// tant qu'il y a des enregistrements renvoyés par la requete
while($aLigne = $stmt->fetch()) //PDO::FETCH_ASSOC, PDO::FETCH_NUM, PDO::FETCH_BOTH, PDO::FETCH_OBJ
{
	echo '<pre>';
	print_r($aLigne);
	echo '</pre>';
	echo '<p>'.$aLigne['nom'].' '.$aLigne[1].'</p>';
}
/* fetchALL = recupération de tous les enregistements en une seule opération*/
$stmt2 = $cnx->query($req);
$aAll = $stmt2->fetchALL(PDO::FETCH_ASSOC); //tableau associatif
echo '<pre>';
print_r($aAll);
echo '</pre>';
// boucle sur l'ensemble des résultats
foreach($aAll as $iNumeroLigne => $aContenuLigne)
{
	// affichage du numéro de ligne et du nom contenu dans l'enregistrement en cours
	echo $iNumeroLigne.' '.$aContenuLigne['nom'].'<br/>';
}

/* fetchColumn pour récupérer une seule info */
$req2 = "SELECT COUNT(codeArticle) 
		 FROM articles"; //aller compter les codes articles de la table articles
$stmt3 = $cnx->query($req2);
// récupération de la première colonne du résultat
$iNbArticles = $stmt3->fetchColumn(0) + 0; // changement de typage du résultat
//affichage détaillé
var_dump($iNbArticles);

/* BON APPETIT !!! */

//nettoyage avant de partir
unset($cnx);
include 'includes/piedPage.php';
?>