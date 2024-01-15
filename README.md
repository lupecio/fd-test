# Getting started

## Installation

Clone the repository

    git clone git@github.com:lupecio/fd-test.git

Switch to the repo folder

    cd fd-test

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the user registration page at http://localhost:8000

---

# Using API

Send a POST request to http://localhost:8000/api/users with test values

    {
        "name": "Lucas",
        "email": "lucas@teste.com",
        "password": "123456",
        "password_confirmation": "123456"
    }

---

# Testing API

Setup testing database

    cp .env.example .env.testing

Run tests (**Set the database connection in .env.testing before run test**)

    php artisan test
