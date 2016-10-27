<?php
$titrePage = 'SQL avec PDO suite...';
include 'includes/entete.php';

// connexion
$bdd = new PDO('mysql:host=localhost;dbname=leperray;charset=utf8', 'root', '');

// Créer un nouveau client
$rqclient = "INSERT INTO clients(nom, prenom, email)
			 VALUES('Van Damme', 'Jean-Claude', 'philosophe@aware.com')";
$bdd->exec($rqclient);

// récupérer son numéro
$rqNumClient = "SELECT MAX(numClient)
			    FROM clients";
$stmt = $bdd->query($rqNumClient);
$numClient = $stmt->fetchColumn(0) + 0; 
// $numClient = intval($stmt->fetchColumn(0));

// créer une facture pour cet utilisateur
$rqFacture = "INSERT INTO factures(dateFacture, numClient, modeReglement, etat)
			  VALUES(NOW(), ".$numClient.", 1, '0')";
// $rqFacture = "INSERT INTO factures(dateFacture, numClient, modeReglement, etat)
//			     VALUES(NOW(), $numClient, 1, '0')";
$bdd->exec($rqFacture);			     
			     
// récupérer le numéro de facture
$numFacture = $bdd->lastInsertId();

// ajouter des articles à sa commande
$rqCommande = "INSERT INTO commandes(numFacture, codeArticle, quantite)
			   VALUES(".$numFacture.", 1, 1),
			   (".$numFacture.", 3, 2),
			   (".$numFacture.", 5, 2),
			   (".$numFacture.", 7, 1),
			   (".$numFacture.", 9, 5)";
$iNbArticlesAjoutes = $bdd->exec($rqCommande);
echo $iNbArticlesAjoutes.' articles ajoutés à la commande<br/>';

// afficher sa commande avec le code article, la désignation et le PPHT
$rqAffichage = "SELECT c.codeArticle, c.quantite, marge(a.puht) as ppht, a.designation
				FROM commandes c
				JOIN articles a 
				ON c.codeArticle = a.codeArticle
				WHERE c.numFacture = ".$numFacture;
$stmt2 = $bdd->query($rqAffichage);
$aResultat = $stmt2->fetchAll(PDO::FETCH_ASSOC);
//print_r($aResultat);
echo '<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CodeArticle</th>
				<th>Designation</th>
				<th>quantité</th>
				<th>Prix Public</th>
				<th>prix à payer</th>
			</tr>
		</thead>
		<tbody>';
$prixTotal = 0;
foreach($aResultat as $aLigneCommande)
{
	// calcul du prix de la ligne (quantité * prix public ht)
	$prixLigne = $aLigneCommande['quantite'] * $aLigneCommande['ppht'];
	// calcul du prix total
	$prixTotal += $prixLigne;
	echo '<tr><td>'.$aLigneCommande['codeArticle'].'</td>
			  <td>'.$aLigneCommande['designation'].'</td>
			  <td class="text-right">'.$aLigneCommande['quantite'].'</td>
			  <td class="text-right">'.$aLigneCommande['ppht'].'</td>
			  <td class="text-right">'.$prixLigne.'</td>
		  </tr>';
}
echo '</tbody>
	  <tfoot>
	  	<tr>
	  		<td colspan = "4" class="text-right"><strong>TOTAL</strong></td>
	  		<td class="text-right">'.$prixTotal.' €</td>
	  	</tr>
	  </tfoot>
	</table>';
//echo '<strong>Montant total HT : '.$prixTotal.'€ </strong>';

// chercher les infos du client en fonction du numéro de facture
$rqRecupClient = "SELECT f.numClient, f.numFacture, c.nom, c.prenom, c.email 
				  FROM factures f
				  JOIN clients c
				  ON f.numClient = c.numClient
				  WHERE f.numFacture = ".$numFacture;
$stmt3 = $bdd->query($rqRecupClient);
$aFicheClient = $stmt3->fetch(PDO::FETCH_ASSOC);

echo '<div class="row">
		<div class="col-md-offset-8 col-md-4">
			<div class="alert alert-warning">';
echo '<p>N°:'.$aFicheClient['numClient'].'</p>';
echo '<p>Nom: '.$aFicheClient['nom'].' '.$aFicheClient['prenom'].'</p>';
echo '<p>Mail: '.$aFicheClient['email'].'</p>';
echo '<p>Facture N°: '.$aFicheClient['numFacture'].'</p>';

echo '</div>
	</div>
   </div>';

include 'includes/piedPage.php';
?>