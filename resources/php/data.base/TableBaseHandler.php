<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-20
 * Time: 17:00
 */
require_once ('IDataBaseHandler.php');
require_once ('./repositories/EntityList.php');
require_once ('./entities/Table.php');
require_once ('Connection.php');

class TableBaseHandler implements IDataBaseHandler{

    private $pdo;
    private $tables;

    public function __construct(){
        $con = Connection::getInstance();
        $this -> pdo = $con -> getPdo();
    }

    public function getAllEntities(){
        $this -> tables = new EntityList();
        // TODO: Implement getAllEntities() method.
        try{

            $stmt = $this -> pdo -> query('SELECT id_room, name, type, max_players FROM rooms');
            while ($row = $stmt->fetch()){
                $this -> tables -> push(new Table($row['id_room'], $row['name'], $row['type'], $row['max_players'], 0));
            }
            $stmt -> closeCursor();

            return $this -> tables;
        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
        return null;
    }

    public function getEntity($id){
        // TODO: Implement getAllEntities() method.
        try{

            $stmt = $this -> pdo -> query('SELECT id_room, name, type, max_players FROM rooms WHERE id_room = '.$id);
            while ($row = $stmt->fetch()){
//                $this -> tables -> push(new Table($row['id_room'], $row['name'], $row['type'], $row['max_players'], 0));
                $tab = new Table($row['id_room'], $row['name'], $row['type'], $row['max_players'], 0);
                return $tab;
            }
            $stmt -> closeCursor();


        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
        return null;
    }

    public function setEntity(Entity $entity){
        // TODO: Implement setEntity() method.


    }

    public function modifyEntity(Entity $entity)
    {
        // TODO: Implement modifyEntity() method.
    }


}