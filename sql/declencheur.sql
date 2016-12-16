-- -------------------------------------------
-- Programme : declencheur.sql
-- Objet : PPE GSB  
-- Serveur : Mysql                                                                  
-- Auteur : Bruant Benjamin	
-- Date : 18/11/2016
-- MAJ : Probleme trigger modificationMdp resolu et complet.
-- -------------------------------------------

use  gsb;

drop trigger if exists modificationMdp;
drop trigger if exists modificationEtatMdp;

delimiter $$

-- Mise à jour de l'etat motDePasse (activation)
create trigger modificationEtatMdp after insert on MotDePasse
for each row
	if (Select etatMdp from Utilisateur where matricule = new.matricule) = 0 then
		update Utilisateur set etatMdp = 1 where matricule = new.matricule;
	end if
$$

-- Interdiction du changement de motDePasse si celui ci est identique à l'un des 2 derniers de l'utilisateurs.
create trigger modificationMdp before insert on MotDePasse
for each row
	begin
		CREATE TEMPORARY TABLE Mdp
		SELECT *
		FROM MotDePasse
		WHERE matricule = new.Matricule
		ORDER BY id desc LIMIT 2;
		if exists(select 1 from MotDePasse where matricule = new.matricule and new.motPasse in (select motPasse from Mdp)) then
			DROP TEMPORARY TABLE Mdp;
			SIGNAL sqlstate '45000' set message_text = 'Opération non autorisée';
		else 
			DROP TEMPORARY TABLE Mdp;
		end if;
	end
$$
-- Calcule du montant de la fiche.


$$