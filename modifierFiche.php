<?php
/** 
 * Script de modification d'une fiche par l'utilisateur
 * @Fichier : modifierFiche.php
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */ 
 
session_start();

require "class/class.gsb.inc.php"; 

include("include/connexion.inc.php");

if (isset($_POST['modifierFiche'])) {
	if ($_POST['etatFiche'] == 2) {
		$_SESSION['msg'] = "Votre fiche est en litige, attendez une réponse de l'administration";
		header("Location: remboursement.php");
	}
	else {
		// récupération des données transmises
		$id = $_POST['id'];
		$montant = $_POST["montant"];
		$nbNuite = $_POST["nbNuite"];
		$nbRepas = $_POST["nbRepas"];
		$KM = $_POST["KM"];
		// Modification de l'enregistrement
		$ok = gsb::modifierFiche($montant, $nbNuite, $nbRepas, $KM, $id);
		if (!is_numeric($ok))	{
			$_SESSION['msg'] = "Erreur : " . $ok;
		} elseif ($ok == 1) {
			$_SESSION['msg'] = "Fiche modifiée";
		} elseif ($ok == 0) {
			$_SESSION['msg'] = "Aucune modification effectuée";
		} elseif ($ok > 1) {
			$_SESSION['msg'] = "Erreur : " . $ok . " modification(s) réalisée(s), contactez le webmaster";
		}
	}
}

else {
	$_SESSION['msg'] = "Vous devez passer par le formulaire";
}

header("Location: remboursement.php");
?>