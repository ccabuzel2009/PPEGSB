<?php
/** 
 * Permet la modification d'un hors forfait par l'utilisateur
 * @Fichier : modificationFiche.php 
 * @Projet : PPE GSB
 * @Auteur : Clément Cabuzel
 * @Date : 02/12/2016
 */

require 'include/header.inc.php';

// appel à partir du fichier index.php : l'id est passé en paramètre  
if (isset($_GET['id'])) {
	$matricule = $_SESSION['matricule'];
	$ligne = gsb::getHorsForfait($_GET['id']);
	if ($_GET['idFiche'] == $ligne['idFiche']) {
		$idHorsForfait = $ligne['id'];
		$dateDepense = $ligne["dateDepense"];
		$libelle = $ligne["libelle"];
		$montant = $ligne["montant"];
		$etatLigne = $ligne["etatLigne"];
	} else {
		$_SESSION["msg"] = "Vous ne pouvez pas modifier ce hors forfait";
		header("Location: remboursement.php");
	}		
} else {
	// appel direct du script sans aucun paramètre : interdit (tentative d'intrusion)
	$_SESSION["msg"] = "Interdiction d'accéder à cette partie du site";
	header("Location: index.php");
	exit;
}
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
		<form name="modification" id="modification" method="post" action="modifierHorsForfait.php">
			<input type="hidden" name="matricule" id="matricule" value='<?= $matricule ?>' >
			<input type="hidden" name="id" id="id" value='<?= $idHorsForfait ?>' >
			<input type="hidden" name="dateDepense" id="dateDepense" value='<?= $dateDepense ?>' >
			<input type="hidden" name="etatLigne" id="etatLigne" value='<?= $etatLigne ?>' >
			<fieldset><legend>Modifier un hors forfait | Libelle : <span class='badge'><?= $libelle ?></span></legend>
				<label class="sr-only" for="montant" accesskey="N">Montant</label>
					<input class="form-control infobulle" type="number" step="0.01"
						id='montant' name='montant'
						placeholder = "montant"
						title = "Saisir le montant"
						autofocus
						autocomplete="off"
						required
						value="<?= $montant ?>">
						<span class="help-block" id='messageMontant'>Montant</span>
				<label class="sr-only" for="dateDepense" accesskey="N">Date</label>
					<input class="form-control infobulle" type="date"
						id='dateDepense' name='dateDepense'
						placeholder = "Date"
						title = "Saisir la date du hors forfait"
						autofocus
						autocomplete="off"
						required
						value="<?= $dateDepense ?>">
						<span class="help-block " id='messageDateDepense'>Date</span>
				<label class="sr-only" for="libelle" accesskey="N">Libellé</label>
					<input class="form-control infobulle" type="text"
						id='libelle' name='libelle'
						placeholder = "Libellé"
						title = "Saisir le libellé"
						autofocus
						autocomplete="off"
						required
						value="<?= $libelle ?>">
						<span class="help-block " id='messageLibelle'>Libellé du hors forfait</span>
				<br />
				<button name="modifierHorsForfait" type="submit" class="btn btn-danger center-block"><i class="fa fa-check-square"></i> Modifier</button>
				<button class="btn btn-info center-block" onclick="javascript:history.go(-1)">Retour</a></button>
        	</fieldset>
		</form>
	</div>
</div>	
</div>
</body >
<?php require 'include/footer.inc.php'; ?>