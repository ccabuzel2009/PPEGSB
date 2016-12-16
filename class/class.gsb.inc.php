<?php
/** 
 *
 * Classe d'accès aux données de la base de donées GSB
 *
 * @Fichier : class/class.gsb.inc.php 
 * @Projet : PPE GSB
 * @Auteur : CABUZEL Clément, SADIN Johnathan, BRUANT Benjamin, NGOU Idriss
 * @Date : 02/12/2016
 */

class gsb {

/**
 * Retourne la liste des comptes
 * @return tableau associatif 
*/
	public static function getAll() {
		global $db;
		$sql = "SELECT * FROM utilisateur";
		$curseur = $db->query($sql);
		$lesLignes = $curseur->fetchAll();
		$curseur->closeCursor();
		return $lesLignes;
	}

/**
 * Retourne la liste des fiches se le matricule passé en paramètre
 * @param $matricule matricule du compte
 * @return tableau associatif 
*/
	public static function getAllFiches($matricule) {
		global $db;
		$sql = "SELECT * from fiche WHERE matricule = :1";
		$curseur = $db->prepare($sql);
		$curseur->bindParam(':1', $matricule);
		$curseur->execute();
		$lesLignes = $curseur->fetchAll();
		$curseur->closeCursor();
		return $lesLignes;
	}

/**
 * Retourne la liste de toutes les fiches
 * @return tableau associatif 
*/
	public static function getAllFichesAllMembres() {
		global $db;
		$sql = "SELECT * FROM fiche";
		$curseur = $db->query($sql);
		$lesLignes = $curseur->fetchAll();
		$curseur->closeCursor();
		return $lesLignes;
	}

/**
 * Retourne les données sur un compte 
 * @param $matricule matricule du compte
 * @return tableau associatif
*/
	public static function get($matricule) {
		global $db;
		$sql = "SELECT * from utilisateur WHERE matricule = :1";
		$curseur = $db->prepare($sql);
		$curseur->bindParam(':1', $matricule);
		$curseur->execute();
		$ligne = $curseur->fetch();
		$curseur->closeCursor();
		return $ligne;
	}	

/**
 * Retourne les données sur une fiche 
 * @param $id id de la fiche
 * @return tableau associatif
*/
	public static function getFiche($id) {
		global $db;
		$sql = "SELECT * from fiche WHERE id = :1";
		$curseur = $db->prepare($sql);
		$curseur->bindParam(':1', $id);
		$curseur->execute();
		$ligne = $curseur->fetch();
		$curseur->closeCursor();
		return $ligne;
	}	

/**
 * Retourne les données sur une fiche 
 * @param $id id de la fiche
 * @return tableau associatif
*/
	public static function getPuissance($matricule) {
		global $db;
		$sql = "SELECT tarifKM from puissance JOIN utilisateur on puissance.id = utilisateur.idPuissance WHERE matricule = :1";
		$curseur = $db->prepare($sql);
		$curseur->bindParam(':1', $matricule);
		$curseur->execute();
		$ligne = $curseur->fetch();
		$curseur->closeCursor();
		return $ligne;
	}	

/**
 * Retourne les données sur un hors forfait lié à la fiche 
 * @param $id id de la fiche
 * @return tableau associatif
*/
	public static function getHorsForfaitFiche($id) {
		global $db;
		$sql = "SELECT * from horsforfait WHERE idFiche = :1";
		$curseur = $db->prepare($sql);
		$curseur->bindParam(':1', $id);
		$curseur->execute();
		$ligne = $curseur->fetchAll();
		$curseur->closeCursor();
		return $ligne;
	}	

/**
 * Retourne les données sur un hors forfait 
 * @param $id id du hors forfait 
 * @return tableau associatif
*/
	public static function getHorsForfait($id) {
		global $db;
		$sql = "SELECT * from horsforfait WHERE id = :1";
		$curseur = $db->prepare($sql);
		$curseur->bindParam(':1', $id);
		$curseur->execute();
		$ligne = $curseur->fetch();
		$curseur->closeCursor();
		return $ligne;
	}	
/**
 * Retourne les données sur un compte 
 * @param $matricule matricule du compte
 * @return tableau associatif
*/
	public static function getCompte($matricule) {
    	global $db;
	    $sql = "SELECT utilisateur.matricule, nom, prenom, email, etatCompte, etatMdp, idGroupe, motPasse, dateModifMdp FROM utilisateur, motDePasse WHERE utilisateur.matricule = :1 AND dateModifMdp = (SELECT MAX(dateModifMdp) FROM motDePasse WHERE motDePasse.matricule = :1)";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $matricule);
	    $curseur->execute();
	    $ligne = $curseur->fetch();
	    $curseur->closeCursor();
	    return $ligne;
  	}

/**
 * Ajoute une fiche
 * @param $montant montant de la fiche
 * @param $nbNuite nombre de nuite de la fiche
 * @param $nbRepas nombre de repas de la fiche
 * @param $KM nombre de kilomètres de la fiche
 * @param $matricule matricule de l'utilisateur
 * @param $mois mois de la fiche
 * @return le nombre de colonnes affectées
*/
	public static function ajouterFiche($titre, $montant, $nbRelaisEtape, $nbNuitee, $nbRepas, $KM, $matricule, $mois) {
	    global $db;
	    $sql = "INSERT INTO fiche (titre, montant, nbEtape, nbNuite, nbRepas, KM, matriculeUtilisateur, mois) VALUES(:1, :2, :3, :4, :5, :6, :7, :8)";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $titre);
	    $curseur->bindParam(':2', $montant);
	    $curseur->bindParam(':3', $nbRelaisEtape);
	    $curseur->bindParam(':4', $nbNuitee);
	    $curseur->bindParam(':5', $nbRepas);
	    $curseur->bindParam(':6', $KM);
	    $curseur->bindParam(':7', $matricule);
	    $curseur->bindParam(':8', $mois);
		try {
	      $ok = $curseur->execute();
	      if ($ok) {
	        return $curseur->rowcount();
	      } else {
	        return -1;
	      }
	    } 
	    catch (Exception $e) {
	      return $e->getMessage();
	    }
	    $curseur->closeCursor();
	}

