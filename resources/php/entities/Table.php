<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-20
 * Time: 17:02
 */

require_once ('Entity.php');

class Table implements Entity {


//ID_TABLE, NAME, TYPE, MAX_PLAYERS ,CURRENT_PLAYERS
    private $id;
    private $name;
    private $type;
    private $max;
    private $current;

    /**
     * Table constructor.
     */
    public function __construct( $id, $name, $type, $max, $current ){
        $this -> id = $id;
        $this -> name = $name;
        $this -> type = $type;
        $this -> current = $current;
        $this -> max = $max;

    }


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this -> id . $this -> name . $this -> type  ;
    }

    public function getArray(): array {
        // TODO: Implement getJSON() method.
        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'name' => $this -> name,
            'type' => $this -> type,
            'current' => $this -> current,
            'max' => $this -> max

        );
        return $struct;
    }


    public function getID(): int{
        // TODO: Implement getID() method.
        return $this -> id;
    }
    public function getJSON(): string
    {
        // TODO: Implement getJSON() method.

        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'name' => $this -> name,
            'type' => $this -> type,
            'current' => $this -> current,
            'max' => $this -> max

        );
        return json_encode($struct);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param mixed $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param mixed $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }




}