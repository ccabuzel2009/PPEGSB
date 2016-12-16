<?php
/** 
 * Script de contrôle et de vérification du changement de mot de passe.
 * 
 * @Projet : GSB
 * @Fichier : modifiermdp.php
 * @Auteur : Sadin Johnathan
 * @Date : 02/12/2016
 */
session_start();
include('class/class.gsb.inc.php');
include('include/connexion.inc.php');


if(isset($_POST['changemail'])) {
    $lesLignes = gsb::getCompte($_SESSION['matricule']);
    $mail_user_now = $lesLignes['email']; 
    $old_mail = $_POST['old_mail'];
    $new_mail = $_POST['new_mail'];
    $confirm_new_mail = $_POST['confirm_new_mail'];
    if($old_mail=="" || $new_mail=="" || $confirm_new_mail=="") {
          $_SESSION['msg'] = 'Les champs doivent être remplis';
    } else {
        if($old_mail != $mail_user_now) {
            $_SESSION['msg'] =  'Votre ancien E-Mail est faux';
            } else {
                if($old_mail == $new_mail){
                    $_SESSION['msg'] = 'Le nouveau mail est identique a l\'ancien';
                } else {
                    if($new_mail != $confirm_new_mail) {
                        $_SESSION['msg'] = 'Les nouveaux mails sont différents';   
                    } else {
                        $update = gsb::modifierEmail($_SESSION['matricule'], $new_mail);
                        if($update) {    
                            $_SESSION['msg'] = 'Votre mail à bien été changé !';
                        }   
                    }  
                }   
            }  
        }
    header("Location: utilisateur.php");
}

