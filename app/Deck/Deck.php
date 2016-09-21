<?php

namespace App\Deck;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model {

    protected $table = 'decks';

    protected $hidden = ['cards'];

    protected $cards = [];


    /**
     * @return Card
     */
    public function draw() {
        if(count($this->getCards())) {
            return Card::init(array_shift($this->getCards()));
        }else {
            return null;
        }
    }


    public function shuffle() {
        shuffle($this->getCards());
    }

    public function newDeck() {
        $this->cards = range(1, 52);
        $this->shuffle();
    }

    /**
     * Save the model to the database.
     *
     * @param  array $options
     * @return bool
     */
    public function save(array $options = []) {
        $this->setAttribute('cards', $this->serializeCards());

        return parent::save($options);
    }

    public function toArray() {
        $array = parent::toArray();

        $array['remaining'] = count($this->getCards());

        return $array;
    }

    protected function serializeCards() {
        return serialize($this->cards);
    }

    protected function unserializeCards() {
        return unserialize($this->getAttributeValue('cards')) ?: null;
    }

    protected function &getCards() {
        if ( ! $this->cards) {
            $this->cards = $this->unserializeCards();
        }

        return $this->cards;
    }
}
