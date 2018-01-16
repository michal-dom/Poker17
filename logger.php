<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-13
 * Time: 15:56
 */



if(isset($_POST['opt'])){

    switch ($_POST['opt']){
        case 0:
            //sprawdzanie sesji
            $user;
            $auth = new Authorization();

            break;
        case 1:
            //logowanie
            $user;
            $auth = new Authorization();
            if($auth -> compare($_POST['login'], $_POST['pass'])){
                $user = $auth -> getUser();

                echo $user -> getJSON();
            }else{
                echo "brak uzytkownika";
            }

            break;
        case 2:
            //rejestracja

            break;
        case 3:

            break;
        default:

            break;
    }
}



?>