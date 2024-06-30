-- Creation --

CREATE TABLE contacts (id int(10) NOT NULL AUTO_INCREMENT, contact varchar(80) NOT NULL UNIQUE, icon varchar(40) NOT NULL, `order` int(10) NOT NULL, PRIMARY KEY (id));
CREATE TABLE formation_users (id int(10) NOT NULL AUTO_INCREMENT, beginning_date date NOT NULL, ending_date date, approved tinyint(1) NOT NULL DEFAULT '0', user_id int(10) NOT NULL, formation_id int(10) NOT NULL, PRIMARY KEY (id));
CREATE TABLE formations (id int(10) NOT NULL AUTO_INCREMENT, name varchar(120) NOT NULL, slug varchar(120) NOT NULL UNIQUE, description varchar(255), beginning_date date NOT NULL, ending_date date, duration int(10), PRIMARY KEY (id));
CREATE TABLE news (id int(10) NOT NULL AUTO_INCREMENT, title varchar(40) NOT NULL, summary varchar(100) NOT NULL, body varchar(1000) NOT NULL, creation_date date NOT NULL, PRIMARY KEY (id));
CREATE TABLE questions (id int(10) NOT NULL AUTO_INCREMENT, question varchar(255) NOT NULL, email varchar(100) NOT NULL, answered tinyint(1) DEFAULT 0 NOT NULL, PRIMARY KEY (id));
CREATE TABLE roles (id int(10) NOT NULL AUTO_INCREMENT, name varchar(30) NOT NULL, slug varchar(100) NOT NULL UNIQUE, permission_level int(10) NOT NULL, PRIMARY KEY (id));
CREATE TABLE testimonies (id int(10) NOT NULL AUTO_INCREMENT, name varchar(100) NOT NULL, email varchar(100) NOT NULL, testimony varchar(200) NOT NULL, evaluation tinyint(1) DEFAULT 1 NOT NULL, PRIMARY KEY (id));
CREATE TABLE users (id int(10) NOT NULL AUTO_INCREMENT, name varchar(100) NOT NULL, email varchar(100) NOT NULL UNIQUE, phone varchar(20), password varchar(255) NOT NULL, role_id int(10) NOT NULL, PRIMARY KEY (id));

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_id`) VALUES
(1, 'Joana Pato', 'joana@avogg.pt', '916267819', '$2y$10$CXJCDTq/I6qOki7EElxGJ.C6RiTp3onfV6qnAfrm/Z0dPqxxidyZu', 1);

INSERT INTO `roles` (`id`, `name`, `slug`, `permission_level`) VALUES
(1, 'Root', 'root', 10),
(2, 'Administrador', 'admin', 20),
(3, 'Formador', 'tutor', 30),
(4, 'Student', 'student', 40);

ALTER TABLE users ADD CONSTRAINT FKusers162913 FOREIGN KEY (role_id) REFERENCES roles (id);
ALTER TABLE formation_users ADD CONSTRAINT FKformation_167117 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE formation_users ADD CONSTRAINT FKformation_549059 FOREIGN KEY (formation_id) REFERENCES formations (id);

-- Deletion --

ALTER TABLE users DROP FOREIGN KEY FKusers162913;
ALTER TABLE formation_users DROP FOREIGN KEY FKformation_167117;
ALTER TABLE formation_users DROP FOREIGN KEY FKformation_549059;
DROP TABLE IF EXISTS contacts;
DROP TABLE IF EXISTS formation_users;
DROP TABLE IF EXISTS formations;
DROP TABLE IF EXISTS news;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS testimonies;
DROP TABLE IF EXISTS users;
