DROP DATABASE myLibrary;
CREATE DATABASE myLibrary;
use myLibrary;

CREATE TABLE Users
(
	UserId INT auto_increment,
	Prenom VARCHAR(25),
	Nom VARCHAR(25),
	Email TEXT,
	Password VARCHAR(40),
	PRIMARY KEY (UserId)
);

CREATE TABLE Book
(
	BookId INT auto_increment,
	BookTitle VARCHAR(100),
	Autor VARCHAR(50),
	Resume TEXT,
	Categorie VARCHAR(20),
	File TEXT,
	Reference VARCHAR(100),
	PRIMARY KEY (BookId)
);

CREATE TABLE Favoris
(
	BookId INT,
	UserId INT,
	FOREIGN KEY (BookId) REFERENCES Book(BookId),
	FOREIGN KEY (UserId) REFERENCES Users(UserId)
);
