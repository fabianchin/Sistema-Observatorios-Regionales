/*PROCEDIMIENTOS ALMACENADOS PARA LA TABLA DE USERS*/

DELIMITER //

CREATE   PROCEDURE  insertUser(nombre varchar(255), email varchar(255),
email_verified_at timestamp, password_user varchar(255), remember_token varchar(100),
created_at timestamp, updated_at timestamp )
BEGIN
INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at,updated_at) 
values(nombre, email,email_verified_at, password, remember_token, created_at,updated_at);
END

DELIMITER //

CREATE   PROCEDURE deleteUser( id int)
BEGIN
DELETE FROM users WHERE users.id = id;
END

//

DELIMITER //

CREATE PROCEDURE updateUsers(id int, nombre varchar(50), email varchar(255),
email_verified_at timestamp, password_user varchar(255), remember_token varchar(100),
created_at timestamp, updated_at timestamp)
BEGIN
UPDATE  users SET users.name = nombre , users.email = email,
users.email_verified_at =  email_verified_at, users.password = password,
users.remember_token = remember_token, users.created_at = created_at,
users.updated_at = updated_at
WHERE users.id = id;
END


DELIMITER //

CREATE PROCEDURE getAllUsers()
BEGIN
	SELECT *  FROM users;
END //

DELIMITER //

CREATE PROCEDURE getUsersById(id int)
BEGIN
	SELECT *  FROM users WHERE users.id = id;
END 
// 