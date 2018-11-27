-- MySQL Script generated by MySQL Workbench
-- Tue Nov 27 15:05:34 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ownership
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ownership
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS ownership DEFAULT CHARACTER SET utf8 ;
USE ownership ;

-- -----------------------------------------------------
-- Table ownership.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`utilisateur` (
  idutilisateur INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(255) NULL,
  mot_de_passe VARCHAR(255) NULL,
  nom VARCHAR(255) NULL,
  prenom VARCHAR(255) NULL,
  ville VARCHAR(255) NULL,
  PRIMARY KEY (idutilisateur))
ENGINE = MyISAM;




-- -----------------------------------------------------
-- Table ownership.`administrateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`administrateur` (
  idAdministrateur INT NOT NULL AUTO_INCREMENT,
  grade VARCHAR(45) NULL,
  utilisateur_idutilisateur INT NOT NULL,
  PRIMARY KEY (idAdministrateur))
ENGINE = MyISAM;




-- -----------------------------------------------------
-- Table ownership.`groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`groupe` (
  idGroupe INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NULL,
  nombre_participant VARCHAR(255) NULL,
  administrateurs_idAdministrateur INT NOT NULL,
  PRIMARY KEY (idGroupe))
ENGINE = MyISAM;



-- -----------------------------------------------------
-- Table ownership.`vetement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`vetement` (
  idvetements INT NOT NULL AUTO_INCREMENT,
  couleur VARCHAR(45) NULL,
  taille VARCHAR(45) NULL,
  marque VARCHAR(155) NULL,
  type VARCHAR(155) NULL,
  date_achat DATETIME NULL,
  PRIMARY KEY (idvetements))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table ownership.`objet_valeur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`objet_valeur` (
  idobjet_valeur INT NOT NULL AUTO_INCREMENT,
  type VARCHAR(105) NULL,
  date_achat DATETIME NULL,
  PRIMARY KEY (idobjet_valeur))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ownership.`aliment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`aliment` (
  idaliment INT NOT NULL AUTO_INCREMENT,
  date_peremption DATETIME NULL,
  type VARCHAR(205) NULL,
  PRIMARY KEY (idaliment))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ownership.`produit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`produit` (
  idProduit INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(205) NULL,
  description VARCHAR(255) NULL,
  prix DECIMAL(65) NULL,
  vetement_idvetements INT NOT NULL,
  objet_valeur_idobjet_valeur INT NOT NULL,
  aliment_idaliment INT NOT NULL,
  PRIMARY KEY (idProduit))
ENGINE = MyISAM;



-- -----------------------------------------------------
-- Table ownership.`appreciation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`appreciation` (
  idAppreciation INT NOT NULL AUTO_INCREMENT,
  score VARCHAR(255) NULL,
  produits_idProduit INT NOT NULL,
  PRIMARY KEY (idAppreciation))
ENGINE = MyISAM;



-- -----------------------------------------------------
-- Table ownership.`types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`types` (
  idType INT NOT NULL AUTO_INCREMENT,
  Nomtype VARCHAR(45) NULL,
  catégories_idCatégorie INT NOT NULL,
  PRIMARY KEY (idType))
ENGINE = MyISAM;



-- -----------------------------------------------------
-- Table ownership.`Appartenir`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`Appartenir` (
  groupe_id INT NULL,
  utilisateurid INT NULL)
ENGINE = MyISAM;



-- -----------------------------------------------------
-- Table ownership.`stocker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`stocker` (
  utilisateur_idutilisateur INT NOT NULL,
  produits_idProduit INT NOT NULL,
  quantite VARCHAR(45) NULL,
  PRIMARY KEY (utilisateur_idutilisateur, produits_idProduit))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table ownership.`appartenir`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`appartenir` (
  utilisateur_idutilisateur INT NOT NULL,
  groupes_idGroupe INT NOT NULL,
  PRIMARY KEY (utilisateur_idutilisateur, groupes_idGroupe))
ENGINE = MyISAM;



-- -----------------------------------------------------
-- Table ownership.`stocker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`stocker` (
  utilisateur_idutilisateur INT NOT NULL,
  produits_idProduit INT NOT NULL,
  quantite VARCHAR(45) NULL,
  PRIMARY KEY (utilisateur_idutilisateur, produits_idProduit))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table ownership.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`user` (
  iduser INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (iduser))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table ownership.`stocker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS ownership.`stocker` (
  utilisateur_idutilisateur INT NOT NULL,
  produits_idProduit INT NOT NULL,
  quantite VARCHAR(45) NULL,
  PRIMARY KEY (utilisateur_idutilisateur, produits_idProduit))
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
