<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 17:06
 */

interface Entity{

    public function getID() : int ;
    public function getJSON() : string ;
    public function getArray() : array;

}