But : tester la filtration des données dans un tableau avec JS.
test des datalist (input firstname et nni)

Le code est cracra, mais le projet est destiné à tourner en local, donc on se fiche des injections sql.

Fonctionnement :
1. aller dans mysql, et créer une base de données nommée "testsearch" (rien de particulier)
2. se rendre dans le fichier dbinc.dist, le copier au même endroit, et le renommer dbinc.php.
 Sur ce nouveau fichier, remplir son nom d'utilisateur, et son mot de passe mysql
3. lancer le serveur php en local, et se rendre à l'aide du navigateur sur la page "createdb.php". Cela va créer la table de test, et la remplir.
4. se rendre sur index.php pour tester le fonctionnement (il y a une redirection après le remplissage de la table. Donc ne plus aller sur createdb.php, sauf pour générer 500 entrées supplémentaires)

crédits : Yacine Mansouri et André Dupin, 2020 (licence MIT)