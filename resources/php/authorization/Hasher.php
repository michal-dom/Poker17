<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 18:12
 */

class Hasher{
    public function hashSHA1($password, $salt){
        return sha1($password + $salt);
    }


}