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

# Event Five - Formulaire d'Inscription Tournoi

Ce projet est un système d'inscription en ligne pour le tournoi de football inter-entreprises Event Five, incluant le paiement Stripe et la génération de factures.

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- Node.js et NPM
- MySQL 5.7 ou supérieur
- Serveur web (Apache/Nginx)
- Compte Stripe
- Compte email SMTP

## Installation

1. **Cloner le projet**
```bash
git clone [URL_DU_REPO]
cd [NOM_DU_DOSSIER]
```

2. **Installer les dépendances**
```bash
composer install
npm install
npm run build
```

3. **Configuration de l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurer le fichier .env**
```env
# Configuration de la base de données
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=votre_base_de_donnees
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe

# Configuration Stripe
STRIPE_KEY=pk_live_votre_cle_publique
STRIPE_SECRET=sk_live_votre_cle_secrete
STRIPE_WEBHOOK_SECRET=whsec_votre_cle_webhook

# Configuration email
MAIL_MAILER=smtp
MAIL_HOST=votre_serveur_smtp
MAIL_PORT=587
MAIL_USERNAME=votre_username
MAIL_PASSWORD=votre_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=adresse_expediteur
MAIL_FROM_NAME="Event Five"

# URL du site
APP_URL=https://votre-domaine.com
```

5. **Créer la base de données et exécuter les migrations**
```bash
php artisan migrate
```

## Configuration Stripe

1. Dans le dashboard Stripe (mode Production) :
   - Créer les produits et prix
   - Noter l'ID du prix pour le fichier .env
   - Configurer le webhook avec l'URL : `https://votre-domaine.com/stripe/webhook`
   - Ajouter la clé webhook dans le .env

2. Vérifier les routes Stripe dans `routes/web.php`

## Configuration Email

1. Vérifier les templates d'email dans `resources/views/emails/`
2. Tester l'envoi d'email avec la commande :
```bash
php artisan test:mail
```

## Sécurité

1. **SSL/HTTPS**
   - Installer un certificat SSL
   - Forcer HTTPS dans le fichier .htaccess ou la configuration Nginx

2. **Permissions**
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

3. **Protection des fichiers**
   - Vérifier que le fichier .env est sécurisé
   - Configurer le pare-feu
   - Activer les protections contre les attaques CSRF

## Déploiement en Production

1. **Optimisation**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

2. **Maintenance**
```bash
# Activer le mode maintenance
php artisan down

# Désactiver le mode maintenance
php artisan up
```

## Vérifications Post-Déploiement

1. **Formulaire d'inscription**
   - Tester le formulaire complet
   - Vérifier l'upload des logos
   - Vérifier la sélection des tailles

2. **Paiement**
   - Faire une transaction test
   - Vérifier la réception du webhook
   - Vérifier la génération de facture

3. **Emails**
   - Vérifier la réception des emails client
   - Vérifier la réception des emails admin
   - Vérifier les pièces jointes

## Support

Pour toute question ou problème :
- Email : [votre_email]
- Documentation Stripe : https://stripe.com/docs
- Documentation Laravel : https://laravel.com/docs

## Mises à jour

Pour mettre à jour l'application :
```bash
php artisan down
git pull
composer install --optimize-autoloader --no-dev
php artisan migrate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan up
