<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-16
 * Time: 10:26
 */

require_once ('Connection.php');
require_once ('./entities/Card.php');
require_once ('./repositories/EntityList.php');


class DeckGenerator{

    private $pdo;
    private $deck_name;

    public function __construct(int $id_deal){
        $con = Connection::getInstance();
        $this -> pdo = $con -> getPdo();
        $this -> deck_name = "deck".$id_deal;
    }

    public function createView(){


        $sql = 'CREATE VIEW '.$this -> deck_name.' 
        AS SELECT * 
        FROM cards';

        try{
            $stmt = $this -> pdo ->prepare($sql);
            if (! $stmt->execute()) {
                $arr = $stmt->errorInfo();
                print_r($arr);
            }

        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
    }

    public function removeCard($id){
        $sql = 'DELETE FROM '.$this -> deck_name.' 
        WHERE ID_CARD = '.$id;

        try{
            $stmt = $this -> pdo ->prepare($sql);
            if (! $stmt->execute()) {
                $arr = $stmt->errorInfo();
                print_r($arr);
            }

        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }

    }

    public function getCards():EntityList{
        $deck = new EntityList();
        try{
            $stmt = $this -> pdo -> query('SELECT * FROM '.$this -> deck_name);
            while($row = $stmt->fetch()){
                if($row){
                    $card = new Card($row['ID_CARD'], $row['CCODE'], $row['FIGURE'], $row['COLOR']);
                    $deck->push($card);
                }
            }

            $stmt -> closeCursor();
            return $deck;
        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
        return null;
    }


}