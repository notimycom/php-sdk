# Notimy PHP SDK

PHP SDK do interakcji z API Notimy, umożliwiające łatwe wysyłanie powiadomień.

## Instalacja

Aby dodać to SDK do swojego projektu, użyj Composera:

```bash
composer require notimy/php-sdk
```

## Konfiguracja
1. Uzyskaj token autoryzacyjny: Wygeneruj token API na stronie Notimy.
2. Zainicjalizuj SDK: Wykorzystaj token, aby utworzyć instancję klasy Notimy.

## Przykładowe użycie
```php
<?php

require 'vendor/autoload.php';

use Notimy\PhpSdk\Notimy;

try {
    $notimy = new Notimy('twój-token-autoryzacyjny');
    $response = $notimy->sendNotification('stream-key', 'Tytuł powiadomienia', 'Treść powiadomienia');
    
    echo 'Powiadomienie wysłane: ' . print_r($response, true);
} catch (Exception $e) {
    echo 'Błąd: ' . $e->getMessage();
}
```

## Metody
```php
__construct(string $token)
```
Konstruktor klasy, który przyjmuje token autoryzacyjny.

- $token: Token autoryzacyjny uzyskany z API Notimy.

```php
sendNotification(string $streamKey, string $title, string $body): mixed
```
Wysyła powiadomienie do Notimy API.

- $streamKey: Klucz powiadomienia (unikalny identyfikator).
- $title: Tytuł powiadomienia.
- $body: Treść powiadomienia.

Zwraca odpowiedź z API w formie tablicy asocjacyjnej.

## Wymagania
- PHP 7.4 lub nowszy.
- Włączony cURL w PHP.