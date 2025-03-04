
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
git clone [https://github.com/userwebAA/tournament_five.git]

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
# Elle a était developée en postgresql j'ai traduit ce code postgre dans un fichier mysql a l'integrateur de choisir . 
# Configuration de la base de données
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=votre_base_de_donnees
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe

# Configuration Stripe
STRIPE_KEY=
STRIPE_SECRET=


# Configuration email
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=webs75076@gmail.com
MAIL_PASSWORD=feqkxpatbrhjqons
MAIL_FROM_ADDRESS="contact@events-five.com"
MAIL_FROM_NAME="Events Five"

# URL du site
APP_URL=https://tournois.events-five.com
```

5. **Créer la base de données et exécuter les migrations**
```bash
php artisan migrate
```

## Configuration Stripe

1. Dans le dashboard Stripe (mode Production) :
   - Créer les produits et prix
   - Noter l'ID du prix pour le fichier .env
   

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
