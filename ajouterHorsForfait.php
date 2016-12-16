<?php
/** 
 * Script d'ajout d'un hors forfait par l'utilisateur
 * @Fichier : ajouterHorsForfait.php
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */ 
 
session_start();

require "class/class.gsb.inc.php";
include("include/connexion.inc.php");

if (isset($_POST['ajouterHorsForfait'])) {
	// récupération des données transmises
	$montant = $_POST["montant"];
	$libelle = $_POST["libelle"];
	$dateDepense = $_POST["dateDepense"];
	$idFiche = $_POST['idFiche'];
	// Modification de l'enregistrement
	$ok = gsb::ajouterHorsForfait($montant, $libelle, $dateDepense, $idFiche);
	if (!is_numeric($ok))	{
		$_SESSION['msg'] = "Erreur : " . $ok;
	} elseif ($ok == 1) {
		$_SESSION['msg'] = "Hors forfait ajouté";
	} elseif ($ok == 0) {
		$_SESSION['msg'] = "Aucune modification effectuée";
	} elseif ($ok > 1) {
		$_SESSION['msg'] = "Erreur : " . $ok . " modification(s) réalisée(s), contactez le webmaster";
	}
}

else {
	$_SESSION['msg'] = "Vous devez passer par le formulaire";
}

header("Location: remboursement.php");
?>