<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 17:02
 */

require_once ('IDataBaseHandler.php');
require_once ('./repositories/EntityList.php');
require_once ('./entities/User.php');
require_once ('Connection.php');

class UserBaseHandler implements IDataBaseHandler {


    private $pdo;
    private $users;

    public function __construct(){
        $con = Connection::getInstance();
        $this -> pdo = $con -> getPdo();
    }

    public function getAllEntities()
    {
        // TODO: Implement getAllEntities() method.
        $this -> users = new EntityList();
        try{
            $stmt = $this -> pdo -> query('SELECT ID_USER, LOGIN, PASSWORD, MAIL FROM users');
            while ($row = $stmt->fetch()){
                $this -> users -> push(new User($row['ID_USER'], $row['LOGIN'], $row['PASSWORD'], $row['MAIL'], 1000));
            }
            $stmt -> closeCursor();

            return $this -> users;
        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
        return null;
    }

    public function getEntity($id){
        // TODO: Implement getEntity() method.
        try{
            $stmt = $this -> pdo -> query('SELECT ID_USER, LOGIN, PASSWORD, MAIL FROM users WHERE ID_USER = '.$id);
            $row = $stmt->fetch();
            $user = new User($row['ID_USER'], $row['LOGIN'], $row['PASSWORD'], $row['MAIL'], 1000);
            $stmt -> closeCursor();
            return $user;
        } catch(PDOException $e) {
            echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
        }
        return null;

    }

    public function setEntity(Entity $entity)
    {
        // TODO: Implement setEntity() method.
    }

    public function modifyEntity(Entity $entity)
    {
        // TODO: Implement modifyEntity() method.
    }


}