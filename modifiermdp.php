<?php
/** 
 * Script de contrôle et de vérification du changement de mot de passe.
 * 
 * @Projet : compte
 * @Fichier : modifiermdp.php
 * @Auteur : Sadin Johnathan
 * @Date : 02/12/2016
 */
session_start();
include('class/class.gsb.inc.php');
include('include/connexion.inc.php');

if(isset($_POST['change'])){
    $lesLignes = gsb::getCompte($_SESSION['matricule']);
    $pass_user_now = $lesLignes['motPasse']; 
	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
    $confirm_new_pass = $_POST['confirm_new_pass'];
	if($old_pass=="" || $new_pass=="" || $confirm_new_pass=="") {
        $_SESSION['msg'] = 'Les champs doivent être remplis';
    } else {
        if($old_pass != $pass_user_now) {
            $_SESSION['msg'] = 'Votre ancien mot de passe est faux';
        } else {  
            if($old_pass == $new_pass) {
                    $_SESSION['msg'] = 'Le nouveau mot de passe est identique a l\'ancien';
            } else {
                if($new_pass != $confirm_new_pass) {
                     $_SESSION['msg'] = 'Les nouveaux mots de passes sont différents'; 
                } else {
                        $update = gsb::modifierMotPasse($id, $new_pass, $_SESSION['matricule']);
                        if($update) {	
                            $_SESSION['msg'] = 'Votre mot de passe à bien été changé !';
                        }   
                    }  
                }   
            }
        header("Location: utilisateur.php");  
    }  
}

