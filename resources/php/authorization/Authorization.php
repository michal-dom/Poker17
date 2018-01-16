<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 17:45
 */

require_once ('./data.base/UserBaseHandler.php');

class Authorization{

    private $handler;
    private $users;
    private $user;

    /**
     * Authorization constructor.
     */
    public function __construct(){
        $this -> handler = new UserBaseHandler();
        $this -> users = $this -> handler -> getAllEntities();
        //$this->users -> printList();
    }

    public function compare($login, $password){
        foreach ( $this -> users -> getList() as $elem ){
            if( get_class ( $elem ) == 'User' ){
                if( $elem -> getLogin() == $login && $elem -> getPassword() == $password ){
                    $this -> user = $elem;
                    return true;
                }
            }
        }
        return false;
    }

    public function getUserById($id){
        foreach ( $this -> users -> getList() as $elem ){
            if( get_class ( $elem ) == 'User' ){
                if( $elem -> getID() == $id ){
                    $this -> user = $elem;
                    return true;
                }
            }
        }
        return false;
    }

    public function getUser(){
        return $this -> user;
    }




}