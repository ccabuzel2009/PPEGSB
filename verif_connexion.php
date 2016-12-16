<?php
/** 
 * Verifie les informations envoyées depuis le formulaire de connexion
 * @Fichier : verif_connexion.php 
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */

session_start();
require 'class/class.gsb.inc.php';
require 'include/connexion.inc.php';

// Si il est passé par le formulaire 
if(isset($_POST['validate'])) {
  // On récupère les infos du compte via le matricule
	$ligne = gsb::getCompte($_POST['matricule']);
  $matricule = $ligne["matricule"];
  $motPasse = $ligne["motPasse"];

  // Si le matricule est faux
  if ($matricule == NULL) {
    $_SESSION['msg'] = 'Le nom de compte n\'existe pas dans la base de données'; 
  }
  // Sinon si le mot de passe récupéré sur la BDD ne correspond pas à celui que l'utilisateur a entré
  elseif ($motPasse != $_POST["motPasse"]) {
    $_SESSION['msg'] = 'Désolé, mot de passe incorrect'; 
  }
  elseif ($ligne['etatCompte'] == 1) {
    $_SESSION['msg'] = 'Votre compte a été désactivé ou supprimé, contactez un administrateur pour plus d\'informations';
  }
  else {
    $_SESSION['matricule'] = $ligne['matricule'];
    $_SESSION['idGroupe'] = $ligne['idGroupe'];
    $_SESSION['nom'] = $ligne['nom'];
    $_SESSION['prenom'] = $ligne['prenom'];
    $_SESSION['msg'] = "Vous êtes bien connécté(e)";
    if ($ligne['etatMdp'] == 1) {
      $_SESSION['msg'] = 'Votre mot de passe actuel est temporaire, vous devez le changer';
    }
  }
  header("Location: index.php");
}

else {
  $_SESSION['msg'] = "Désolé, vous devez passer par le formulaire";
  header('location:index.php');  
}
?>