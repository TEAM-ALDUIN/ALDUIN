/*/http://stackoverflow.com/questions/20764031/php-salt-and-hash-sha256-for-login-password*/
/*http://php.net/manual/en/function.password-hash.php*/ /*use cost=12 for password_hash function with PASSWORD_BCRYPT encryption*/
DROP DATABASE IF EXISTS gallery;
CREATE DATABASE gallery 
DEFAULT CHARACTER SET utf8;

USE gallery;

CREATE TABLE Users (
ID int auto_increment not null,
UserName nvarchar(50) UNIQUE not null,
Pass nvarchar(60) not null,
CONSTRAINT PK_UserId PRIMARY KEY CLUSTERED(ID ASC)
);

CREATE TABLE Categories(
ID int auto_increment not null,
CatName nvarchar(100) not null,
CONSTRAINT PK_CategoryId PRIMARY KEY CLUSTERED(ID ASC)
);

CREATE TABLE ImgAlbums(
ID int auto_increment not null,
UserId int not null,
CategoryId int not null,
AlbumName nvarchar(100) not null,
IsPublic boolean DEFAULT 0,
CatComment text,
CONSTRAINT PK_ImgAlbumId PRIMARY KEY CLUSTERED(ID ASC),
CONSTRAINT FK_Users_ImgAlbums FOREIGN KEY (UserId) REFERENCES Users(ID),
CONSTRAINT FK_Categories_ImgAlbums FOREIGN KEY (CategoryId) REFERENCES Categories(ID)
);


CREATE TABLE Images(
ID int auto_increment not null,
ImgName nvarchar(200) not null,
ImgAlbumId int not null,
ImgComment nvarchar(1000),
CONSTRAINT PK_ImageId PRIMARY KEY CLUSTERED(ID ASC),
CONSTRAINT FK_Images_ImgAlbums FOREIGN KEY (ImgAlbumId) REFERENCES ImgAlbums(ID)
);

CREATE TABLE Votes(
ID int auto_increment not null,
VoteValue tinyint not null,
UserId int not null,
ImgId int not null,
VoteDate timestamp not null,
CONSTRAINT PK_VoteId PRIMARY KEY CLUSTERED(ID Asc),
CONSTRAINT FK_Votes_Users FOREIGN KEY (UserId) REFERENCES Users(ID),
CONSTRAINT FK_Votes_Images FOREIGN KEY (ImgId) REFERENCES Images(ID)
);

/*FILL TEST DATA*/

INSERT INTO Users(UserName, Pass) VALUES('ttitto','ttitto');
INSERT INTO Users(UserName, Pass) VALUES('martin','martin');
INSERT INTO Users(UserName, Pass) VALUES('katya','katya');

INSERT INTO ImgAlbums(UserId, CatName,IsPublic, Catcomment) VALUES (3,'my wedding',0,'ksadhflkashdfuhaspidufhpieurfgkajsdhfk;jasdh askefhiasudfhpiuasdhgia dsagusdiugfasd');
INSERT INTO ImgAlbums(UserId, CatName,IsPublic) VALUES (1,'my abitur',1);
INSERT INTO ImgAlbums(UserId, CatName,IsPublic) VALUES (4,'my crazy hollydays',1);

