<?php
/** 
 * Script de d'ajout d'une fiche par l'utilisateur
 * @Fichier : ajouterFiche.php
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */ 
 
session_start();

require "class/class.gsb.inc.php"; 

include("include/connexion.inc.php");

if (isset($_POST['ajouterFiche'])) {
	// récupération des données transmises
	$titre = $_POST['titreFiche'];
	$nbRelaisEtape = $_POST["nbRelaisEtape"] * 110;
	$nbNuitee = $_POST["nbNuitee"] * 60;
	$nbRepas = $_POST["nbRepas"] * 25;
	$KM = $_POST["KM"];
	$matricule = $_SESSION['matricule'];
	$mois = $_POST['mois'];
	$laPuissance = gsb::getPuissance($_SESSION['matricule']);
	$montant = ($KM * $laPuissance['tarifKM']);
	$montant += $montant + $nbNuitee + $nbRepas + $nbRelaisEtape;
	// Modification de l'enregistrement
	$ok = gsb::ajouterFiche($titre, $montant, $nbRelaisEtape, $nbNuitee, $nbRepas, $KM, $matricule, $mois);

	if (!is_numeric($ok))	{
		$_SESSION['msg'] = "Erreur : " . $ok;
	} elseif ($ok == 1) {
		$_SESSION['msg'] = "Fiche ajoutée";
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