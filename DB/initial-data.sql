--admin creation
INSERT INTO user (username, password, email, rol, firstname, lastname)
    VALUES ('admin', 'admin', 'admin@gmail.com', 'ADMIN', 'CompanyAdmin', 'Admin');

CALL insert_viewer('iGriega','iGriega','yennifer@gmail.com','Yennifer','de Leon','2004-12-03');
CALL insert_publicator('publicator1','publicator1','publicator1@mail.com','Juan','Perez');