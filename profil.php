<?php 
/** 
 * Permet la gestion des fiches par l'utilisateur
 * @Projet : GSB
 * @Fichier : profil.php
 * @Auteur  : CABUZEL Clément
 * @Date    : 01/11/2016
 */
// On récupère la liste des comptes
include 'include/header.inc.php';
$lesFiches = gsb::getAllFiches($_SESSION['matricule']); ?>
<div class="panel panel-info">
  <div class="panel-heading">Gestion des fiches <span class='badge'><?=  count($lesFiches) ?></span>
  </div>
  <div class="panel-body">
    <div class='table-responsive'>
      <table class='table table-condensed table-bordered table-hover' id='leTableau'>
        <?php
        // Mise en forme du tableau
        $lesTailles = array('col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1');
        $lesAlignements = array('g', 'c', 'c', 'c', 'c', 'd');
        $lesEntetes = array('Mois', 'Montant', 'Nombre de nuité', 'Nombre de repas', 'KM', 'Editer la fiche');
        $lesClasses = array('', '', '', '', '', '');
        echo Fonction::genererEntete2($lesEntetes, $lesAlignements, $lesTailles, 'font: bold; font-size:12px; color:#333399');
        // On récupère les données de tous les comptes
        $lesLignes = gsb::getAllFiches($_SESSION['matricule']);
        foreach ($lesLignes as $uneLigne) {
          $lesCellules[0] = $uneLigne['mois'];
          $lesCellules[1] = $uneLigne['montant'];
          $lesCellules[2] = $uneLigne['nbNuite'];
          $lesCellules[3] = $uneLigne['nbRepas'];
          $lesCellules[4] = $uneLigne['KM'];
          $lesCellules[5] = "<a  href='modificationFiche.php?mois=" . $uneLigne['mois']."'";
          $lesCellules[5] .= "<p>Modifier</p></a>";
          echo Fonction::genererLigne2($lesCellules, $lesAlignements, $lesClasses, 'font-size:12px;');
        }
        ?>
      </table>
    </div>
  </div>
</div>