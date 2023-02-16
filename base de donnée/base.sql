CREATE TABLE product(
   Id INT(11) NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   description TEXT,
   prix DECIMAL(15,2),
   caracteristique TEXT,
   PRIMARY KEY(Id)
);

CREATE TABLE picture(
   Id INT(11) NOT NULL AUTO_INCREMENT,
   chemin VARCHAR(255),
   nom VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE sub_category(
   id INT(11) NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   Id_photo INT NOT NULL,
   Id_product INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(Id_photo) REFERENCES picture(Id),
   FOREIGN KEY(Id_product) REFERENCES product(Id)
);

CREATE TABLE admin(
   id INT(11) NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   email VARCHAR(100),
   mdp VARCHAR(255),
   PRIMARY KEY(id)
);

CREATE TABLE client(
   id INT(11) NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   adresse TEXT,
   code_postal INT,
   ville VARCHAR(50),
   téléphone INT,
   email VARCHAR(100),
   PRIMARY KEY(id)
);

CREATE TABLE orders(
   Id INT(11) NOT NULL AUTO_INCREMENT,
   id_produit INT,
   nom_produit VARCHAR(50),
   prix DECIMAL(15,2),
   quantite INT,
   comment TEXT,
   id_weight INT,
   nom_poid VARCHAR(50),
   id_grind INT,
   nom_mouture VARCHAR(50),
   id_client INT,
   nom_client VARCHAR(50),
   prenom__client VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE kind_grind(
   id INT(11) NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   Id_product INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(Id_product) REFERENCES product(Id)
);

CREATE TABLE basket(
   id INT(11) NOT NULL AUTO_INCREMENT,
   commande INT,
   nom VARCHAR(50),
   prix DECIMAL(15,2),
   quantite INT,
   comment TEXT,
   id_client INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(id_client),
   FOREIGN KEY(id_client) REFERENCES client(id)
);

CREATE TABLE estimate(
   id INT(11) NOT NULL AUTO_INCREMENT,
   info_client VARCHAR(50),
   produit INT,
   nom VARCHAR(50),
   description TEXT,
   caracteristique TEXT,
   id_panier INT,
   PRIMARY KEY(id),
   UNIQUE(id_panier),
   FOREIGN KEY(id_panier) REFERENCES basket(id)
);

CREATE TABLE product_weight(
   id INT(11) NOT NULL AUTO_INCREMENT,
   poid DECIMAL(15,2),
   Id_product INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(Id_product) REFERENCES product(Id)
);

CREATE TABLE category(
   id INT(11) NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   id_sub_category INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_sub_category) REFERENCES sub_category(id)
);

CREATE TABLE ass_photo(
   Id_product INT,
   Id_photo INT,
   PRIMARY KEY(Id_product, Id_photo),
   FOREIGN KEY(Id_product) REFERENCES product(Id),
   FOREIGN KEY(Id_photo) REFERENCES picture(Id)
);
