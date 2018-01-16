<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-29
 * Time: 11:33
 */

require_once ('./entities/Player.php');

class PlayersSet{
    private $array = array(
        0 => null,
        1 => null,
        2 => null,
        3 => null,
        4 => null,
        5 => null,
        6 => null,
        7 => null
    );

    private $id;

    public function __construct(array $arr, int $id){
        $this->array = $arr;
        $this->id = $id;
    }

    public function __toString(){
        // TODO: Implement __toString() method.
        return $this->id .' - '. (implode(", ", $this->array));
    }

    public function loadPlayerSet(){

    }

    public function getArr():array {
        return $this->array;
    }

    public function getFreeSpot(): int {
        for($i = 0; $i < 8; $i++ ){
            if($this->array[$i] == null){
                return $i;
            }
        }
        return 9;
    }

    public function pushPlayer(Player $player){
        for( $i = 0; $i < 8; $i++ ){
            if($this->array[$i] == null){
                $this->array[$i] = $player;
            }
        }
    }

    public function setPlayer(int $i, Entity $player){
        $this->array[$i] = $player;
    }

    public function getNextPlayer($i){
        $began = $i;
        while($i){
            if($i == 8) $i = 0;
            $i.is_int();
            if($this->array[$i] != null) return $this->array[$i];
            $i++;
            if($i == $began) $i = 0;
        }
    }


}