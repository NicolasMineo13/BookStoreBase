<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# L'application BookStore

## Configuration du PHP
Pour pouvoir exécuter une application Laravel, il faut habiliter certaines extensions de PHP. Cela se fait dans le fichier PHP.ini de votre serveur Web. Les extensions à habiliter sont : 

* **extension=fileinfo** : pour pouvoir créer un projet Laravel et générer des fichiers si nécessaire.
* **extension=pdo_mysql** : pour utiliser le driver MySQL permettant de gérer la base de données et exécuter les commandes de la migration.
* **extension=curl** : pour utiliser la commande curl ( bibliothèque de requêtes aux URL pour les clients). En général, elle est déjà activé par défaut.
* **extension=soap** (optionnel) : si le protocol SOAP (Simple Object Application Protocol) est utilisé dans l'application. Par défaut, cela n'est pas le cas.   

## Configuration du projet.

Pour mettre en place le projet. Il faut commencer par créer un fichier .env en se basant sur .env.docker.
Pour des raisons de sécurité, le fichier .env n'est pas inclus dans le dêpot Git. 

En général, le dossier vendor/ n'est inclus dans le dêpot Git. Ainsi, il faut le générer pour chaque ordinateur.  
Création de dossier vendor with all its depéndances.

- composer install

Si composer n'est pas à jour, il faudra probablement exécuter **composer update** qui mettra à jour composer mais
aussi va faire l'installation de dépendances. 

**Attention :** Il est probable que s'il faut changer le nom de la connexion pour l'application. Il soit nécessaire de générer à nouveau le dossier vendor en exécutant à nouveau cette commande.

### Compilation des assets 
Ils sont aussi compilés sur la machine de devéloppement. Leur compilation va générer un dossier node_modules qui n'est pas non plus stocké dans le dépot git. Pour le faire, il faut installer npm qui vient en général avec toute installation node.js.
Ensuite, il faut exécuter les commandes suivantes :  

- **npm install**
- **npm run dev** # Pour compiler les assets en devélopement (et cela laisse le serveur vite en exécution).
- **npm run build** # Pour compiler les assets en production.

### Configuration de la Base de données 

Pour pouvoir l'utiliser, il faut disposer d'un serveur MySQL en local. 
Ensuite,  il faut créer une base de données avec le nom spécifié dans le fichier .env et la variable 
DB_DATABASE. Si elle n'est pas créee, artisan vous permettra de la créer au moment de faire la migration.

Pour exécuter la commande de création des tables dans la base de donnnées, il faut aller dans le dossier du projet et
 exécuter les commandes suivantes :

 * **php artisan migrate** : pour créer la base de données (si elle n'existe pas) et créer les tables.
 * **php artisan db:seed** : pour générer un ensemble d'enregistrements pour toutes les tables de la base de données. 

 Si vous voulez défaire la migration et éliminer les tables (pas la base de données), il faut exécuter la commande : 

 * **php artisan migrate:reset** 

### Interface graphique et système d'authentication

L'interface graphique de cette application a été générée en utlisant composer require laravel/breeze. 
Cette feature permet de générer tout un système d'authentication,  création et gestion des utilisateurs de
manière presque automatique. Pour savoir plus, consultez la documentation laravel. 

## Exécution du projet

Pour exécuter le projet, il faut aller dans le dossier racine de l'application et ensuite utiliser la commande : 

- **php artisan serve --port 8080**

L'option port n'est pas obligatoire mais elle permet de changer le port d'écoute de 
l'application. Par défaut, ce port est le 8000.

Vous pourrez ensuite accéder à la page principale de l'application en allant sur :

**http://localhost:8080**

Vous serez rédirigé vers la page d'accueil de Laravel où vous pourrez vous authentifier ou vous enregistrer
dans l'application afin de pouvoir y accéder. 

## Exécution des tests

Il sera nécessaire de travailler en implémentant des tests sur l'application. Les tests de ce projet sont implémentés avec PHPUnit qui est aussi installé avec la commande

**composer require laravel/PHPUnit**

Vous pouvez exécuter les tests du projet avec la commande :

**php artisan test**

**Attention :** l'exécution des tests de l'application va effacer **tous les enregistrements** de la base de données. Ainsi, n'utilisez pas la même base de données pour les tests et pour l'application. 

Créez un fichier **.env.testing** qui sera utilisé dans le cas de l'exécution des tests. 
**Attention :** la base de données dans le fichier .env.testing doit être créée avant d'exécuter les tests.

Ou un ensemble de tests incluant un mot avec :

**php artisan test --filter Book**

## Utilisation du docker et Docker-compose.
Ce projet vient avec un dockerfile et un docker-compose.yml. Dans une machine avec l'installation du Docker desktop, il est ainsi possible de générer un conteneur avec l'application en utilisant la commande :

**docker build -t bookstore:1.0 --file Base_dockerfile .**

Il est aussi possible d'utiliser docker-compose avec la commande :

**docker-compose up -d**

pour générer un environnement d'exécution pour l'application avec :

* Un serveur BookStore-db-server avec une base de données MySQL.
* Un serveur BookStoreMyAdmin avec un client Web d'accès aux bases de données. 
* Un serveur avec l'application déployée sur un serveur Apache.

Pour décharger l'environnement docker-compose, il faut utiliser la commande :

**docker-compose down**

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

