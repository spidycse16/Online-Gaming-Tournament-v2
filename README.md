# Online Gaming Tournament (v2)

A Laravel-based web application for hosting, managing, and joining online gaming tournaments. Users can browse tournaments, join with payments (SSLCOMMERZ), view tournament brackets, and interact with a blog and Clash of Clans base library. Admins can create and manage tournaments, bases, and match progress.

## Table of contents
- Project overview
- Key features
- Tech stack
- Notable modules & files
- Database
- Installation & local setup
- Running the app (development and production)
- Testing
- Environment & configuration
- Deployment tips
- Contributing
- License

## Project overview

This project is a Laravel (v11.x) application written for PHP 8.2+. It provides a platform to host gaming tournaments (with match fees, player management, brackets), a blog for posts/comments/likes, and a library of Clash of Clans (CoC) bases that users can view and download. Payments for joining tournaments are handled using SSLCOMMERZ (a Bangladesh payment gateway) via an included controller and config.

The repository includes typical Laravel structure: models, controllers, routes, migrations, seeders, and front-end assets built with Vite.

## Key features

- User registration, login and authentication (via Laravel's authentication foundations).
- Browse all tournaments and view tournament details and brackets.
- Join tournaments using SSLCOMMERZ payments (payment flow and IPN handling present).
- Admin panel to create, edit, delete and manage tournaments and match progress (versus/elimination flows).
- Clash of Clans base library (viewing, likes, download tracking).
- Blog module with posts, likes and comments.
- File uploads and image handling for tournaments, posts and bases.
- Database factories and seeders for quick local data seeding.

## Tech stack

- Backend: PHP 8.2+, Laravel Framework 11.x
- Frontend toolchain: Vite, axios
- Styling: Font Awesome assets available in `package.json` (used for icons)
- Payment gateway: SSLCOMMERZ integration (controller in `app/Http/Controllers/SslCommerzPaymentController.php` and config in `config/sslcommerz.php`)
- Tests: PHPUnit (configured in `composer.json`)

## Notable modules & files

- Routes: `routes/web.php` — the main web routes for users, admins and payment callbacks.
- Controllers:
  - `app/Http/Controllers/TournamentController.php` — tournament pages, joining flow, payment confirmations.
  - `app/Http/Controllers/CocController.php` — CoC base listing, likes, downloads, and admin base management.
  - `app/Http/Controllers/AdminController.php` — admin dashboard and tournament management (add/update/delete, versus management).
  - `app/Http/Controllers/BlogController.php` — posts, likes, comments and related APIs.
  - `app/Http/Controllers/AuthController.php` — login / registration / logout flows.
  - `app/Http/Controllers/SslCommerzPaymentController.php` — payment checkout, success/fail/cancel handlers, IPN.
- Models:
  - `app/Models/Tournament.php` — tournament model and fillable attributes.
  - `app/Models/User.php` — user model with relationships for likes and comments.
  - `app/Models/Post.php`, `app/Models/Comment.php`, `app/Models/Like.php`, `app/Models/User_in_tournament.php`, `app/Models/Cocbase.php` — related domain models (see `app/Models`).
- Database migrations: `database/migrations/` — includes tables for users, tournaments, cocbases, posts, comments, likes and orders (payment records).
- Factories/Seeders: `database/factories/`, `database/seeders/` — helpful for local dev and testing.
- Frontend assets: `resources/js/`, `resources/css/`, and `public/js`, `public/css` for compiled assets.


## Installation & local setup

Prerequisites:

- PHP 8.2 or newer
- Composer
- Node.js (recommended LTS) and npm
- A database (SQLite, MySQL, PostgreSQL)

Steps:

1. Clone the repository and cd into it:

```bash
git clone git@github.com:spidycse16/Online-Gaming-Tournament-v2.git
cd Online-Gaming-Tournament-v2
```

2. Install PHP dependencies with Composer:

```bash
composer install
```

3. Install frontend dependencies and build assets (development):

```bash
npm install
npm run dev
```

4. Copy the example environment file and generate the app key:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your `.env` values: database credentials, SSLCOMMERZ keys, mail settings, etc. See the Environment & configuration section below.

6. Create the database (if using SQLite create `database/database.sqlite`) and run migrations + seeders:

```bash
# For SQLite (example)
touch database/database.sqlite

php artisan migrate --seed
```

7. (Optional) Link storage for public access to user-uploaded files:

```bash
php artisan storage:link
```

8. Start the local development server:

```bash
php artisan serve
# Visit http://127.0.0.1:8000
```

Notes:
- If you changed environment variables after running migrations or installer scripts, re-run `php artisan config:cache` and `php artisan route:cache` to refresh caches (for production builds).

## Running in production

- Compile optimized assets:

```bash
npm run build
```

- Set correct permissions on `storage/` and `bootstrap/cache`.
- Use a web server like Nginx or Apache pointed at `public/`.
- Configure a process supervisor (supervisor / systemd) for queue workers if you add asynchronous jobs.

## Environment & configuration

- `.env` keys you should set (examples):

```
APP_NAME=OnlineGamingTournament
APP_ENV=local
APP_KEY=base64:...
APP_URL=http://localhost

DB_CONNECTION=sqlite # or mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

# SSLCOMMERZ specific (check config/sslcommerz.php)
SSLCOMMERZ_STORE_ID=your_store_id
SSLCOMMERZ_STORE_PASSWORD=your_store_password
SSLCOMMERZ_SANDBOX=true
```

- Payment flow: The routes in `routes/web.php` include callbacks for SSLCOMMERZ: `/success`, `/fail`, `/cancel`, and `/ipn`. Make sure your environment and server are reachable by the gateway (for local testing, consider using a tunnel like ngrok).


## Troubleshooting & tips

- If you see permission errors, ensure `storage/` and `bootstrap/cache` are writable by your web server user.
- For local payment testing, use ngrok (or similar) to expose your local server and configure the SSLCOMMERZ return/notify URLs.
- If frontend assets are missing, run `npm install` and `npm run dev` or `npm run build`.
- After changing `.env`, run `php artisan config:clear` and `php artisan cache:clear`.
