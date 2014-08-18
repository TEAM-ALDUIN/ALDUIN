/*/http://stackoverflow.com/questions/20764031/php-salt-and-hash-sha256-for-login-password*/
/*http://php.net/manual/en/function.password-hash.php*/ /*use cost=12 for password_hash function with PASSWORD_BCRYPT encryption*/
DROP DATABASE IF EXISTS gallery;
CREATE DATABASE gallery 
DEFAULT CHARACTER SET utf8;

USE gallery;

CREATE TABLE users (
ID int auto_increment not null,
UserName nvarchar(50) not null,
Pass nvarchar(60) not null,
CONSTRAINT PK_Users PRIMARY KEY CLUSTERED(ID ASC)
);




CREATE TABLE img_albums(
ID int auto_increment not null,
UserId int not null,
CatName nvarchar(100) not null,
IsPublic boolean DEFAULT 0,
Comment text,
CONSTRAINT PK_Img_Catalogues PRIMARY KEY CLUSTERED(ID ASC),
CONSTRAINT FK_Users_Img_Catalogues FOREIGN KEY (UserId) REFERENCES users(ID)
);


/*FILL TEST DATA*/

INSERT INTO users(UserName, Pass) VALUES('ttitto','ttitto');
INSERT INTO users(UserName, Pass) VALUES('martin','martin');
INSERT INTO users(UserName, Pass) VALUES('katya','katya');

INSERT INTO img_albums(UserId, CatName,IsPublic, comment) VALUES (3,'my wedding',0,'ksadhflkashdfuhaspidufhpieurfgkajsdhfk;jasdh askefhiasudfhpiuasdhgia dsagusdiugfasd');
INSERT INTO img_albums(UserId, CatName,IsPublic) VALUES (1,'my abitur',1);
INSERT INTO img_albums(UserId, CatName,IsPublic) VALUES (4,'my crazy hollydays',1);