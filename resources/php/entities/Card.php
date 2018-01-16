<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-16
 * Time: 10:52
 */

class Card implements Entity
{

    private $id;
    private $ccode;
    private $figure;
    private $color;


    public function __construct($id, $ccode, $figure, $color){
        $this->id = $id;
        $this->ccode = $ccode;
        $this->figure = $figure;
        $this->color = $color;
    }



    public function getID(): int
    {
        // TODO: Implement getID() method.
        return 0;
    }

    public function getJSON(): string
    {
        // TODO: Implement getJSON() method.
        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'ccode' => $this -> ccode,
            'figure' => $this -> figure,
            'color' => $this -> color
        );
        return json_encode($struct);
    }

    public function getArray(): array
    {
        // TODO: Implement getArray() method.

        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'ccode' => $this -> ccode,
            'figure' => $this -> figure,
            'color' => $this -> color
        );
        return $struct;

    }

}