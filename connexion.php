<?php
/** 
 * Permet la connexion à un utilisateur
 * @Fichier : connexion.php
 * @Projet : PPE GSB
 * @Auteur  : CABUZEL Clément
 * @Date    : 02/12/2016
 */
// Si l'utilisateur n'est pas connecté
if (!isset($_SESSION['matricule'])) {
	include 'include/header.inc.php';
?>
	<form name="connexion" id="connexion" method="post" action="verif_connexion.php">
	   	<fieldset><h1>Connexion</h1><hr>
	      		<label class="sr-only" for="matricule" accesskey="N">Matricule</label>
				<input class="form-control infobulle" type="text"
					id='matricule' name='matricule'
					placeholder = "Matricule"
					title = "Saisir votre matricule"
					autofocus
					autocomplete="off"
					required>
			<label class="sr-only" for="motPasse" accesskey="N">Mot de passe</label>
				<input class="form-control infobulle" type="password"
					id='motPasse' name='motPasse'
					placeholder = "Mot de passe"
					title = "Saisir votre mot de passe"
					autofocus
					autocomplete="off"
					required>
	       	<input type="hidden" name="validate" id="validate" value="ok"/><br/>
	       	<div class="center"><input type="submit" class ='btn btn-danger' value="Connexion" />
	       	</div>
	   	</fieldset>
	</form>
<?php  
}

else {
	$_SESSION['msg'] = "Vous êtes déjà connecté !";
    header("Location: index.php");
}
?>