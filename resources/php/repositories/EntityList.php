<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 17:13
 */

require_once ('./entities/Entity.php');

class EntityList{
    private $list = array();
    //private

    public function __construct(){

    }

    public function push(Entity $e){
        array_push($this->list, $e);
    }

    public function getList(){
        return $this->list;
    }

    public function printList(){
        print_r ($this->list);
        echo '<br />';
    }

    public function size():int{
        return count($this->list);
    }

    public function getElem($id):Entity{
        return $this->list[$id];
    }

    public function delate($id){
        unset($this->list[$id]);
    }

    public function getByID($id){
        foreach ($this->list as $elem){
            if($elem -> getID() == $id){
                return $elem;
            }
            //echo $tmp;
            return null;
        }
    }
    /*
     * some another methods
     */

    public function getAllJSON(){
        $struct = array();
        foreach ($this->list as $elem){
            array_push($struct, $elem -> getArray());
            //echo $tmp;
        }
        return $struct;
        //array_push($this->list[]);
    }



}