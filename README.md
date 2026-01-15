# User Registration System

A production-ready user registration and authentication system built with **Laravel**, **PostgreSQL**, and **vanilla JavaScript**.

## 🚀 Features

-   User registration with validation
-   Authentication (login/logout)
-   Secure password hashing
-   PostgreSQL integration
-   Clean project structure following best practices

## 🛠️ Tech Stack

-   **Backend:** Laravel (PHP Framework)
-   **Database:** PostgreSQL
-   **Frontend:** HTML, CSS, Vanilla JavaScript
-   **Version Control:** Git & GitHub

## ⚙️ Setup Instructions

1. Clone the repository:

    ```bash
    git clone https://github.com/JaafarAljamal/user-registration-system.git
    cd user-registration-system
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Configure .env file with your PostgreSQL credentials

    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=user_system
    DB_USERNAME=postgres
    DB_PASSWORD=your_password
    ```

4. Run migrations:

    ```bash
    php artisan migrate
    ```

5. Start the development server:

    ```bash
    php artisan serve
    ```

## 📂 Project Structure

-   app/ → Application logic (Models, Controllers)
-   database/migrations/ → Database schema
-   resources/views/ → Frontend templates
-   routes/ → Web & API routes

## 📜 License

This project is licensed under the MIT License.
