<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-28
 * Time: 23:06
 */

require_once ('./entities/Game.php');
require_once ('./entities/Table.php');
require_once ('IDataBaseHandler.php');

class GameBaseHandler implements IDataBaseHandler
{

    public function __construct(){
        $con = Connection::getInstance();
        $this -> pdo = $con -> getPdo();
    }


    public function getAllEntities()
    {
        // TODO: Implement getAllEntities() method.
    }

    public function getEntity($id){
        // TODO: Implement getEntity() method.
        try{
            $stmt = $this -> pdo -> query('SELECT id_game, start_date, end_date, price, id_room, id_winner FROM games
                                                      WHERE (end_date is NULL or end_date = \'\') AND id_room = '.$id);
            $row = $stmt->fetch();
            if($row){
                $table = new Table(null, null, null, null, null);
                $game = new Game($row['id_game'], $row['start_date'], $row['end_date'], $row['price'], $table);
                return $game;
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

    public function modifyEntity(Entity $entity){

    }
}