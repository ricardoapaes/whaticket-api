# [whaticket-api] Communication with whaticket api. [![CI](https://github.com/ricardoapaes/whaticket-api/actions/workflows/ci.yml/badge.svg)](https://github.com/ricardoapaes/whaticket-api/actions/workflows/ci.yml)

## Installation

```shell
composer require ricardoapaes/whaticket-api
```

## Send message

```php
$api = new Api('WHATICKET_BASEURL', 'WHATICKET_TOKEN');
$api->sendMessage('NUMBER', 'Whaticket api test', 'WHATICKET_WHATSAPP_ID or null');
```

## Send media

```php
$api = new Api('WHATICKET_BASEURL', 'WHATICKET_TOKEN');
$api->sendMedia('NUMBER', 'SRC_MEDIA', 'WHATICKET_WHATSAPP_ID or null');
```

## Enviroment Variables for testing

- PHP_VERSION: Choose from the following versions: 56|73|74|80
- WHATICKET_BASEURL: Whaticket base url
- WHATICKET_TOKEN: Whaticket API token
- WHATICKET_NUMBER: Number used to run automated tests.
- WHATICKET_ID: Whaticket connection id used to run automated tests.
