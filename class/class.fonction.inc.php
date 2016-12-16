<?php
/** 
 * Classe Fonction
 * Fichier          : class/class.fonction.inc.php
 * Version          : 1.0.0
 * Date mise à jour : 29/06/2016
 * Auteur           : CABUZEL Clément
 */

class Fonction { 

/** 
 * Génére le code HTML de la ligne d'entête 
 * en utilisant les classes bootstrap pour fixer la largeur des cellules
 * @param $lesCellules tableau contenant la valeur de chaque colonne
 * @param lesAlignement tableau contenant l'alignement de chaque colonne
 * @param lesTailles : tableau contenant les classes css bootstrap à appliquer à chaque cellule 
 * @param style : autres attributs de style communs à chaque cellule 
 * 
 * @return code html de la ligne du tableau : <th ...></th>
 */
  static public function genererEntete2($lesCellules, $lesAlignements, $lesTailles, $style = '') { 
    $result = "<thead><tr>";
    $nb = count($lesCellules);
    for ($i = 0; $i < $nb; $i++) {
      switch ($lesAlignements[$i]) {
        case 'c' : 
            $styleCellule = "text-align:center;" . $style;
            break;
        case 'j' : 
            $styleCellule = "text-align:justify;" . $style; 
            break;
        case 'd' : 
            $styleCellule = "text-align:right;" . $style; 
            break;
        default : 
            $styleCellule = "text-align:left;" . $style;
            break;
      }
      $result .= "<th class='" . $lesTailles[$i] . "' style='" . $styleCellule . "'>" . $lesCellules[$i]  . "</th>";
    }
    $result .= "</tr></thead>";
    return $result;
  }

/** 
 * Afficher une ligne du tableau version bootstrap
 * @param $lesCellules tableau contenant la valeur de chaque colonne
 * @param lesAlignements tableau contenant l'alignement de chaque colonne
 * @param lesClasses tableau contenant les classes bootstrap de mise en forme de chaque colonne :
 *        active : active Fond gris, success : warning, danger
 * @param style : autres attributs de style communs à chaque cellule 
 * @return Code html de la ligne
 * 
 */
// Attention sur l'usage d'un tableau associatif qui double le nombre d'éléments (clé + valeur) 
  static public function genererLigne2($lesCellules, $lesAlignements, $lesClasses, $style = '') { 
    $result = "<tr>";
    $nb = count($lesAlignements);
    for ($i = 0; $i < $nb; $i++) {
      switch ($lesAlignements[$i]) {
        case 'c' : $styleCellule = "text-align:center;"; break;
        case 'j' : $styleCellule = "text-align:justify;";  break;
        case 'd' : $styleCellule = "text-align:right;"; break;
        default : $styleCellule = "text-align:left;";
      }
      $result .= "<td class='" . $lesClasses[$i] . "' style='" . $styleCellule . " " . $style . "'>" . $lesCellules[$i]  . "</td>";
    }
    $result .= "</tr>";
    return $result;
  }

  /** 
 * Converstion du date au format MySQL (aaaa-mm-jj) en date en format français (jj/mm/aaaa)
 * @param string $date date au format MySQL 
 * @return string date au format français
 */
  
  static public function conversionDateMysqlDateFr($date) { 
    $mydate = substr($date, 0, 10);
    $tab = explode("-", $mydate);
    $res = ((strlen($tab[2]) < 2) ? "0" : "") . $tab[2] . "/" . ((strlen($tab[1]) < 2) ? "0" : "") . $tab[1] . "/" . $tab[0];
    return ($res);
  }
}
?>