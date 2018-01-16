<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-28
 * Time: 23:56
 */

require_once ('Entity.php');
//include ('Table.php');

class Game implements Entity
{

    private $id;
    private $start_date;
    private $end_date;
    private $prize;
    private $table;
    private $winner;


    public function __construct($id, $start_date, $end_date, $prize, Table $table){
        $this->id = $id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->prize = $prize;
        $this->table = $table;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.

        return $this->id .' - '. $this->start_date .' - '. $this->end_date .' - '. $this->prize;
    }

    public function getID(): int
    {
        // TODO: Implement getID() method.
        return $this->id;
    }

    public function getJSON(): string
    {
        // TODO: Implement getJSON() method.
        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'start_date' => $this -> start_date,
            'end_date' => $this -> end_date,
            'winner' => $this -> winner,
            'prize' => $this -> prize

        );
        return json_encode($struct);
    }

    public function getArray(): array
    {
        // TODO: Implement getArray() method.
        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'start_date' => $this -> start_date,
            'end_date' => $this -> end_date,
            'winner' => $this -> winner,
            'prize' => $this -> prize

        );
        return $struct;
    }

    public function setTimeStart($time){
        $this -> start_date = $time;
    }
}