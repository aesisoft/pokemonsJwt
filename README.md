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
php bin/console make:migration 
php bin/console doctrine:migrations:migrate 
php bin/console doctrine:fixtures:load 
```

## Tester avec un client Http

Par exemple avec Postman ...

1. Récupérer le jeton : http://localhost/pokemonsJwt/public/api/login_check

- Methode : POST <br/>
- Url : http://localhost/pokemonsJwt/public/api/login_check <br/>
- Body en raw JSON : 

    ```JSON
    {
    "username":"angular",
    "password":"angular2020"
    }
    ```

2. Accéder à l'API avec le token récupéré :

- Methode : GET <br/>
- Url : http://localhost/pokemonsJwt/public/api/pokemon.json <br/>
- Authorization : 

    ```JSON
    Authorization : Bearer <le token>
    ```
