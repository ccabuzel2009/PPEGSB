<?php
/** 
 * Permet la modification d'une fiche par l'utilisateur
 * @Fichier : modificationFiche.php 
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément
 * @Date : 02/12/2016
 */
require 'include/header.inc.php';

if (isset($_GET['id'])) {
	$matricule = $_SESSION['matricule'];
	$ligne = gsb::getFiche($_GET['id']);
	if (isset($ligne)) {
		$id = $ligne['id'];
		$mois = $ligne['mois'];
		$montant = $ligne['montant'];
		$nbNuite = $ligne['nbNuite'];
		$nbRepas = $ligne['nbRepas'];
		$nbEtape = $ligne['nbEtape'];
		$titre = $ligne['titre'];
		$KM = $ligne['KM'];
		$etatFiche = $ligne['etatFiche'];
	}
}

else {
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
		<form name="modification" id="modification" method="post" action="modifierFiche.php">
			<input type="hidden" name="matricule" id="matricule" value='<?= $matricule ?>' >
			<input type="hidden" name="mois" id="mois" value='<?= $mois ?>' >
			<input type="hidden" name="etatFiche" id="etatFiche" value='<?= $etatFiche ?>' >
			<input type="hidden" name="id" id="id" value='<?= $id ?>' >			
			<fieldset><legend>Modifier une fiche | Mois : <span class='badge'><?= $ligne['mois']; ?></span> | Titre : <span class='badge'><?= $ligne['titre']; ?></span> </legend>
				<label class="sr-only" for="montant" accesskey="N">Montant</label>
					<input class="form-control infobulle" type="number" step="0.01"
						id='montant' name='montant'
						placeholder = "Montant"
						title = "Saisir le montant"
						autofocus
						autocomplete="off"
						required
						value="<?= $montant ?>">
						<span class="help-block" id='messageMontant'>Montant</span>
				<label class="sr-only" for="nbNuite" accesskey="N">Nombre de nuité</label>
					<input class="form-control infobulle" type="number"
						id='nbNuite' name='nbNuite'
						placeholder = "Nombre de nuité"
						title = "Saisir le nombre de nuité"
						autofocus
						autocomplete="off"
						required
						value="<?= $nbNuite ?>">
						<span class="help-block " id='messageNbNuite'>Nombre de nuité</span>
				<label class="sr-only" for="nbRepas" accesskey="N">Nombre de repas</label>
					<input class="form-control infobulle" type="number"
						id='nbRepas' name='nbRepas'
						placeholder = "Nombre de repas"
						title = "Saisir le nombre de repas"
						autofocus
						autocomplete="off"
						required
						value="<?= $nbRepas ?>">
						<span class="help-block " id='messageNbRepas'>Nombre de repas</span>
				<label class="sr-only" for="KM" accesskey="N">Kilomètres</label>
					<input class="form-control infobulle" type="number"
						id='KM' name='KM'
						placeholder = "Kilomètres"
						title = "Saisir le nombre de kilomètres parcourus"
						autofocus
						autocomplete="off"
						required
						value="<?=  $KM ?>">
						<span class="help-block " id='messageKM'>Kilomètres</span>
				<br />
				<button name="modifierFiche" type="submit" class="btn btn-danger center-block"><i class="fa fa-check-square"></i> Modifier</button>
				<button class="btn btn-info center-block" onclick="javascript:history.go(-1)">Retour</a></button>
        	</fieldset>

        	<div class="panel panel-info">
   				<div class="panel-heading">Gestion des hors forfait</div>
	    		<div class="panel-body">
	      			<div class='table-responsive'>
	      				<table class='table table-condensed table-bordered table-hover' id='leTableau'>
					        <?php
					        // Mise en forme du tableau
					        $lesTailles = array('col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1');
					        $lesAlignements = array('g', 'c', 'c', 'c', 'd');
					        $lesEntetes = array('Date', 'Libellé', 'Montant', 'Etat', 'Editer le hors forfait');
					        $lesClasses = array('', '', '', '', '');
					        echo Fonction::genererEntete2($lesEntetes, $lesAlignements, $lesTailles, 'font: bold; font-size:12px; color:#333399');
							$lesLignes = gsb::getHorsForfaitFiche($_GET['id']);
					        foreach ($lesLignes as $uneLigne) {
					          $lesCellules[0] = $uneLigne['dateDepense'];
					          $lesCellules[1] = $uneLigne['libelle'];
					          $lesCellules[2] = $uneLigne['montant']." €";
					          switch ($uneLigne['etatLigne']) {
					            case '1':
					              $uneLigne['etatLigne'] = "Accepté";
					              break;

					            case '2':
					              $uneLigne['etatLigne'] = "Refusé";
					              break;

					            case '3':
					              $uneLigne['etatLigne'] = "En attente d'ajout d'éléments";
					              break;
					            
					            default:
					              $uneLigne['etatLigne'] = "En cours d'examination";
					              break;
					          }
					          $lesCellules[3] = $uneLigne['etatLigne'];
					          $lesCellules[4] = "<a  href='modificationHorsForfait.php?id=" . $uneLigne['id'] . "&idFiche=" . $uneLigne['idFiche'] . "'";
					          $lesCellules[4] .= "<p>Modifier</p></a>";
					          echo Fonction::genererLigne2($lesCellules, $lesAlignements, $lesClasses, 'font-size:12px;');
					        }
					        ?>
	      				</table>
	      			</div>
	      			<a href='ajoutHorsForfait.php?&idFiche=<?= $id ?>' class="btn btn-info" role="button">Ajouter un hors forfait</a>
	      		</div>
      		</div>
		</form>
	</div>
</div>	
</div>
</body >