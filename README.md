# Mission8

## Présentation du projet :

Il s'agit d'un site dont la maquette statique (partie front) a été réalisée par une équipe de designer et déjà validée par le client.
Le projet consiste à faire la v2 basée sur la maquette statique en dynamisant les affichages et créant des CRUD pour permettre au gérant du 
site de pouvoir modifier des informations à partir du site.

## Objectifs du projet :

- Rendre l'affichage des tarifs dynamique
- Créer un CRUD pour la gestion de ces tarifs
- Rendre dynamique l'affichage de l'equipe
- Créer un CRUD pour la gestion de l'equipe
- Créer et utiliser une API REST JSON pour afficher le questionnaire de proust de chaque equipier dans une modal

## Choix de conception :

### Architecture : Model View Controller

Le site ne possède qu'un point d'entrée qui est index.php.
En fonction de ce que reçoit l'index en GET ou en POST, index.php va pouvoir aiguiller vers la page correspondante.
Le modèle MVC permet de séparer chaque tâches, séparer la logique métier, l'interface utilisateur et la dynamique du système.

## Fonctionnement du MVC :

L'index reçoit un paramètre, en fonction de ce paramètre, il va includer un controller, ce controller va chercher des données de la BDD
gràce a un manager, une fois les données prêt, il va includer une view.

## Choix de nomenclature :

### Controller : 

Tout les fichier controller sont préfixé de "c_" et se trouvent dans le dossier "controller".

### Manager :

Tout les fichier manager sont préfixé de "m_" et se trouvent dans le dossier "model".

### View :

Tout les fichier view sont préfixé de "v_" et se trouvent dans le dossier "view".

### Media :

Pour identifier les media concernant des données, chaque image se nomment en fonction du codeEq de l'équipier concerné. Ces fichiers ne sont pas
dans le dossier "Media" mais dans le dossier "model/data/".

## Arborescence :

### Arborescence racine :

![gloomap_5f89afdb](https://user-images.githubusercontent.com/69463293/118407536-37a56a00-b692-11eb-91c7-013958488dbe.png)

## Tableau de passage de parametre :

[Tableau passage parametre Mission 8.xlsx](https://github.com/RomainLefranc/Mission8/files/6489729/Tableau.passage.parametre.Mission.8.xlsx)

## Graphe de dialogue :

![Graphe de dialogue Mission 8](https://user-images.githubusercontent.com/69463293/118407748-1d1fc080-b693-11eb-95f5-380ad0df45dd.png)

## Done :

- CRUD de gestion des tarifs
- Création d'une API REST JSON
- Utilisation de l'API pour aller chercher des données de la BDD sans recharger la page
- Affichage de la modal sur le questionnaire de Proust de chaque équipier
- Visualisation dynamique des tarifs et de l'equipe sur l'accueil
- Sécurisation de tout les cas possible de modification de l'url par l'utilisateur

## To do :

- CRUD de gestion des Equipes
- Amélioration du CRUD de gestion du tarifs en faisant des modal
- Vérification des saisies de formulaire côté Front-end
- Amélioration de L'ux des modal sur le questionnaire de proust
