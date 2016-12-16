<?php 
/** 
 * Formulaire de contact
 * @Projet : GSB
 * @Fichier : contact.php
 * @Auteur  : SADIN Johnathan
 * @Date    : 02/11/2016
 */
include 'include/header.inc.php'; ?>

  <section id="contact" name="contact"></section>
  <div id="page">
    <div class="container">
        <br>
        <form role="form" action="#" method="post" enctype="plain"> 
            <div class="form-group">
                <label for="name1">Votre Nom</label>
                <input type="name" name="Name" class="form-control" id="name1" placeholder="Votre Nom">
            </div>
            <div class="form-group">
                <label for="email1">Objet du message</label>
                <input type="email" name="Mail" class="form-control" id="email1" placeholder="Objet du message">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="Message" rows="3"></textarea>
            </div>
            <br>
                <button type="submit" class="btn btn-large btn-success">ENVOYER</button>
            <br>    
        </form>
    </div>
  </div>
