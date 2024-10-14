--DROP DATABASE olakehace;
--CREATE DATABASE olakehace;
USE olakehace;
CREATE TABLE category(
    id INTEGER NOT NULL PRIMARY KEY,
    name VARCHAR(25)
);
CREATE TABLE param(
    id INTEGER NOT NULL PRIMARY KEY,
    name VARCHAR(15) UNIQUE,
    value INTEGER NOT NULL
);
CREATE TABLE user(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(16) NOT NULL,
    password VARCHAR(64) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    rol ENUM('ADMIN', 'VIEWER', 'PUBLICATOR') NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    active BOOLEAN NOT NULL DEFAULT TRUE
);
CREATE TABLE viewer(
    id_user INTEGER PRIMARY KEY,
    birthday DATE NOT NULL,
    FOREIGN KEY(id_user) REFERENCES user(id)
);

CREATE TABLE publicator(
    id_user INTEGER PRIMARY KEY,
    status_account ENUM('ACTIVE', 'SUSPENDED', 'BANNED'),
    automatic_publications BOOLEAN NOT NULL DEFAULT FALSE,
    count_aproved INTEGER NOT NULL DEFAULT 0,
    FOREIGN KEY(id_user) REFERENCES user(id)
);

CREATE TABLE notification(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_user INTEGER NOT NULL, 
    message VARCHAR(100) NOT NULL,
    FOREIGN KEY(id_user) REFERENCES user(id)
);

CREATE TABLE publication(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    region VARCHAR(25) NOT NULL,
    place VARCHAR(40) NOT NULL,
    id_publicator INTEGER NOT NULL,
    date DATE NOT NULL,
    hour TIME NOT NULL, 
    cupo INTEGER NOT NULL CHECK (cupo > 0),
    type_public ENUM('CHILDREN', 'TEEN', 'YOUNG_ADULT','ADULT','OLDS'),
    details VARCHAR(150),
    url VARCHAR(60) NOT NULL,
    name VARCHAR(25) NOT NULL,
    aprobed BOOLEAN NOT NULL,
    banned BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY(id_publicator) REFERENCES publicator(id_user)
);

CREATE TABLE report(
    id INTEGER PRIMARY KEY,
    id_publication INTEGER NOT NULL, 
    status ENUM('PENDING', 'APPROVED', 'DENIED'),
    reason ENUM('INAPPROPRIATE', 'FAKE', 'SPAM', 'FRAUD', 'HATE', 'ILLEGAL'),
    details VARCHAR(200),
    FOREIGN KEY(id_publication) REFERENCES publication(id)
);

CREATE TABLE event_reminder(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_user INTEGER NOT NULL,
    id_event INTEGER NOT NULL,
    message VARCHAR(70),
    FOREIGN KEY(id_user) REFERENCES viewer(id_user),
    FOREIGN KEY(id_event) REFERENCES publication(id)
);

CREATE TABLE preference(
    id_category INTEGER NOT NULL,
    id_event INTEGER NOT NULL,
    FOREIGN KEY(id_category) REFERENCES category(id),
    FOREIGN KEY(id_event) REFERENCES publication(id),
    CONSTRAINT pk_preference PRIMARY KEY (id_category, id_event)
);

CREATE TABLE assistence(
    id_user INTEGER NOT NULL,
    id_event INTEGER NOT NULL,
    FOREIGN KEY(id_user) REFERENCES viewer(id_user),
    FOREIGN KEY(id_event) REFERENCES publication(id),
    CONSTRAINT pk_assitence PRIMARY KEY(id_user, id_event)
);

CREATE TABLE category_publication(
    id_publication INTEGER NOT NULL,
    id_category INTEGER NOT NULL,
    FOREIGN KEY(id_publication) REFERENCES publication(id),
    FOREIGN KEY(id_category) REFERENCES category(id),
    CONSTRAINT pk_category_publication PRIMARY KEY(id_publication, id_category)
);
