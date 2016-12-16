<?php
/** 
 * Permet la gestion des fiches par l'utilisateur
 * @Projet : GSB
 * @Fichier : utilisateur.php
 * @Auteur  : SADIN Johnathan
 * @Date    : 02/11/2016
 */
// On récupère la liste des comptes
include 'include/header.inc.php';
?>

<div id="headerwrap">
    <!-- FEATURES WRAP -->
    <div id="features">
        <div class="container">
            <div class="row">
                <h1 class="centered">Modification des informations</h1>
                <br>
                <br>
                <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Modification du mot de passe
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <div class="active tab-pane" id="password">
                                        <form method="POST" action="modifiermdp.php">       
                                            <center>            
                                            <span class="help-block" id='messageMotDePasse'>Mot de passe actuel</span>
                                                <div class="input">
                                                    <input class="form-control infobulle" type="password"
                                                    id="ancien" name="old_pass"
                                                    size="30px"
                                                    placeholder = "Saisir votre mot de passe actuel"
                                                    autofocus
                                                    autocomplete="off"
                                                    required
                                                > 
                                                </div>
                                            <span class="help-block" id='messageNewMotDePasse'>Nouveau mot de passe</span>
                                                <div class="input">
                                                    <input class="form-control infobulle" type="password" 
                                                    id="new" name="new_pass" 
                                                    size="30"   
                                                    placeholder="Nouveau mot de passe" 
                                                    autofocus
                                                    autocomplete="off"
                                                    required
                                                    >
                                                </div>
                                            <span class="help-block" id='messageConfMotDePasse'>Confirmer le nouveau mot de passe</span>
                                                <div class="input">
                                                    <input class="form-control infobulle" type="password" 
                                                    id="ancien" name="confirm_new_pass" 
                                                    size="30" 
                                                    placeholder = "Confirmation du nouveau mot de passe"   
                                                    autofocus
                                                    autocomplete="off"
                                                    required
                                                    >
                                                </div><br>
                                            <div class="clearfix">
                                                <div class="input">
                                                    <input name="change" class="btn btn-primary" value="Modifier" type="submit">
                                                </div>
                                            </div>
                                            </center>
                                        </form>
                                    </div>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
      
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Modification de l'adresse mail
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <div class="tab-pane" id="email">
                                        <center>            
                                        <form method="POST" action="modifiermail.php">   
                                            <span class="help-block" id='messageAddrMailAct'>Adresse email actuelle</span>
                                                <div class="input">
                                                    <input class="form-control infobulle" type="email" 
                                                    id="ancien" name="old_mail" 
                                                    size="30" 
                                                    placeholder = "Adresse email actuelle"   
                                                    autofocus
                                                    autocomplete="off"
                                                    required 
                                                    >
                                            </div>
                                            <span class="help-block" id='messageAddrMailNouv'>Nouvelle adresse email</span>
                                                <div class="input">
                                                    <input class="form-control infobulle" type="email" 
                                                    id="ancien" name="new_mail" 
                                                    size="30" 
                                                    placeholder = "Nouvelle adresse email"   
                                                    autofocus
                                                    autocomplete="off"
                                                    required 
                                                    >
                                            </div>
                                            <span class="help-block" id='messageAddrMailConf'>Confirmer votre nouvelle adresse email</span>
                                                <div class="input">
                                                    <input class="form-control infobulle" type="email" 
                                                    id="ancien" name="confirm_new_mail" 
                                                    size="30" 
                                                    placeholder = "Adresse email actuelle"   
                                                    autofocus
                                                    autocomplete="off"
                                                    required 
                                                    >
                                            </div><br>
                                            <div class="clearfix">
                                                <div class="input">
                                                    <input name="changemail" class="btn btn-primary" value="Modifier" type="submit">
                                                </div>
                                            </div> 
                                            </form>
                                        </center>
                                    </div><!-- tab-pane -->
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>   
                    </div><!-- Accordion -->
                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->
</div><!--/ #headerwrap -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script>
    $('.carousel').carousel({
      interval: 3500
    })
    </script>
  </body>
</html>