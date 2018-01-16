<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-08
 * Time: 21:24
 */

require_once ('User.php');
require_once ('Entity.php');

class Player implements Entity {
    private $id;
    private $card_1;
    private $card_2;
    private $type;
    private $stack_initial;
    private $stack_starting;
    private $stack_current;
    private $user;

    /**
     * Player constructor.
     */
    public function __construct(){

    }


    public function getID():int
    {
        // TODO: Implement getID() method.


    }



    public function getJSON():string
    {
        // TODO: Implement getJSON() method.
    }

    public function getArray():array{
        // TODO: Implement getArray() method.
    }


}