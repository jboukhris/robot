DROP DATABASE IF EXISTS `db_robot`;

-- supresion de l'utilisateur admin s'il existe.
DELETE FROM mysql.user WHERE user='admin' and host='admin';

-- Creation de notre base robot .
CREATE DATABASE `db_robot`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_unicode_ci;

-- création d'un utilisateur spécifique qui n'aura que des droits sur la base robot
--  (WITH GRANT OPTION : donne la possibilité de creer des utlisateur uniquement sur notre base robot)
GRANT ALL PRIVILEGES ON `db_robot`.* to 'admin'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION;