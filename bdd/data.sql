use myLibrary;

INSERT INTO Users VALUES (null,'001','Username','username001@gmail.com',SHA1('user001'));
INSERT INTO Users VALUES (null,'002','Username','username002@gmail.com',SHA1('user002'));
INSERT INTO Users VALUES (null,'003','Username','username003@gmail.com',SHA1('user003'));
INSERT INTO Users VALUES (null,'Essaie','TRY','essaie@try',SHA1('qqqqqqqq'));

INSERT INTO Book VALUES (null,'Book_001','Autor_001','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Romance',null,'4ybs0gykuc3bm7hfs4bpq8ifv2x51x9lc2bqd6g07ijfgrvf84bz3d8l5og6zsb8pwdl1okqs6cmzsedxtdcmocpbhq1qnxqwrv4');
INSERT INTO Book VALUES (null,'Book_002','Autor_001','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Humour',null,'5ybs0gykuc3bm7hfs4hq1qnxbpcpbq851xokqdl1mzsedx9lc2biferrv4tdcmsbz3d8l56cv2xqd6g07ijfgrvf84og6zsb8pwo');
INSERT INTO Book VALUES (null,'Book_003','Autor_002','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Histoire',null,'6ybs084bz3d8l5oggykuc3bm4okqdl11qnxq8ifv2x51x9lsmzsed7hfhq4bpcpbc2bqdrvxtdcms6c6g07ijfgrvf6zsb8pwoqw');
INSERT INTO Book VALUES (null,'Book_004','Autor_002','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Fantastique',null,'7ybs0gykujfgrvf84bz3d8l5oc3bm7hfs4bpcxq8ifv2x51x91qnoqwrv4olc2bqd6g07ig6sedxtdcasb8pwpbhqkqdl1mzms6c');

INSERT INTO Favoris VALUES (1,4);
INSERT INTO Favoris VALUES (3,4);

SELECT * FROM Users;
SELECT BookTitle,Autor,Categorie,File,reference FROM Book;
SELECT * FROM Favoris;