/**
 * Ajoute un hors forfait
 * @param $montant montant du hors forfait
 * @param $libelle nombre de nuite du hors forfait
 * @param $dateDepense date de la dépense du hors forfait
 * @param $idFiche id de la fiche
 * @param $matricule matricule de l'utilisateur
 * @param $mois mois de la fiche
 * @return le nombre de colonnes affectées
*/
	public static function ajouterHorsForfait($montant, $libelle, $dateDepense, $idFiche) {
	    global $db;
	    $sql = "INSERT INTO horsForfait (montant, libelle, dateDepense, idFiche) VALUES(:1, :2, :3, :4)";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $montant);
	    $curseur->bindParam(':2', $libelle);
	    $curseur->bindParam(':3', $dateDepense);
	    $curseur->bindParam(':4', $idFiche);
		try {
	      $ok = $curseur->execute();
	      if ($ok) {
	        return $curseur->rowcount();
	      } else {
	        return -1;
	      }
	    } 
	    catch (Exception $e) {
	      return $e->getMessage();
	    }
	    $curseur->closeCursor();
	}

/**
 * Modifie les données du compte
 * @param $nomCompte nom de compte
 * @param $motPasse mot de passe du compte
 * @param $rang rang du compte
 * @param $sexe sexe de l'utilisateur
 * @param $email email du compte
 * @param $nomPrenom nom et prénom de l'utilisateur
 * @param $id id du comtpe
 * @return le nombre de colonnes affectées
*/
	public static function modifierFiche($montant, $nbNuite, $nbRepas, $KM, $id) {
	  	global $db;
	    $sql = "UPDATE fiche set montant = :1, nbNuite = :2, nbRepas = :3, KM = :4 where id = :5";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $montant);
	    $curseur->bindParam(':2', $nbNuite);
	    $curseur->bindParam(':3', $nbRepas);
	    $curseur->bindParam(':4', $KM);
	    $curseur->bindParam(':5', $id);
	    try {
	      $ok = $curseur->execute();
	      if ($ok) {
	        return $curseur->rowcount();
	      } else {
	        return -1;
	      }
	    } 
	    catch (Exception $e) {
	      return $e->getMessage();
	    }
	    $curseur->closeCursor();
	}

/**
 * Modifie les données du compte
 * @param $nomCompte nom de compte
 * @param $motPasse mot de passe du compte
 * @param $rang rang du compte
 * @param $sexe sexe de l'utilisateur
 * @param $email email du compte
 * @param $nomPrenom nom et prénom de l'utilisateur
 * @param $id id du comtpe
 * @return le nombre de colonnes affectées
*/
	public static function modifierHorsForfait($dateDepense, $montant, $libelle, $id) {
	  	global $db;
	    $sql = "UPDATE horsforfait set dateDepense = :1, montant = :2, libelle = :3 where id = :4";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $dateDepense);
	    $curseur->bindParam(':2', $montant);
	    $curseur->bindParam(':3', $libelle);
	    $curseur->bindParam(':4', $id);
	    try {
	      $ok = $curseur->execute();
	      if ($ok) {
	        return $curseur->rowcount();
	      } else {
	        return -1;
	      }
	    } 
	    catch (Exception $e) {
	      return $e->getMessage();
	    }
	    $curseur->closeCursor();
	}

/**
 * Modifie les données du mot de passe
 * @param $id id mot de passe
 * @param $motPasse mot de passe du compte
 * @param $dateModifMdp date de modification du mot de passe
 * @param $matricule matricule de l'employé
 * @return le nombre de colonnes affectées
*/
	public static function modifierMotPasse($id, $motPasse, $matricule) {
	  	global $db;
	    $sql = "INSERT INTO motDePasse VALUES (:1,:2, now(),:3)";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $id);
	    $curseur->bindParam(':2', $motPasse);
	    $curseur->bindParam(':3', $matricule);
	    try {
	      $ok = $curseur->execute();
	      if ($ok) {
	        return $curseur->rowcount();
	      } else {
	        return -1;
	      }
	    } 
	    catch (Exception $e) {
	      return $e->getMessage();
	    }
	    $curseur->closeCursor();
	}

/**
 * Modifie les données du mot de passe
 * @param $matricule matricule de l'employé 
 * @param $mail adresse mail de l'employé
 * @return le nombre de colonnes affectées
*/
	public static function modifierEmail($matricule, $email) {
	  	global $db;
	    $sql = "UPDATE utilisateur SET email = :1 WHERE matricule = :2";
	    $curseur = $db->prepare($sql);
	    $curseur->bindParam(':1', $email);
	    $curseur->bindParam(':2', $matricule);
	    try {
	      $ok = $curseur->execute();
	      if ($ok) {
	        return $curseur->rowcount();
	      } else {
	        return -1;
	      }
	    } 
	    catch (Exception $e) {
	      return $e->getMessage();
	    }
	    $curseur->closeCursor();
	}
}
?>