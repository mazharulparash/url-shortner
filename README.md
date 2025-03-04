# url-shortner

## Installation

1. Open command line and run the following commands:

    ```bash
    git clone https://github.com/mazharulparash/url-shortner.git
    cd url-shortener
    composer install
    ```

2. Configure `.env` or copy `.env.example` file to set up the database and run the following commands:

    ```bash
    php artisan migrate
    php artisan serve
    ```

## API Endpoints

1. Encode URL
    ```bash
    POST /api/encode
    Body: { "url": "https://example.com" }
    ```

2. Decode URL
    ```bash
    POST /api/decode
    Body: { "short_url": "http://localhost/abc123" }
    ```

## Run Tests

    ```bash
    php artisan test
    ```
