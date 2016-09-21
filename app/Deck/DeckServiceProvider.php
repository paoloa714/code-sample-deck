<?php namespace App\Deck;

use Illuminate\Support\ServiceProvider;

class DeckServiceProvider extends ServiceProvider {

    public function register() {
        require(base_path('app/Deck/Http/routes.php'));
    }

}