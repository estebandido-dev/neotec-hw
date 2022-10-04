/*
   Copyright © 2020 Ricardo García Jiménez, Juan José Ramírez López,
                    Esteban López Elizarraraz

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/


DROP DATABASE IF EXISTS company_db;

CREATE DATABASE IF NOT EXISTS company_db
	CHARACTER SET = 'utf8mb4'
	COLLATE = 'utf8mb4_spanish_ci';

USE company_db;


# Contraseña de cifrado/decifrado nunca debe se compartido.
# t(Z2G[x;7$xlJ}y

CREATE TABLE IF NOT EXISTS company_email (
	email_address VARCHAR(256) NOT NULL UNIQUE,
	email_password BLOB NOT NULL,
	email_smtp_address VARCHAR(50) NOT NULL,
	email_port SMALLINT UNSIGNED NOT NULL,
	email_starttls TINYINT(1) NOT NULL
) ENGINE = InnoDB;

# Se utiliza un nivel de cifrado alto, las contraseñas se almacenan como un conjunto de caracteres intelegibles.

INSERT INTO company_email VALUES('durmonsito22@gmail.com',AES_ENCRYPT('PASSWORD_EMAIL', 't(Z2G[x;7$xlJ}y'),'smtp.gmail.com',587,TRUE);

# SELECT email_address,AES_DECRYPT(email_password, 't(Z2G[x;7$xlJ}y') FROM company_email;
# SELECT email_address,AES_DECRYPT(email_password,KEY),email_smtp,email_port,email_starttls FROM company_email WHERE email_address=PARAMETRO;


CREATE TABLE IF NOT EXISTS company_login (
	login_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	login_username VARCHAR(35) NOT NULL UNIQUE,
	login_email VARCHAR(256) NOT NULL UNIQUE,
	login_password VARCHAR(256) NOT NULL,
	PRIMARY KEY(login_id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS company_users (
	user_id INT UNSIGNED NOT NULL,
	user_name VARCHAR(50) NOT NULL,
	user_lastname VARCHAR(50) NOT NULL,
	user_cp SMALLINT UNSIGNED NOT NULL,
	user_address VARCHAR(256) NOT NULL,
	user_home_number MEDIUMINT UNSIGNED NOT NULL,
	user_phone VARCHAR(10) NOT NULL,
	FOREIGN KEY(user_id) REFERENCES company_login(login_id)
) ENGINE = InnoDB;