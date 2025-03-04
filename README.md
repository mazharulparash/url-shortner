# url-shortner
## Installation

1. Open command line and run following commands:

git clone https://github.com/mazharulparash/url-shortner.git
cd url-shortener
composer install

2. Configure .env file to set up database and run following commands:

php artisan migrate
php artisan serve

## API Endpoints
1. Encode URL
  POST /api/encode
  Body: { "url": "https://example.com" }
2. Decode URL
POST /api/decode
Body: { "short_url": "http://localhost/abc123" }

## Run Tests
php artisan test
