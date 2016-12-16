<?php 
/** 
 * Permet la gestion des fiches par l'utilisateur ou par le comptable
 * @Fichier : remboursement.php
 * @Projet : PPE GSB
 * @Auteur  : CABUZEL Clément
 * @Date    : 02/12/2016
 */

include 'include/header.inc.php';

// Si l'utilisateur fais parti du groupe des utilisateurs
if ($_SESSION['idGroupe'] == 2) {
    $lesLignes = gsb::getAllFichesAllMembres(); ?>
    <div class="panel panel-info">
        <div class="panel-heading">Gestion des fiches</span>
        </div>
        <div class="panel-body">
            <div class='table-responsive'>
                <table class='table table-condensed table-bordered table-hover' id='leTableau'>
                <?php
                // Mise en forme du tableau
                $lesTailles = array('col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-3', 'col-sm-1', 'col-sm-1');
                $lesAlignements = array('g', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'd');
                $lesEntetes = array('Titre', 'Nombre de relais étape', 'Mois', 'Montant', 'Nombre de nuité', 'Nombre de repas', 'KM', 'Commentaire(s)', 'Etat', 'Editer la fiche');
                $lesClasses = array('', '', '', '', '', '', '', '', '', '');
                echo Fonction::genererEntete2($lesEntetes, $lesAlignements, $lesTailles, 'font: bold; font-size:12px; color:#333399');
                foreach ($lesLignes as $uneLigne) {
                    if ($_SESSION['matricule'] == $uneLigne['matriculeUtilisateur']) {
                        $lesCellules[0] = $uneLigne['titre'];
                        $lesCellules[1] = $uneLigne['nbEtape'];
                        $lesCellules[2] = $uneLigne['mois'];
                        $lesCellules[3] = $uneLigne['montant'];
                        $lesCellules[4] = $uneLigne['nbNuite'];
                        $lesCellules[5] = $uneLigne['nbRepas'];
                        $lesCellules[6] = $uneLigne['KM'];
                        $lesCellules[7] = $uneLigne['commentaire'];
                        switch ($uneLigne['etatFiche']) {
                            case '1':
                                $uneLigne['etatFiche'] = "Remboursée";
                                break;

                            case '2':
                                $uneLigne['etatFiche'] = "En litige";
                                break;

                            case '3':
                                $uneLigne['etatFiche'] = "En attente d'ajout d'éléments";
                                break;
                        
                            default:
                            $uneLigne['etatFiche'] = "En cours d'examination";
                            break;
                        }
                        $lesCellules[8] = $uneLigne['etatFiche'];
                        $lesCellules[9] = "<a  href='modificationFiche.php?id=" . $uneLigne['id'] . "'";
                        $lesCellules[9] .= "<p>Modifier</p></a>";
                        echo Fonction::genererLigne2($lesCellules, $lesAlignements, $lesClasses, 'font-size:12px;');
                    }    
                }
                ?>

                </table>
            </div>
        </div>
    </div>
<?php
} else {
    $lesLignes = gsb::getAllFichesAllMembres(); ?>
    <div class="panel panel-info">
        <div class="panel-heading">Gestion des fiches <span class='badge'><?=  count($lesLignes) ?></span>
        </div>
        <div class="panel-body">
            <div class='table-responsive'>
                <table class='table table-condensed table-bordered table-hover' id='leTableau'>
                <?php
                // Mise en forme du tableau
                $lesTailles = array('col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-1', 'col-sm-3', 'col-sm-1', 'col-sm-1');
                $lesAlignements = array('g', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'd');
                $lesEntetes = array('ID', 'Matricule', 'Mois', 'Montant', 'Nombre de nuité', 'Nombre de repas', 'KM', 'Commentaire(s)', 'Etat', 'Editer la fiche');
                $lesClasses = array('', '', '', '', '', '', '', '', '', '');
                echo Fonction::genererEntete2($lesEntetes, $lesAlignements, $lesTailles, 'font: bold; font-size:12px; color:#333399');
                foreach ($lesLignes as $uneLigne) {
                    $lesCellules[0] = $uneLigne['id'];
                    $lesCellules[1] = $uneLigne['matriculeUtilisateur'];
                    $lesCellules[2] = $uneLigne['mois'];
                    $lesCellules[3] = $uneLigne['montant'];
                    $lesCellules[4] = $uneLigne['nbNuite'];
                    $lesCellules[5] = $uneLigne['nbRepas'];
                    $lesCellules[6] = $uneLigne['KM'];
                    $lesCellules[7] = $uneLigne['commentaire'];
                    switch ($uneLigne['etatFiche']) {
                        case '1':
                          $uneLigne['etatFiche'] = "Remboursée";
                          break;

                        case '2':
                          $uneLigne['etatFiche'] = "En litige";
                          break;

                        case '3':
                          $uneLigne['etatFiche'] = "En attente d'ajout d'éléments";
                          break;
                        
                        default:
                          $uneLigne['etatFiche'] = "En cours d'examination";
                          break;
                    }
                    $lesCellules[8] = $uneLigne['etatFiche'];
                    $lesCellules[9] = "<a  href='modificationFiche.php?id=" . $uneLigne['id']."'";
                    $lesCellules[9] .= "<p>Modifier</p></a>";
                    echo Fonction::genererLigne2($lesCellules, $lesAlignements, $lesClasses, 'font-size:12px;');
                }
    }
                ?>
                </table>
            </div>
            <a href="ajoutFiche.php" class="btn btn-info" role="button">Ajouter une fiche</a>
        </div>
    </div> 