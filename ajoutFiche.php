<?php
/** 
 * Création d'une fiche de frais
 * @Fichier : ajoutFiche.php 
 * @Projet : PPE - GSB
 * @Auteur : Clément Cabuzel
 * @Date : 16/12/2016
 */
require 'include/header.inc.php';
?>

<?php if (isset($_SESSION['matricule'])) { ?>
<section id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
      </div>
    </div>
  </div>    
</section><br />
<div class="row">
    <div class="col-md-6 col-md-offset-3">                               		
		<form name="ajout" id="ajout" method="post" action="ajouterFiche.php">
			<input type="hidden" name="matricule" id="matricule" value='<?= $_SESSION['matricule'] ?>' >
			<input type="hidden" name="mois" id="mois" value='<?= date("n"); ?>' >
			<fieldset><legend>Ajouter une fiche | Mois : <span class='badge'><?= date("n"); ?></span></legend>
				<span class="help-block" id='messageTitreFiche'>Titre de la fiche</span>
				<label class="sr-only" for="titreFiche" accesskey="N">Titre de la fiche</label>
					<input class="form-control infobulle" type="text"
						id='titreFiche' name='titreFiche'
						placeholder = "Titre de la fiche"
						title = "Saisir le titre de la fiche"
						autofocus
						autocomplete="off"
						required>
				<span class="help-block" id='messageNbRelaisEtape'>Nombre de relais étape</span>
				<label class="sr-only" for="nbRelaisEtape" accesskey="N">Nombre de relais étape</label>
					<input class="form-control infobulle" type="number"
						id='nbRelaisEtape' name='nbRelaisEtape'
						placeholder = "Nombre de relais étape"
						title = "Saisir le nombre de relais étape"
						autofocus
						autocomplete="off"
						required>
				<span class="help-block " id='messageNbNuite'>Nombre de nuité</span>
				<label class="sr-only" for="nbNuitee" accesskey="N">Nombre de nuité</label>
					<input class="form-control infobulle" type="number"
						id='nbNuitee' name='nbNuitee'
						placeholder = "Nombre de nuitée"
						title = "Saisir le nombre de nuitée"
						autofocus
						autocomplete="off"
						required">
				<span class="help-block " id='messageNbRepas'>Nombre de repas</span>
				<label class="sr-only" for="nbRepas" accesskey="N">Nombre de repas</label>
					<input class="form-control infobulle" type="number"
						id='nbRepas' name='nbRepas'
						placeholder = "Nombre de repas"
						title = "Saisir le nombre de repas"
						autofocus
						autocomplete="off"
						required">
				<span class="help-block " id='messageKM'>Kilomètres</span>
				<label class="sr-only" for="KM" accesskey="N">Kilomètres</label>
					<input class="form-control infobulle" type="number"
						id='KM' name='KM'
						placeholder = "Kilomètres"
						title = "Saisir le nombre de kilomètres parcourus"
						autofocus
						autocomplete="off"
						required>
				<span class="help-block" id='montantTotal'>Montant total</span>
				<input class="form-control infobulle" type="number"
					id='montantTotal' name='montantTotal'
					placeholder = "Montant total"
					title = "Saisir le nombre de kilomètres parcourus"
					disabled>

				<button name="ajouterFiche" type="submit" class="btn btn-danger center-block"><i class="fa fa-check-square"></i> Ajouter</button>
				<button class="btn btn-info center-block" onclick="javascript:history.go(-1)"> 
				Retour</a></button>
        	</fieldset>
		</form>


	</div>
</div>	
</div>
</body >
<?php
include 'include/calculerMontant.php'; 
}

else {
	// appel direct du script sans aucun paramètre : interdit (tentative d'intrusion)
	$_SESSION["msg"] = "Interdiction d'accéder à cette partie du site";
	header("Location: index.php");
	exit;
}

require 'include/footer.inc.php'; ?>