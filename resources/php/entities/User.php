<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 17:06
 */

//require ('Entity.php');

require_once ('Entity.php');

class User implements Entity {



    private $id;
    private $login;
    private $password;
    private $mail;
    private $points;

    /**
     * User constructor.
     */
    public function __construct($id, $login, $password, $mail, $points){
        $this -> id = $id;
        $this -> login = $login;
        $this -> password = $password;
        $this -> mail = $mail;
        $this -> points = $points;
    }

    public function getID():int{
        // TODO: Implement getID() method.
        return $this -> id;
    }

    public function getArray():array
    {
        // TODO: Implement getArray() method.
        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'login' => $this -> login,
            'mail' => $this -> mail,
            'points' => $this -> points
        );
        return $struct;
    }

    public function getJSON():string
    {
        // TODO: Implement getJSON() method.

        $struct = array(
            'active' => true,
            'id' => $this -> id,
            'login' => $this -> login,
            'mail' => $this -> mail,
            'points' => $this -> points
        );
        return json_encode($struct);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this -> id ." - " . $this -> login . " - " . $this -> points;
    }


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }




}