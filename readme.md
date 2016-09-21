## Deck of Cards API

Simple deck of cards API implemented in laravel

### installation / quick-test

1. `composer install`
2. `cp .env.example .env`
3. `vim .env`
  * Fill all relevant DB fields
```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
4. Create the database <DB_DATABASE>
5. `php artisan migrate`
6. Run public/index.php on a webserver
   * `php -S localhost:8000 -t public`
7. Test
   * `curl -X POST localhost:8000/deck`

### relevant files

`cd app/Deck`

### routes

```php

## app/Deck/Http/routes.php

Route::post('/deck', DeckController::class . '@create');
Route::get('/deck/{id}', DeckController::class . '@get');
Route::post('/deck/{id}/draw', DeckController::class . '@draw');
Route::post('/deck/{id}/shuffle' , DeckController::class . '@shuffle');
Route::delete('/deck/{id}', DeckController::class . '@delete');
Route::get('/deck' , DeckController::class . '@index');

```

### usage

`POST deck`
```json
{
  "id" : 1,
  "remaining" : 52
}
```

`POST deck\1\draw`
```json
{
  "status" : true,
  "deck" : {
    "id" : 1,
    "remaining" : 51
  },
  "card" : {
    "suite" : "CLUBS",
    "value" : "ACE"
  }
}
```

-  `POST   deck\1\shuffle   #shuffles the deck`
-  `GET    deck\1           #retrieves the deck`
- `DELETE deck\1           #deletes the deck`

