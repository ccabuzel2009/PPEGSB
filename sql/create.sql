-- -------------------------------------------
-- Programme  : create.sql        
-- Objet  : PPE GSB
-- Serveur  : Mysql                                                                 
-- Auteur : 
-- Date   : 04/11/2016     
-- -------------------------------------------

drop database if exists gsb;

create database gsb;

use gsb;

-- Table Groupe --
create table Groupe (
  id tinyint not null,
  nom varchar(30) not null,
  constraint pk_Groupe primary key(id)
);

-- Table Puissance --
create table Puissance (
  id int,
  tarifKM varchar(15),
  puissance tinyint not null,
  constraint pk_Puissance primary key (id)
);

-- Table Utilisateur --
create table Utilisateur (
  matricule varchar(30) not null,
  nom varchar(30) not null,
  prenom varchar(30) not null,
  dateNaissance date not null,
  adresse varchar(50) not null,
  ville varchar (20) not null,
  codePostal char(5) not null,
  email varchar(30) not null,
  etatCompte tinyint default '0',
  etatMdp tinyint default '0',
  -- Clés étrangères 
  idGroupe tinyint not null,
  idPuissance int null,
  
  constraint pk_Utilisateur primary key(matricule),
  constraint fk_Utilisateur_idGroupe foreign key(idGroupe) references groupe(id),
  constraint fk_Utilisateur_idPuissance foreign key(idPuissance) references puissance(id),
  constraint u_Utilisateur_email Unique(email)
);

-- Table MotDePasse --
create table MotDePasse (
  id int(11) AUTO_INCREMENT,
  motPasse varchar(30) default null,
  dateModifMdp datetime default null,
  -- Clé étrangère
  matricule varchar(5) default null,
  
  Constraint pk_MotDePasse primary key (id),
  Constraint fk_MotdePasse_matricule foreign key (matricule) References Utilisateur(matricule)
);

-- Table Fiche --
create table Fiche (
  id int(11) AUTO_INCREMENT,  
  titre varchar(50) not null,
  mois int(11) not null,
  montant decimal(6,2) not null,
  nbEtape int(11) not null,
  nbNuite int(11) not null,
  nbRepas int(11) not null,
  KM int(11) not null,
  etatFiche int(1) not null,
  commentaire text null,
  -- Clé étrangère
  matriculeUtilisateur varchar(30) not null,
  
  constraint pk_Fiche primary key(id),
  constraint fk_Fiche_matricule foreign key (matriculeUtilisateur) references Utilisateur(matricule)
);

-- Table HorsForfait --
create table HorsForfait (
  id int(11) AUTO_INCREMENT,
  dateDepense date not null,
  libelle varchar(50) not null,
  montant decimal(6,2) not null,
  etatLigne int not null,
  commentaire text null,
  -- Clés étrangères
  idFiche int(11) not null,
  
  Constraint pk_HorsForfait primary key (id),
  Constraint fk_HorsForfait_fiche foreign key (idFiche) references Fiche(id)
);