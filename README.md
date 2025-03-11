## Getting Started with the Calculator App

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   MySQL or other compatible database

### Installation

1. Clone the repository

    ```
    git clone https://github.com/khalidedaig/app.calculator.test.git
    cd app.calculator
    ```

2. Install PHP dependencies

    ```
    composer install
    ```

3. Install frontend dependencies

    ```
    npm install
    ```

4. Copy the example environment file

    ```
    cp .env.example .env
    ```

5. Generate an application key
    ```
    php artisan key:generate
    ```

### Configuration

1. Configure your database in the `.env` file

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

2. Run database migrations
    ```
    php artisan migrate
    ```

### Running the Application

1. Start the PHP development server

    ```
    php artisan serve
    ```

2. Compile assets (in a separate terminal)

    ```
    npm run dev
    ```

3. Access the application at `http://localhost:8000`

### Usage

The calculator app provides the following features:

-   Basic arithmetic operations

### Bonus

-   Memory storage and recall
-   History of calculations
