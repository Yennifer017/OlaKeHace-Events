/**************************************************************
********************* creation users **************************
***************************************************************/
DELIMITER $$
CREATE OR REPLACE PROCEDURE insert_viewer(
    IN username_param VARCHAR(16),
    IN password_param VARCHAR(64),
    IN email_param VARCHAR(30),
    IN firstname_param VARCHAR(30),
    IN lastname_param VARCHAR(30),
    IN birthday_param DATE
)
BEGIN
    DECLARE id_recovered INTEGER;

    INSERT INTO user (username, password, email, rol, firstname, lastname)
    VALUES (username_param, password_param, email_param, 'VIEWER', firstname_param, lastname_param);

    SET id_recovered = LAST_INSERT_ID();

    INSERT INTO viewer (id_user, birthday) VALUES (id_recovered, birthday_param);
    SELECT id_recovered AS id_user;
END $$
DELIMITER ;



DELIMITER $$
CREATE OR REPLACE PROCEDURE insert_publicator(
    IN username_param VARCHAR(16),
    IN password_param VARCHAR(64),
    IN email_param VARCHAR(30),
    IN firstname_param VARCHAR(30),
    IN lastname_param VARCHAR(30)
)
BEGIN
    DECLARE id_recovered INTEGER;

    INSERT INTO user (username, password, email, rol, firstname, lastname)
    VALUES (username_param, password_param, email_param, 'PUBLICATOR', firstname_param, lastname_param);

    SET id_recovered = LAST_INSERT_ID();

    INSERT INTO publicator (id_user, status_account) VALUES (id_recovered, 'ACTIVE');

    SELECT id_recovered AS id_user;
END $$
DELIMITER ;



--CALL insert_viewer('jdoe', 'securepassword', 'jdoe@example.com', 'John', 'Doe', '1990-01-01');
