CREATE TABLE picture(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   path VARCHAR(255),
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE category(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE sub_category(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   id_photo INT NOT NULL,
   id_category INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_photo) REFERENCES picture(id),
   FOREIGN KEY(id_category) REFERENCES category(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE admin(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   first_name VARCHAR(50),
   email VARCHAR(100),
   password VARCHAR(255),
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE customers(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   first_name VARCHAR(50),
   address TEXT,
   zip_code INT,
   city VARCHAR(50),
   phone INT,
   email VARCHAR(100),
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE orders(
   Id INT AUTO_INCREMENT,
   id_product INT,
   name_product VARCHAR(50),
   price DECIMAL(15,2),
   quantity INT,
   commentary TEXT,
   id_weight INT,
   name_weight VARCHAR(50),
   id_grind INT,
   name_grind VARCHAR(50),
   id_customers INT,
   name_customers VARCHAR(50),
   first_name_customers VARCHAR(50),
   PRIMARY KEY(Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE kind_grind(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE basket(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   commande INT,
   prix DECIMAL(15,2),
   quantite INT,
   comment TEXT,
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE estimate(
   id INT AUTO_INCREMENT,
   info_client VARCHAR(50),
   produit INT,
   nom VARCHAR(50),
   description TEXT,
   caracteristique TEXT,
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE product_weight(
   id INT AUTO_INCREMENT,
   weight INT,
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE product(
   id INT AUTO_INCREMENT,
   name VARCHAR(50),
   description TEXT,
   price DECIMAL(15,2),
   characteristic TEXT,
   id_weight INT NOT NULL,
   id_grind INT NOT NULL,
   id_ss_category INT NOT NULL,
   id_photo INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_weight) REFERENCES product_weight(id),
   FOREIGN KEY(id_grind) REFERENCES kind_grind(id),
   FOREIGN KEY(id_ss_category) REFERENCES sub_category(id),
   FOREIGN KEY(id_photo) REFERENCES picture(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
