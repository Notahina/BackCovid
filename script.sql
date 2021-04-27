CREATE DATABASE Covid19;
CREATE TABLE Users(
    Id varchar(250) PRIMARY KEY NOT NULL,   
    Nom varchar(50) NOT NULL,
    Prenom varchar(100) NULL,
    Username varchar(100) NOT NULL,
    Mdp varchar(250) NOT NULL,
    Groupe varchar(10) NOT NULL
);
CREATE SEQUENCE seq_user INCREMENT 1 START 1;

INSERT INTO Users VALUES(CONCAT('U',nextval('seq_user')),'Rakoto','Jean','Jean15','123456789','admin');

-- ---------------------REGION
CREATE TABLE Regions(
    Region varchar(250) PRIMARY KEY
);
INSERT INTO Regions VALUES('Madagascar');
INSERT INTO Regions VALUES('Europe');
INSERT INTO Regions VALUES('Americas');
------------------------- NEWS
CREATE TABLE News(
    Idnew varchar(250) PRIMARY KEY,
    Iduser varchar(250),
    Region varchar(250),
    Title varchar(250),
    Label text,
    Image text,
    Dateajout date,
    FOREIGN KEY (Iduser) REFERENCES Users(Id),
    FOREIGN KEY (Region) REFERENCES Regions(Region)
);
CREATE SEQUENCE seq_news INCREMENT 1 START 1;
-- ------------------CAS
CREATE TABLE Cas(
    Idcas varchar(250) PRIMARY KEY,
    Iduser varchar(250) NOT NULL,
    Region varchar(250),
    Deaths int,
    Date date NOT NULL,
    Title varchar(250),
    Newcases int,
    FOREIGN KEY (Iduser) REFERENCES Users(Id),
    FOREIGN KEY (Region) REFERENCES Regions(Region)
);
CREATE SEQUENCE seq_cas INCREMENT 1 START 1;
-- ---------------SAVOIRPLUS
CREATE TABLE OtherNews(
    Idother varchar(250) PRIMARY KEY,
    Iduser varchar(250) NOT NULL,
    Region varchar(250),
    label text,
    lien text,
    etat int,
    FOREIGN KEY (Iduser) REFERENCES Users(Id),
    FOREIGN KEY (Region) REFERENCES Regions(Region)
);
CREATE SEQUENCE seq_other INCREMENT 1 START 1;
