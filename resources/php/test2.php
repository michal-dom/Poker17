<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-20
 * Time: 14:32
 */
require ('authorization/Authorization.php');
//echo json_encode($_POST);
session_start();

//echo session_id();
echo session_name();
echo '<br>';
echo session_id();
echo '<br>';
$auth = new Authorization();
$timeout = 5 * 60;
if(isset($_SESSION['last_active']) && (time() < ($_SESSION['last_active']+$timeout))
    && isset($_SESSION['id']) && isset($_SESSION['login'])){
    //echo $_SESSION['id'];
    $auth -> getUserById($_SESSION['id']);
    $user = $auth->getUser();
    echo $user->getJSON();
}



//echo print_r($_SERVER['HTTP_USER_AGENT']);


//echo session.cook();
//session_destroy();


//session_destroy();

?>