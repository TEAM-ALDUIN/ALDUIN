/*/http://stackoverflow.com/questions/20764031/php-salt-and-hash-sha256-for-login-password*/
/*http://php.net/manual/en/function.password-hash.php*/ /*use cost=12 for password_hash function with PASSWORD_BCRYPT encryption*/
DROP DATABASE IF EXISTS gallery;
CREATE DATABASE gallery 
DEFAULT CHARACTER SET utf8;

USE gallery;

CREATE TABLE Users (
ID int auto_increment not null,
UserName nvarchar(50) not null,
Pass nvarchar(60) not null,
CONSTRAINT PK_Users PRIMARY KEY CLUSTERED(ID ASC)
);

CREATE TABLE ImgAlbums(
ID int auto_increment not null,
UserId int not null,
CatName nvarchar(100) not null,
IsPublic boolean DEFAULT 0,
CatComment text,
CONSTRAINT PK_ImgAlbums PRIMARY KEY CLUSTERED(ID ASC),
CONSTRAINT FK_Users_ImgAlbums FOREIGN KEY (UserId) REFERENCES Users(ID)
);

CREATE TABLE Images(
ID int auto_increment not null,
ImgName nvarchar(200) not null,
ImgAlbumId int not null,
ImgComment nvarchar(1000),
Votes int DEFAULT 0,
CONSTRAINT PK_Images PRIMARY KEY CLUSTERED(ID ASC),
CONSTRAINT FK_Images_ImgAlbums FOREIGN KEY (ImgAlbumId) REFERENCES ImgAlbums(ID)
);

/*FILL TEST DATA*/

INSERT INTO Users(UserName, Pass) VALUES('ttitto','ttitto');
INSERT INTO Users(UserName, Pass) VALUES('martin','martin');
INSERT INTO Users(UserName, Pass) VALUES('katya','katya');

INSERT INTO ImgAlbums(UserId, CatName,IsPublic, Catcomment) VALUES (3,'my wedding',0,'ksadhflkashdfuhaspidufhpieurfgkajsdhfk;jasdh askefhiasudfhpiuasdhgia dsagusdiugfasd');
INSERT INTO ImgAlbums(UserId, CatName,IsPublic) VALUES (1,'my abitur',1);
INSERT INTO ImgAlbums(UserId, CatName,IsPublic) VALUES (4,'my crazy hollydays',1);

