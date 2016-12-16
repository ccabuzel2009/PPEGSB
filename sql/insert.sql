-- -------------------------------------------
-- Programme  : insert.sql        
-- Objet  : PPE GSB
-- Serveur  : Mysql                                                                 
-- Auteur : Benjamin
-- Date   : 04/11/2016     
-- -------------------------------------------
use gsb;

-- Table Groupe --
insert into Groupe (`id`, `nom`) values
(1, 'Test'),
(2, 'Test2');

-- Table Puissance --
insert into Puissance (`id`, `tarifKM`, `puissance`) values
(1, '0.493', 4),
(2, '0.543', 5),
(3, '0.568', 6),
(4, '0.595', 7);

-- Table Utilisateur --
insert into Utilisateur (`matricule`, `nom`, `prenom`, `dateNaissance`, `adresse`, `ville`, `codePostal`, `email`, `etatCompte`, `etatMdp`, `idGroupe`, `idPuissance`) values
('A11', 'Alain', 'Verse', '1997-09-20', '1 rue des tileuls', 'Amiens', '80000', 'alain.verse@gmail.com', 0, 0, 2, 1),
('A12', 'Oussama', 'Lerbon', '2016-10-17', '9 rue de cangy', 'Bordeaux', '80000', 'oussama@lerbon.fr', 0, 0, 2, 2);

-- Table MotDePasse --
insert into MotDePasse (`id`, `motPasse`, `dateModifMdp`, `matricule`) values
(0, 'test', '2016-10-31 23:59:59', 'A12'),
(1, 'test', '2016-10-07 14:27:52', 'A11'),
(2, 'test2', '2016-10-07 14:27:52', 'A11'),
(3, 'test3', '2016-10-08 19:20:36', 'A11');

-- Table Fiche --
insert into Fiche (`titre`, `mois`, `montant`, `nbNuite`, `nbRepas`, `KM`, `etatFiche`, `commentaire`, `matriculeUtilisateur`, `id`) values
('Test de la fiche 1', 11, '150.05', 4, 1, 32, '0', 'Blablablabla', 'A11', '1'),
('Test de la fiche 2', 12, '195.65', 3, 3, 48, '1', 'Sectum Sempra Vulnera Samento Vipera Evanesca Avada Kedavra', 'A11', '2');

-- Table HorsForfait --
insert into HorsForfait (`id`, `dateDepense`, `libelle`, `montant`, `etatLigne`, `commentaire`, `idFiche`) VALUES
(0, '2016-11-01', 'Remboursement grosse fiesta chez robert', '800.32', '0', 'After all this time ? Always', '1'),
(5, '2016-07-10', 'Remboursement 1', '9999.99', '1', 'Caput Draconis Antochère Fortuna Major', '1');