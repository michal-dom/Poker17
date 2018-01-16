<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 16:51
 */




require_once ('authorization/Authorization.php');



$user;
$timeout = 3 * 60;
$auth = new Authorization();

if(isset($_POST['opt'])) {

    if($_POST['opt'] == 0){
        /*sprawdzanie sesji*/
        session_start();
        if(isset($_SESSION['last_active']) && (time() < ($_SESSION['last_active']+$timeout))
            && isset($_SESSION['id']) && isset($_SESSION['login'])){
            $_SESSION['last_active'] = time();
            $auth -> getUserById($_SESSION['id']);
            $user = $auth->getUser();
            echo $user->getJSON();
        }else{
            session_destroy();
        }

    }
    if($_POST['opt'] == 1){
        /*logowanie*/
        if ($auth->compare($_POST['login'], $_POST['pass'])) {
            $user = $auth->getUser();
            session_start();
            $_SESSION['id'] = $user -> getID();
            $_SESSION['login'] = $user -> getLogin();
            $_SESSION['last_active'] = time();

            echo $user->getJSON();


        } else {
            $struct = array(
                'active' => false,
                'error' => 'brak uzytkownika'
            );
            echo json_encode($struct);
        }

    }
    if($_POST['opt'] == 2){
        /*rejestracja*/
    }


}

?>

