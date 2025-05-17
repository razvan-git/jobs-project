## Jobs Project — Laravel Practice App

This is a simple job board application built with Laravel as part of the30 Days to Learn Laravel course on Laracasts.

It was created to practice core Laravel concepts such as routing, controllers, Blade templates, models, migrations, and authentication.

## Current Features

-   User registration, login, and logout
-   Job creation (authenticated users)
-   Edit and delete own jobs (with authorization)
-   Jobs listing with pagination
-   Search jobs by keyword or tag
-   Tagging system
-   Company listings
-   Featured jobs section
-   TailwindCSS styling
-   Authorization using Laravel Policies

## Tech Stack

Laravel 10+

PHP 8+

MySQL or SQLite

Tailwind CSS

Blade templates

## Getting Started

1. Clone the repository

git clone https://github.com/razvan-git/jobs-project.git
cd jobs-project

2. Install dependencies

composer install
npm install && npm run dev

3. Environment setup

cp .env.example .env
php artisan key:generate

Then update .env with your database settings.

4. Run migrations

php artisan migrate --seed

5. Start the server

php artisan serve

## Credits

This project is based on the30 Days to Learn Laravel courseby Jeffrey Way at Laracasts.com

## License

This project is for educational purposes only and not intended for production use.
