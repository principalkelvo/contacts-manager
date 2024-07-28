# Contact Management System

This project is a simple contact management system built with Laravel and Vue.js. It allows users to manage their contacts and contact groups efficiently.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Backend Setup (Laravel)](#backend-setup-laravel)
- [Frontend Setup (Vue.js with Inertia.js)](#frontend-setup-vuejs-with-inertiajs)
- [Troubleshooting](#troubleshooting)
- [License](#license)

## Prerequisites

- **PHP** >= 7.3
- **Composer**
- **Node.js** >= 12.x
- **npm** or **yarn**
- **MySQL** or any other database supported by Laravel

## Backend Setup (Laravel)

1. **Clone the Repository**

   ```sh

   git clone https://github.com/principalkelvo/contacts-manager.git
   cd your-repository

2. **Install PHP Dependencies

    ```sh

    composer install

3. **Copy .env File

    ```sh

    cp .env.example .env

4. **Generate Application Key

    ```sh

    php artisan key:generate

5. **Configure Database

    ```sh

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

6. **Run Migrations

    ```sh

    php artisan migrate

7. **Start the Laravel Development Server

    ```sh

    php artisan serve

## Frontend Setup (Vue.js with Inertia.js)

1. **Install Node.js Dependencies

   ```sh
   npm install

2. **Compile Assets

   ```sh
    npm run dev

3. **Run the Tests

     ```sh
     npx playwright test

## Troubleshooting

-Database Connection Issues: Double-check your .env configuration.
-Services Not Running: Ensure all required services (database, server) are running before executing commands.
-Migration Errors: Verify your Laravel migration files are correctly configured and run migrations again if necessary:

```sh

    php artisan migrate:fresh

```

## License

This project is licensed under the MIT License. See the LICENSE file for more details
