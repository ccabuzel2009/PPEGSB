<?php
/** 
 * Permet l'ajout d'un hors forfait en rapport avec la fiche passée en paramètres
 * @Fichier : ajoutHorsForfait.php 
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */
require 'include/header.inc.php';

if (isset($_SESSION['matricule']) && isset($_GET['idFiche'])) { 
	$idFiche = $_GET['idFiche'];
?>
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
		<form name="modification" id="modification" method="post" action="ajouterHorsForfait.php">
			<input type="hidden" name="idFiche" id="idFiche" value='<?= $_GET['idFiche'] ?>' >
			<fieldset><legend>Ajouter un hors forfait | Fiche : <span class='badge'><?= $idFiche ?></span></legend>
				<label class="sr-only" for="montant" accesskey="N">Montant</label>
					<input class="form-control infobulle" type="number" step="0.01"
						id='montant' name='montant'
						placeholder = "Montant"
						title = "Saisir le montant"
						autofocus
						autocomplete="off"
						required>
						<span class="help-block" id='messageMontant'>Montant</span>
				<label class="sr-only" for="libelle" accesskey="N">Libellé</label>
					<input class="form-control infobulle" type="text"
						id='libelle' name='libelle'
						placeholder = "Libelle"
						title = "Saisir le libellé"
						autofocus
						autocomplete="off"
						required>
						<span class="help-block " id='messageLibelle'>Libellé</span>
				<label class="sr-only" for="dateDepense" accesskey="N">Date de la dépense</label>
					<input class="form-control infobulle" type="date"
						id='dateDepense' name='dateDepense'
						placeholder = "Date de la dépense"
						title = "Saisir la date de la dépense"
						autofocus
						autocomplete="off"
						required>
						<span class="help-block " id='messageDateDepense'>Date de la dépense</span>
				<!-- Emplacement UPLOAD -->
				<br />
				<button name="ajouterHorsForfait" type="submit" class="btn btn-danger center-block"><i class="fa fa-check-square"></i> Ajouter</button>
				<button class="btn btn-info center-block" onclick="javascript:history.go(-1)"> Retour</a></button>
        	</fieldset>
		</form>
	</div>
</div>	
</div>
</body >
<?php 
}

else {
	// appel direct du script sans aucun paramètre : interdit (tentative d'intrusion)
	$_SESSION["msg"] = "Interdiction d'accéder à cette partie du site";
	header("Location: index.php");
	exit;
}
?>