# Pokemons API Rest sécurisé avec JWT

Ce projet est une petite API Web développé avec Symfony5 et ApiPlatform, afin de proposer un backend pour le projet Angular de support du cours situé ici : https://cours.aesisoft.fr/Angular/

C'est la seconde version de l'API sécurisée avec JWT.

___

## Prerequis

Il est necessaire d'avoir un serveur Apache2 avec PHP de version minimum 7.2.<br/>
Il faut également une base de données MySQL ou MariaDB et un client du type PhpMyAdmin.

## Installation

1. Cloner l'application sur votre serveur Apache localhost
2. Configurer l'accès au serveur de données dans le fichier .env
3. Installer les composants :

```Bash
    composer install
```

4. Créer la base de données :

```Bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load