<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-12-28
 * Time: 20:07
 */

require_once ('generators/GameGenerator.php');
require_once ('data.base/UserBaseHandler.php');

//$game_handler = new GameBaseHandler();
//$game = $game_handler->getEntity(2);
//
//$players_set_handler = new SetBaseHandler();
//$players_set = $players_set_handler->getEntity(2);
//
//$array = $players_set->getArr();
//$user_handler = new UserBaseHandler();
//$i = 0;
//foreach ($array as $elem){
//
//   if($elem){
////       echo $elem;
//       $user = $user_handler->getEntity($elem);
//       $all_players = array();
////       $user->getArray();
////       array_push($user->getArray(), $all_players);
//       $all_players[$i] = $user->getArray();
//       echo json_encode($all_players);
//   }
//    $i++;
//
//}

if(isset($_POST['opt'])) {
    session_start();
    $game_handler = new GameBaseHandler();

    if ($_POST['opt'] == 0) {
        $game = $game_handler->getEntity($_SESSION['active_game']);

        $players_set_handler = new SetBaseHandler();
        $players_set = $players_set_handler->getEntity($_SESSION['active_game']);

        $array = $players_set->getArr();
        $user_handler = new UserBaseHandler();
        $i = 0;
        foreach ($array as $elem){
            if($elem){
                $user = $user_handler->getEntity($elem);
                $all_players = array();
                $all_players[$i] = $user->getArray();
                echo json_encode($all_players);
            }
            $i++;
        }



    }




}