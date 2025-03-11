# Calculator Application

![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-blue?style=flat-square)

A full-featured calculator web application built with Laravel that provides basic arithmetic operations with additional features like memory storage and calculation history.

## Getting Started with the Calculator App

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   MySQL or other compatible database

### Installation

1. Clone the repository

    ```bash
    git clone https://github.com/khalidedaig/app.calculator.test.git
    cd app.calculator
    ```

2. Install PHP dependencies

    ```bash
    composer install
    ```

3. Install frontend dependencies

    ```bash
    npm install
    ```

4. Copy the example environment file

    ```bash
    cp .env.example .env
    ```

5. Generate an application key
    ```bash
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
    ```bash
    php artisan migrate
    ```

### Running the Application

1. Start the PHP development server

    ```bash
    php artisan serve
    ```

2. Compile assets (in a separate terminal)

    ```bash
    npm run dev
    ```

3. Access the application at [`http://localhost:8000`](http://localhost:8000)

### Features

The calculator app provides the following functionality:

-   ➕ Addition
-   ➖ Subtraction
-   ✖️ Multiplication
-   ➗ Division
-   Additional operations (power, square root, etc.)

### Bonus Features

-   💾 Memory storage and recall functionality
-   📜 History of calculations
-   🔄 Ability to recall and reuse previous calculations

### Running Tests

Our application includes comprehensive tests to ensure everything works correctly:

1. Create a SQLite database file for testing:

    ```bash
    touch database/database.sqlite
    ```

2. Configure your `.env.testing` file to use SQLite:

    ```
    DB_CONNECTION=sqlite
    DB_DATABASE=database/database.sqlite
    ```

3. Run the test suite:

    ```bash
    php artisan test
    ```

    For more detailed output:

    ```bash
    ./vendor/bin/phpunit --testdox
    ```

The test suite includes:

-   Unit tests for calculator operations
-   Feature tests for API endpoints
-   Integration tests for the full application

### Troubleshooting

If you encounter any issues during setup:

-   **Database Connection Issues**: Ensure your database credentials are correct in the `.env` file
-   **Composer Dependencies**: Try running `composer dump-autoload` if classes aren't found
-   **JavaScript Not Loading**: Run `npm run build` to compile assets for production

### Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### License

This project is licensed under the MIT License - see the LICENSE file for details.
