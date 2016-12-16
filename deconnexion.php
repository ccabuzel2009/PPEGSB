<?php 
/** 
 * Page de déconnexion
 * Suppression des variables de session
 * @Fichier : deconnexion.php 
 * @Projet PPE GSB
 * @Auteur : Clément Cabuzel
 * @Date : 02/12/2016
 */

session_start();
session_unset();
$_SESSION['msg']=utf8_encode("Vous avez bien été deconnecté(e)");

header("Location: index.php");
?>