<?php 
/** 
 * Page de d�connexion
 * Suppression des variables de session
 * @Fichier : deconnexion.php 
 * @Projet PPE GSB
 * @Auteur : Cl�ment Cabuzel
 * @Date : 02/12/2016
 */

session_start();
session_unset();
$_SESSION['msg']=utf8_encode("Vous avez bien �t� deconnect�(e)");

header("Location: index.php");
?>