<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-28
 * Time: 22:57
 */

require_once ('./entities/Card.php');
require_once ('./data.base/DeckGenerator.php');

class Dealer{
    private $deck;
    private $generator;

    public function __construct()
    {
        $id_deal = $_SESSION['id_deal'];
        $this -> generator = new DeckGenerator($id_deal);
        $this->deck = $this -> generator->getCards();
    }

    public function shufle():Card{

        $id = rand(0, $this->deck->size());
        $card = $this->deck->getElem($id);
        $this -> generator->removeCard($id);
        $this->deck->delate($id);
        return $card;
    }




}