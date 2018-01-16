<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-14
 * Time: 22:27
 */

require_once ('./repositories/PlayersSet.php');
require_once ('IDataBaseHandler.php');
require_once ('Connection.php');

class SetBaseHandler implements IDataBaseHandler
{

    private $pdo;

    public function __construct(){
        $con = Connection::getInstance();
        $this -> pdo = $con -> getPdo();
    }

    public function getAllEntities(){
        // TODO: Implement getAllEntities() method.
    }

    public function getEntity($id){
        // TODO: Implement getEntity() method.
        try{
            $stmt = $this -> pdo -> query('SELECT * FROM 
                                    poker.players_set as SET_PS 
                                    INNER JOIN poker.deals as DEALS ON SET_PS.id_set = DEALS.id_set 
                                    WHERE DEALS.id_game = '.$id.' ORDER BY SET_PS.id_set LIMIT 1');
            $row = $stmt->fetch();
            if($row){
//                $game = new Game($row['id_game'], $row['start_date'], $row['end_date'], $row['price']);
                $array = array(
                    0 => $row['player_1'],
                    1 => $row['player_2'],
                    2 => $row['player_3'],
                    3 => $row['player_4'],
                    4 => $row['player_5'],
                    5 => $row['player_6'],
                    6 => $row['player_7'],
                    7 => $row['player_8']
                );
                $set = new PlayersSet($array, $row['id_set']);

                return $set;
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
        // TODO: Implement modifyEntity() method.
    }
}