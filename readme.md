## Deck of Cards API

Simple deck of cards API implemented in laravel

### installation / quick-test

1. `composer install`
2. `cd public`
3. `php -S localhost:<port>`
4. open another terminal
5. `curl -X POST localhost:<port>`

### relevant files

`cd app/Deck`

### routes

```php

## app/Deck/Http/routes.php

Route::post('/deck', DeckController::class . '@create');
Route::get('/deck/{id}', DeckController::class . '@get');
Route::post('/deck/{id}/draw', DeckController::class . '@draw');
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

