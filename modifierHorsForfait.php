<?php
/** 
 * Script de modification d'un hors forfait par l'utilisateur
 * @Fichier : modifierHorsForfait.php
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */ 
 
session_start();

require "class/class.gsb.inc.php"; 

include("include/connexion.inc.php");

if (isset($_POST['modifierHorsForfait'])) {
	if ($_POST['etatLigne'] == 2) {
		$_SESSION['msg'] = "Votre hors forfait est en litige, attendez une réponse de l'administration";
		header("Location: remboursement.php");
	}
	else {
		// récupération des données transmises
		$dateDepense = $_POST['dateDepense'];
		$montant = $_POST["montant"];
		$libelle = $_POST["libelle"];
		$id = $_POST['id'];
		// Modification de l'enregistrement
		$ok = gsb::modifierHorsForfait($dateDepense, $montant, $libelle, $id);
		if (!is_numeric($ok))	{
			$_SESSION['msg'] = "Erreur : " . $ok;
		} elseif ($ok == 1) {
			$_SESSION['msg'] = "Hors forfait modifié";
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
