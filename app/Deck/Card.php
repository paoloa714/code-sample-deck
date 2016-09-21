<?php namespace App\Deck;

class Card implements \JsonSerializable {

    static $card_faces = [
        1 => 'SPADES',
        2 => 'HEARTS',
        3 => 'DIAMONDS',
        4 => 'CLUBS'
    ];


    protected $value;
    protected $suite;

    /**
     * Card constructor.
     *
     * @param $value
     * @param $suite
     */
    public function __construct($value, $suite) {
        $this->value = $value;
        $this->suite = $suite;
    }

    /**
     * Initialize a Card instance using a card ID
     * @param $cardId
     * @return static
     */
    public static function init($cardId) {
        return new static(static::getCardValue($cardId), static::getCardSuite($cardId));
    }

    /**
     * @return mixed
     */
    public function getSuite() {
        return $this->suite;
    }

    /**
     * @param mixed $suite
     * @return Card
     */
    public function setSuite($suite) {
        $this->suite = $suite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Card
     */
    public function setValue($value) {
        $this->value = $value;

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *       which is a value of any type other than a resource.
     */
    function jsonSerialize() {
        return [
            'suite' => $this->getSuite(),
            'value' => $this->getValue()
        ];
    }


    protected static function getCardSuite($cardId) {
        $faceId = (int) ceil($cardId / 13);

        return static::$card_faces[ $faceId ];
    }

    protected static function getCardValue($cardId) {
        $cardId = ($cardId % 13);

        switch ($cardId) {
            case 1 :
                return 'ACE';
                break;
            case 11 :
                return 'JACK';
                break;
            case 12 :
                return 'QUEEN';
                break;
            case 0 :
                return 'KING';
                break;
            default :
                return (string) $cardId;
        }
    }

}