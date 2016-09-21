<?php namespace App\Deck\Http;

use App\Deck\Card;
use App\Deck\Deck;
use Illuminate\Routing\Controller;

class DeckController extends Controller {

    /**
     * @return Deck
     */
    public function create() {
        $deck = new Deck();
        $deck->newDeck();
        $deck->save();

        return $deck;
    }

    /**
     * @param $id
     * @return Deck
     */
    public function get($id) {
        return Deck::find($id);
    }

    public function index() {
        return Deck::all();
    }

    public function shuffle($id) {
        $deck = $this->get($id);
        $deck->shuffle();
        $deck->save();

        return $deck;
    }

    /**
     * @param $id
     * @return array
     */
    public function draw($id) {
        $deck = $this->get($id);
        $card = $deck->draw();
        $deck->save();

        return [
            'status' => $card !== null,
            'deck'   => $deck,
            'card'   => $card
        ];
    }

    public function delete($id) {
        $this->get($id)->delete();
    }

}