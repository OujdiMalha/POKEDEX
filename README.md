Rapport sur le Processus de Tests avec Laravel Dusk
Introduction

Ce rapport documente le processus de mise en place et d'exécution des tests avec Laravel Dusk pour une application Laravel. Il couvre toutes les étapes de la configuration initiale, la création de tests, les difficultés rencontrées, et les solutions apportées pour résoudre les problèmes.


1. Mise en place initiale
Nous avons commencé par installer Laravel Dusk, un outil de tests automatisés pour les applications Laravel. L'installation a été réalisée via Composer avec la commande :
```bash
composer require --dev laravel/dusk
```
Après l'installation, nous avons initialisé Dusk avec la commande :
```bash
php artisan dusk:install
```

2. Création des Tests
Une fois Laravel Dusk installé, nous avons créé plusieurs tests pour différentes pages de l'application. Voici les principaux tests que nous avons écrits :
2.1 Test de la Page d'Accueil
Nous avons créé un test pour vérifier que la page d'accueil de l'application s'affiche correctement et que la fonctionnalité de recherche de Pokémon fonctionne comme prévu.
Commandes utilisées pour créer et exécuter le test :
```bash
php artisan dusk:make HomepageTest
php artisan dusk
```

2.2 Test de la Page de Connexion
Un autre test a été créé pour vérifier que la page de connexion fonctionne correctement, permettant aux utilisateurs de se connecter avec leurs informations d'identification.
Commandes utilisées pour créer et exécuter le test :
```bash
php artisan dusk:make LoginTest
php artisan dusk
```

3. Difficultés rencontrées
Lors du processus de configuration et d'exécution des tests, plusieurs difficultés ont été rencontrées :
3.1 Extension PHP manquante : ext-zip
Lors de l'installation de Laravel Dusk, une erreur est survenue indiquant que l'extension PHP ext-zip était manquante. Pour résoudre ce problème, nous avons activé l'extension ext-zip dans le fichier php.ini et relancé l'installation.


3.2 Incompatibilité de Version de ChromeDriver
Un autre problème est survenu lors de l'exécution des tests, où Laravel Dusk ne parvenait pas à se connecter à ChromeDriver. Cela était dû à une incompatibilité entre la version de Chrome installée et la version de ChromeDriver. Nous avons résolu ce problème en téléchargeant manuellement la version appropriée de ChromeDriver.


3.3 Utilisation de Firefox au lieu de Chrome
Nous avons également rencontré des difficultés en tentant d'exécuter les tests avec Firefox au lieu de Chrome. Cela nécessitait l'installation et la configuration de GeckoDriver. Après avoir téléchargé GeckoDriver et configuré Laravel Dusk pour l'utiliser, nous avons pu exécuter les tests avec Firefox.

Conclusion
Malgré les défis rencontrés, j’ai réussi à configurer un environnement de tests automatisés efficace avec Laravel Dusk. Les tests créés vérifient les fonctionnalités critiques de l'application, garantissant que celle-ci fonctionne comme prévu. L'utilisation de tests automatisés comme ceux-ci permet de réduire le risque de régression lors des mises à jour et des ajouts de nouvelles fonctionnalités.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

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
