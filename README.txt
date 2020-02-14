Salut! Bienvenue sur myLibrary, voici les quelques �tapes � franchir pour faire marcher le site: 

I-Installation du serveur
Jusqu'ici, myLibrary ne peut-�tre connect� au serveur que par Uwamp, dont le fichier d'installation se trouve avec le dossier bibliotheques dans notre dossier compress�.
Il faut vous assurer avant d'installer Uwamp de d�sinstaller vos autres serveurs pour que l'apache php soit libre.
Une fois install�, lancer Uwamp et laisser le connect� (n'oublier pas de donner � Uwamp les autorisations qui sont empech�es par Windows Defender.
Pour la suite des op�rations, coller le dossier biblioth�ques o� se trouve le site web dans le dossier www du dossier d'installation de Uwamp.

II-Variables d'environnement
Uwamp ne dispose pas d'une console pour MySql, il faudra donc param�trer les variables d'environnement.
Pour se faire, entrer dans le dossier d'installation de Uwamp (qui devrait se trouver dans le disque local C:)  
Puis, entrer: bin>database>mysql-5.6.20>bin et vous arriverez sur une liste d'applications et copier le chemin.
Ouvrer ensuite le menu sur ordinateur en faisant un clic droit ,et choisisser propri�t�s.
Une fen�tre sur le syst�me va ensuite s'ouvrir, et entrer dans Param�tres avanc�s du syst�me.
Une petite fen�tre s'ouvrira, et cliquer sur le bouton : Variables d'environnement, �a va ouvrir les differents variables d'environnement et dans les variables du syst�me il y a le champ path.
Cliquer successivement dessus pour avoir la liste de plusieurs chemins, cliquer sur Nouveau et collez-y le chemin copi� pr�cedement.
Cliquer sur OK pour quitter toutes les pr�cedentes fen�tres.

III-Bases de donn�es 
Avec le serveur Uwamp toujours lanc�, entrer le raccourcis Windows+R et ouvrer votre invite de commande (CMD)
Entrer la commande: mysql -u root -p
Entrer le mot de passe: root
Et vous aurez votre console mysql (Remarque : accessible que par une invite de commande et avec les m�mes commandes) 
Revener dans le dossier d'insallation de Uwamp, entrer dans www ,puis chercher dans notre dossier bibliotheques le dossier bdd.
Entrer dans bdd, vous y trouverez deux fichiers .sql (creation.sql et data.sql) que vous allez ouvrir dans un bloc note ou un �diteur de texte quelconque.
Copier le contenue du premier fichier et coller la console mysql de l'invite de commande ,creation.sql cr�era toute les tables de la base de donn�e.
Ensuite copier le contenue du deuxi�me fichier .sql dansla console (data.sql cr�era les donn�es des tables.
Si la cr�ation se deroule sans probl�me, vous aurait la base de donn�e de myLibrary.

IV-Entrer dans le site web
Avec le serveur Uwamp toujours lanc� (il devra le rester tant qu'on a l'intention d'utiliser le site), ouvrer votre navigateur, entrer dans la barre de Url :localhost.
Une fois dans la page localhost de Uwamp, aller tout en bas de la page et ouvrer le dossier biblioth�que.
Il ne devrait pas y avoir d'erreur, vous serez dans la page d'inscription et de connection de myLibrary.
Vous n'avez plus qu'� vous connecter et de cr�er votre propre biblioth�que.
