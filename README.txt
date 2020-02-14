Salut! Bienvenue sur myLibrary, voici les quelques étapes à franchir pour faire marcher le site: 

I-Installation du serveur
Jusqu'ici, myLibrary ne peut-être connecté au serveur que par Uwamp, dont le fichier d'installation se trouve avec le dossier bibliotheques dans notre dossier compressé.
Il faut vous assurer avant d'installer Uwamp de désinstaller vos autres serveurs pour que l'apache php soit libre.
Une fois installé, lancer Uwamp et laisser le connecté (n'oublier pas de donner à Uwamp les autorisations qui sont empechées par Windows Defender.
Pour la suite des opérations, coller le dossier bibliothèques où se trouve le site web dans le dossier www du dossier d'installation de Uwamp.

II-Variables d'environnement
Uwamp ne dispose pas d'une console pour MySql, il faudra donc paramétrer les variables d'environnement.
Pour se faire, entrer dans le dossier d'installation de Uwamp (qui devrait se trouver dans le disque local C:)  
Puis, entrer: bin>database>mysql-5.6.20>bin et vous arriverez sur une liste d'applications et copier le chemin.
Ouvrer ensuite le menu sur ordinateur en faisant un clic droit ,et choisisser propriétés.
Une fenêtre sur le système va ensuite s'ouvrir, et entrer dans Paramètres avancés du système.
Une petite fenêtre s'ouvrira, et cliquer sur le bouton : Variables d'environnement, ça va ouvrir les differents variables d'environnement et dans les variables du système il y a le champ path.
Cliquer successivement dessus pour avoir la liste de plusieurs chemins, cliquer sur Nouveau et collez-y le chemin copié précedement.
Cliquer sur OK pour quitter toutes les précedentes fenêtres.

III-Bases de données 
Avec le serveur Uwamp toujours lancé, entrer le raccourcis Windows+R et ouvrer votre invite de commande (CMD)
Entrer la commande: mysql -u root -p
Entrer le mot de passe: root
Et vous aurez votre console mysql (Remarque : accessible que par une invite de commande et avec les mêmes commandes) 
Revener dans le dossier d'insallation de Uwamp, entrer dans www ,puis chercher dans notre dossier bibliotheques le dossier bdd.
Entrer dans bdd, vous y trouverez deux fichiers .sql (creation.sql et data.sql) que vous allez ouvrir dans un bloc note ou un éditeur de texte quelconque.
Copier le contenue du premier fichier et coller la console mysql de l'invite de commande ,creation.sql créera toute les tables de la base de donnée.
Ensuite copier le contenue du deuxième fichier .sql dansla console (data.sql créera les données des tables.
Si la création se deroule sans problème, vous aurait la base de donnée de myLibrary.

IV-Entrer dans le site web
Avec le serveur Uwamp toujours lancé (il devra le rester tant qu'on a l'intention d'utiliser le site), ouvrer votre navigateur, entrer dans la barre de Url :localhost.
Une fois dans la page localhost de Uwamp, aller tout en bas de la page et ouvrer le dossier bibliothèque.
Il ne devrait pas y avoir d'erreur, vous serez dans la page d'inscription et de connection de myLibrary.
Vous n'avez plus qu'à vous connecter et de créer votre propre bibliothèque.
